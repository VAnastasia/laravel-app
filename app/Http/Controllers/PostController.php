<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\EditPostRequest;
use App\Services\PostService;
use App\Services\CommentService;
use App\Services\TagService;

use App\Models\Post;
use App\Models\User;
use App\Models\Tag;

class PostController extends Controller
{
    public function show () {
        $user = Auth::user();
        $posts = Post::all()->where('status', '=', true)->sortByDesc('updated_at');

        return view('main', [
            'posts' => $posts,
            'user' => $user,
        ]);
    }

    public function create () {
        $user = Auth::user();

        return view('add', [
            'user' => $user
        ]);
    }

    public function getUserPosts() {
        $user = Auth::user();
        $posts = User::find($user->id)->posts;

        return view('main', [
            'posts' => $posts,
            'user' => $user
        ]);
    }

    public function getPost($id) {
        $user = Auth::user();
        $post = Post::find($id);
        $postService = new PostService();

        return view('post', [
            'post' => $post,
            'user' => $user,
        ]);
    }

    public function getTagPosts($tag) {
        $user = Auth::user();
        $posts = Tag::find($tag)->posts->where('status', '=', true)->sortByDesc('updated_at');
        $tagName = Tag::find($tag)->name;

        return view('main', [
            'posts' => $posts,
            'user' => $user,
            'title' => 'Все посты по тэгу ' . $tagName
        ]);
    }

    public function editPost($id) {
        $user = Auth::user();
        $post = Post::find($id);

        return view('edit', [
            'post' => $post,
            'user' => $user
        ]);
    }

    public function popular() {
        $user = Auth::user();
        $posts = Post::all()->where('status', '=', true)->sortByDesc('like_count');

        return view('main', [
            'posts' => $posts,
            'user' => $user
        ]);
    }

    public function submit(PostRequest $req) {
        $postService = new PostService();
        $postService->addPost($req);
        return redirect()->route('posts');
    }

    public function savePost($id, EditPostRequest $req) {
        $postService = new PostService();
        $postService->savePost($id, $req);
        return redirect()->route('posts');
    }

    public function publicPost($id) {
        Post::find($id)->update([
            'status' => true,
        ]);
        return redirect()->route('main');
    }

    public function likePost($id) {
        $postService = new PostService();
        $postService->likePost($id);
        return redirect()->back();
    }
}
