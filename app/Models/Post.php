<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user () {
        return $this->belongsTo('App\Models\User');
    }

    public function tags () {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function comments () {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'description', 'image', 'status'
    ];
}
