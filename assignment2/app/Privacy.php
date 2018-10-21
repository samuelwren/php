<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privacy extends Model {
    //
    function posts() {
        return $this->hasMany('App\Post');
    }
}
