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

    public function savePost ($id, $req) {
        return DB::table('posts')
            ->where('id', '=', $id)
            ->update([
                'title' => $req->input('title'),
                'description' => $req->input('description')
            ]);
    }

    public function publicPost ($id) {
        return DB::table('posts')
            ->where('id', '=', $id)
            ->update([
                'status' => true,
            ]);
    }

    public function incrementCommentCount ($id) {
        $comment_count = DB::table('posts')
            ->where('id', '=', $id)
            ->select('posts.comment_count')
            ->get();

        return DB::table('posts')
            ->where('id', '=', $id)
            ->update([
                'comment_count' => $comment_count[0]->comment_count + 1
            ]);
    }

    public function getPost ($id) {
        return DB::table('posts')
            ->leftJoin('users', 'posts.author_id', '=', 'users.id')
            ->select('posts.id', 'posts.title', 'posts.description', 'posts.image', 'posts.like_count', 'posts.comment_count', 'posts.updated_at', 'posts.status', 'users.name', 'users.avatar')
            ->where('posts.id', '=', $id)
            ->get();
    }

    public function getPosts () {
        return DB::table('posts')
            ->leftJoin('users', 'posts.author_id', '=', 'users.id')
            ->select('posts.id', 'posts.title', 'posts.description', 'posts.image', 'posts.like_count', 'posts.status', 'posts.comment_count', 'posts.updated_at', 'users.name', 'users.avatar')
            ->where('posts.status', '=', true)
            ->orderBy('updated_at', 'desc')
            ->get();
    }

    public function getUserPosts () {
        return DB::table('posts')
            ->leftJoin('users', 'posts.author_id', '=', 'users.id')
            ->select('posts.id', 'posts.title', 'posts.description', 'posts.image', 'posts.like_count', 'posts.status', 'posts.comment_count', 'posts.updated_at', 'posts.author_id', 'users.name', 'users.avatar')
            ->where('posts.author_id', '=', Auth::user()->id)
            ->orderBy('updated_at', 'desc')
            ->get();
    }

    public function getPopularPosts () {
        return DB::table('posts')
            ->leftJoin('users', 'posts.author_id', '=', 'users.id')
            ->select('posts.id', 'posts.title', 'posts.description', 'posts.image', 'posts.like_count', 'posts.comment_count', 'posts.updated_at', 'users.name', 'users.avatar')
            ->where('posts.status', '=', true)
            ->orderBy('like_count', 'desc')
            ->get();
    }
}
