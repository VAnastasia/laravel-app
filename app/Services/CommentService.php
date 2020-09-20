<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\Post;
use App\Services\PostService;

class CommentService {
    public function addComment ($author_id, $req) {
        $comment = new Comment();
        $comment->text = $req->input('text');
        $comment->like_count = 0;
        $comment->post_id = $req->input('post-id');
        $comment->user_id = $author_id;
        $comment->save();
    }
}
