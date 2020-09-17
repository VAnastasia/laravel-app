<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\EditPostRequest;
use App\Services\PostService;
use App\Services\CommentService;
use App\Services\TagService;


class PostController extends Controller
{

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

    public function getUserPosts() {
        $user = Auth::user();
        $postService = new PostService();
        $posts = $postService->getUserPosts();

        return view('main', [
            'posts' => $posts,
            'user' => $user
        ]);
    }

    public function getPost($id) {
        $user = Auth::user();

        $commentService = new CommentService();
        $comments = $commentService->getComments($id);

        $postService = new PostService();
        $posts = $postService->getPost($id);
        $postService->getCommentCount($id);

        $tagService = new TagService();
        $tags = $tagService->getPostTags($id);

        return view('post', [
            'posts' => $posts,
            'user' => $user,
            'comments' => $comments,
            'tags' => $tags
        ]);
    }

    public function getTagPosts($tag) {
        $user = Auth::user();

        $tagService = new TagService();
        $posts = $tagService->getTagPosts($tag);
        $tagName = $tagService->getTag($tag)[0]->tag_name;

        return view('main', [
            'posts' => $posts,
            'user' => $user,
            'title' => 'Все посты по тэгу ' . $tagName
        ]);
    }

    public function editPost($id) {
        $user = Auth::user();
        $postService = new PostService();
        $posts = $postService->getPost($id);

        return view('edit', [
            'post' => $posts[0],
            'user' => $user
        ]);
    }

    public function mainPage() {
        $user = Auth::user() ?? '';
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

    public function savePost($id, EditPostRequest $req) {
        $postService = new PostService();
        $postService->savePost($id, $req);
        return redirect()->route('main');
    }

    public function publicPost($id) {
        $postService = new PostService();
        $postService->publicPost($id);
        return redirect()->route('main');
    }
}
