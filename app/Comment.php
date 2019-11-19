<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $guarded = [];

    public function replies()
    {
        $this->hasMany('App\CommentReply');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
