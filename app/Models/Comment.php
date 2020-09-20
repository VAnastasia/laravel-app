<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    public function user () {
        return $this->belongsTo('App\Models\User');
    }

    public function post () {
        return $this->belongsTo('App\Models\Post');
    }

    // public function user() {
    //     return $this->belongsTo(User::class, 'author_comment_id');
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'user_id', 'post_id'
    ];

}
