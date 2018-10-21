<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\User;
use App\Privacy;
use App\Friend;

use Illuminate\Http\Request;

class CommentController extends Controller {
    
    // grants access to non-logged in user
    public function __construct() {
        $this->middleware('auth', [
            'only'=>'index', 
            'only'=>'comment',
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // Fetches id
        $id = request('post_id');
        
        // validates the information
        $this->validate($request, [ 
            'comment' => 'required|max:255',
            'user_id' => 'required',
            'post_id' => 'required',
        ]);
        
        // Store and Save Form
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;
        $comment->save();

        // change page
        return redirect("/post/$id");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        // fetches the comment id
        $comment = Comment::find($id);
        
        // deletes it
        $comment->delete();
        
        // redircts page here
        return redirect("/post/$comment->post_id");
    }
}
