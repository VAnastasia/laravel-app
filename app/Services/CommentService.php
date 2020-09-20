<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

    public function likeComment ($id) {
        $user = Auth::user();
        $comment = Comment::find($id);

        $is_like = in_array($comment->id, DB::table('user_comment')->where('user_id', $user->id)->pluck('comment_id')->toArray());

        if (!$is_like) {
            $comment->increment('like_count');

            DB::table('user_comment')->insert([
                'user_id' => $user->id,
                'comment_id' => $id
            ]);
        } else {
            $comment->decrement('like_count');

            DB::table('user_comment')->where([
                'user_id' => $user->id,
                'comment_id' => $id
            ])->delete();
        }
    }
}
