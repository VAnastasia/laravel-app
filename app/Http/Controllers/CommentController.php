<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Services\CommentService;

class CommentController extends Controller
{
    public function submit(CommentRequest $req) {
        $author_id = Auth::user()->id;

        $commentService = new CommentService();
        $commentService->addComment($author_id, $req);

        return redirect()->back();
    }

    public function getComments($post_id) {
        $commentService = new CommentService();
        $commentService->getComments($post_id);
        return redirect()->back();
    }
}
