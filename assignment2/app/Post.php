<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    //
    protected $fillable = ['title', 'message'];
    
    function User() {
        return $this->belongsTo('App\User');
    }
    
    function Comment() {
        return $this->hasMany('App\Comment');
    }
    
    function Privacy () {
        return $this->belongsTo('App\Privacy');
    }
    
    public function getCommentCount() {
        $post = $this;
        $count = Comment::whereRaw('post_id = ?', array($post->id))->count();
        return $count;
    }
}
