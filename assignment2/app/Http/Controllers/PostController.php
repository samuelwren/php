<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\User;
use App\Privacy;
use App\Friend;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PostController extends Controller {
    
    // restricts unAuth users to only these pages
    public function __construct() {
        $this->middleware('auth', [
            'only'=>'index', 
            'only'=>'comment',
        ]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // Finds all posts and plucks each posts id
        $id = Post::all()->pluck('id');
        
        // checks if user is logged and whom the user is
        if (Auth::check()) {
            
            // fetches logged in users id
            $userid = Auth::user()->id;
            
            // Fetch all posts where privacy = public
            // If user is logged in, fetchs their private messages
            // Checks to see who the user is friends with and gets their post that = friends
            $posts = Post::whereRaw('privacy_id = 1')->orWhereRaw('privacy_id = 3 AND user_id = ?', array($userid))
                ->orWhereHas('User', function ($query) use ($userid) {
                    return $query->whereHas('Friends', function($r) use ($userid) {
                        return $r->whereRaw('friend_id = ?', array($userid));
                    })->whereRaw('privacy_id = 2');
                })->orWhereHas('User', function ($query) use ($userid) {
                    return $query->whereHas('Friends', function($r) use ($userid) {
                        return $r->whereRaw('user_id = ?', array($userid));
                })->whereRaw('privacy_id = 2');
            })->orderBy('id', 'desc')->get();

        } else {
            // If user is not logged in, just retrieve all posts that are public
            $posts = Post::whereRaw('privacy_id = 1')->orderBy('id', 'desc')->get();
        }
        
        // redirect page
        return view('socialMedia.dashboard')->with('posts', $posts)->with('privacys', Privacy::all())->with('user', User::all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // validates the information
        $this->validate($request, [ 
            'title' => 'required|max:85', 
            'message' => 'required|max:255',
            'user_id' => 'required',
            'privacy' => 'required',
        ]);
        
        // Store and Save Form
        $post = new Post();
        $post->title = $request->title;
        $post->message = $request->message;
        $post->user_id = $request->user_id;
        $post->privacy_id = $request->privacy;
        $post->save();
        
        // Redirect page
        return redirect("/post/$post->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        // finds the post id and all the comments alone with it
        $post = Post::find($id);
        $comments = Comment::whereRaw('post_id = ?', array($id))->paginate(6);
        
        // redirect page
        return view('socialMedia.comment')->with('post', $post)->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        // fetches post id
        $post = Post::find($id);
        
        // redirects page
        return view('socialMedia.update_post')->with('post', $post)->with('privacys', Privacy::all());
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
            'title' => 'required|max:85', 
            'message' => 'required|max:255',
        ]);
        
        // Store and Save Form
        $post = Post::find($id);
        $post->title = $request->title;
        $post->message = $request->message;
        $post->privacy_id = $request->privacy;
        $post->save();
        
        // redirect page
        return redirect("/post/$post->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        // fetches the comment id
        $post = Post::find($id);
        
        // deletes it
        $post->delete();
        
        // redircts page
        return redirect("/post");
    }
}
