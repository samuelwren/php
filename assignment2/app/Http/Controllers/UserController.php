<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\User;
use App\Privacy;
use App\Friend;

use Illuminate\Support\Facades\Auth;

use DateTime;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller {
    
    // restricts unAuth users to only these pages
    public function __construct() {
        $this->middleware('auth', [
            'only'=>'index',
            'only'=>'profile',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        // validates the information
        $this->validate($request, [ 
            'searchUsers' => 'required|string'
        ]);
        
        // fetches the string inputted into the search bar
        $searchUsers = request('searchUsers');
        
        // counts the amount of results
        $count =  User::whereRaw('firstName like ?', array("%$searchUsers%"))->orWhereRaw('lastName like ?', array("%$searchUsers%"))->count();
        
        // fetches all results found
        if($count > 0) {
            $users = User::whereRaw('firstName like ?', array("%$searchUsers%"))->orWhereRaw('lastName like ?', array("%$searchUsers%"))->get();
            
            // redirct page
            return view('users.search')->with('users', $users)->with('searchUsers', $searchUsers);
        } else {
            // if zero results, redirct to home page
            return redirect('/post');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        // fetch the users id
        $user = User::find($id);
        
        // Calculates age
        $birth_date = new DateTime($user->dob);
        $now = new DateTime();
        $now->format('Y-m-d H:i:s');
        $diff = date_diff($birth_date, $now);
        //Returns only the year
        $age = $diff->format('%y');

        // fetch any friends of this user
        $friends = DB::select('SELECT * FROM Users u, Friends f 
                                WHERE u.id = f.friend_id
                                    AND f.user_id = ?
                                        OR u.id = f.user_id
                                            AND f.friend_id = ?', [$id, $id]);
        
        // get user id
        if (Auth::check() == NULL) {
            $userid = 0;
        } else {
            $userid = Auth::user()->id;
        }
        
        // if the user is not logged in or is not a friend
        if ($userid == $id) {
            // fetches all the posts if the logged in user = the user profile
            $posts = DB::select('SELECT * FROM Posts p, Users u
                                    WHERE p.user_id = ?
                                        AND p.user_id = u.id
                                        AND (p.privacy_id = 1 OR p.privacy_id = 2 OR p.privacy_id = 3)', 
                                [$userid]);
            
        } else if ($userid == 0) {
            // fetches all the posts if the logged in user = the user profile
            $posts = DB::select('SELECT * FROM Posts p, Users u
                                    WHERE p.user_id = ?
                                        AND p.user_id = u.id
                                        AND p.privacy_id = 1', 
                                [$id]);
        } else {
            // fetches all posts of the user that are public and friends
            $posts = DB::select('SELECT * FROM Posts p, Users u, Friends f
                                    WHERE f.user_id = ?
                                        AND f.friend_id = ?
                                        AND f.friend_id = u.id
                                        AND u.id = p.user_id
                                        AND (p.privacy_id = 1 OR p.privacy_id = 2)
                                            OR f.friend_id = ?
                                                AND f.user_id = ?
                                                AND f.user_id = u.id
                                                AND u.id = p.user_id
                                                AND (p.privacy_id = 1 OR p.privacy_id = 2)', 
                                [$userid, $id, $userid, $id]);
        }
        
        // redirct page
        return view('users.profile')->with('user', $user)->with('age', $age)->with('friends', $friends)->with('posts', $posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //finds post $id
        $user = User::find($id);
        
        //redirects page
        return view('users.edit_profile')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        // validates the information
        $this->validate($request, [ 
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'dob' => 'required|nullable|date',
        ]);
        
        // Store and Save Form
        $user = User::find($id);
        $image_store = request()->file('image')->store('profile_images', 'public');
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->dob = $request->dob;
        $user->image = $image_store;
        $user->save();
        
        // redirect page
        return redirect("/user/$user->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
