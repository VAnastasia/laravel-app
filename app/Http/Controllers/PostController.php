<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Services\PostService;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function getProfile() {
        $user = Auth::user();

        return view('add', [
            'user' => $user
        ]);
    }

    public function getPosts() {
        $user = Auth::user();
        $postService = new PostService();
        $posts = $postService->getPosts();

        return view('post', [
            'posts' => $posts,
            'user' => $user
        ]);
    }

    public function getPost($id) {
        $user = Auth::user();
        $postService = new PostService();
        $posts = $postService->getPost($id);

        return view('post', [
            'posts' => $posts,
            'user' => $user
        ]);
    }

    public function mainPage() {
        $user = Auth::user();
        $postService = new PostService();
        $posts = $postService->getPosts();

        return view('main', [
            'posts' => $posts,
            'user' => $user
        ]);
    }

    public function popular() {
        $user = Auth::user();
        $postService = new PostService();
        $posts = $postService->getPopularPosts();

        return view('main', [
            'posts' => $posts,
            'user' => $user
        ]);
    }

    public function submit(PostRequest $req) {
        $postService = new PostService();
        $postService->addPost($req);
        return redirect()->route('main');
    }
}
