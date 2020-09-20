<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Services\CommentService;
use App\Services\PostService;
use App\Models\Comment;

class CommentController extends Controller
{
    public function submit(CommentRequest $req) {
        $author_id = Auth::user()->id;

        $commentService = new CommentService();
        $commentService->addComment($author_id, $req);

        return redirect()->back();
    }

    public function deleteComment($id) {
        Comment::find($id)->delete();

        return redirect()->back();
    }

    public function editComment($id) {
        $user = Auth::user();
        $comment = Comment::find($id);
        $post = Comment::find($id)->post;

        return view('post', [
            'post' => $post,
            'user' => $user,
            'comment_edit' => $comment
        ]);
        // return redirect()->back();
    }

    public function saveComment($id, CommentRequest $req) {
        Comment::find($id)->update([
            'text' => $req->input('text')
        ]);

        return redirect()->route('post', Comment::find($id)->post->id);
    }
}
