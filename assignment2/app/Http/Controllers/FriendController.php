<?php

namespace App\Http\Controllers;


use App\Post;
use App\Comment;
use App\User;
use App\Privacy;
use App\Friend;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FriendController extends Controller {
    
    // restricts unAuth users to only these pages
    public function __construct() {
        $this->middleware('auth', [
            'expect' => 'index'
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // creates new object
        $friend = new Friend();
       
        // fetches the data from the form
        $friend->user_id = $request->user_id;
        $friend->friend_id = $request->friend_id;
       
        // saves the data entered
        $friend->save();
       
        // redirects page to here
        return redirect("/user/$friend->friend_id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        // finds the users id
        $user = User::find($id);
        
        // finds all the friends that this user has
        $friends = DB::select('SELECT * FROM Users u, Friends f 
                                WHERE u.id = f.friend_id
                                        AND f.user_id = ?
                                            OR u.id = f.user_id
                                                AND f.friend_id = ?', [$id, $id]);
        
        // counts the amount of friends                            
        $count = Friend::whereRaw('user_id = ?', array($id))->orWhereRaw('friend_id = ?', array($id))->count();
        
        // redirects page
        return view('users.friends')->with('friends', $friends)->with('count', $count);
    }
    /**
     * Remove the specified resource from storage.
     * Deletes the users friendship
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        // fetch the logged in users id
        $user = request('user_id');
        
        // fetchs id
        $friend = Friend::find($id);
        
        // deletes from database
        $friend->delete();
        
        // redirect page
        return redirect()->to("/friend/$user");
    }
}
