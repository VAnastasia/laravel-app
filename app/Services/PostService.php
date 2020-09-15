<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostService {
    public function addPost ($req) {
        $post = new Post();
        $post->title = $req->input('title');
        $post->description = $req->input('description');
        $post->image = $req->file('image')->store('uploads', 'public');
        $post->author_id = Auth::user()->id;
        $post->status = false;
        $post->like_count = rand(0, 1000);

        $post->save();
    }

    public function getPost ($id) {
        return DB::table('posts')
            ->leftJoin('users', 'posts.author_id', '=', 'users.id')
            ->select('posts.id', 'posts.title', 'posts.description', 'posts.image', 'posts.like_count', 'posts.created_at', 'users.name', 'users.avatar')
            ->where('posts.id', '=', $id)
            ->get();
    }

    public function getPosts () {
        return DB::table('posts')
            ->leftJoin('users', 'posts.author_id', '=', 'users.id')
            ->select('posts.id', 'posts.title', 'posts.description', 'posts.image', 'posts.like_count', 'posts.created_at', 'users.name', 'users.avatar')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getPopularPosts () {
        return DB::table('posts')
            ->leftJoin('users', 'posts.author_id', '=', 'users.id')
            ->select('posts.id', 'posts.title', 'posts.description', 'posts.image', 'posts.like_count', 'posts.created_at', 'users.name', 'users.avatar')
            ->orderBy('like_count', 'desc')
            ->get();
    }
}
