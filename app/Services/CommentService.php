<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Services\PostService;

class CommentService {
    public function addComment ($author_id, $req) {
        $comment = new Comment();
        $comment->comment_text = $req->input('text-comment');
        $comment->like_comment_count = 0;
        $comment->post_comment_id = $req->input('post-id');
        $comment->author_comment_id = $author_id;

        $comment->save();

        $postService = new PostService();
        $postService->incrementCommentCount($req->input('post-id'));
    }

    public function getComments ($post_id) {
        return DB::table('comments')
            ->leftJoin('users', 'users.id', '=', 'comments.author_comment_id')
            ->select('comments.comment_id', 'comments.comment_text', 'comments.like_comment_count', 'comments.updated_at', 'users.name', 'users.avatar')
            ->where('comments.post_comment_id', '=', $post_id)
            ->orderBy('updated_at', 'asc')
            ->get();
    }
}
