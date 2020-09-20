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
        $post->user_id = Auth::user()->id;
        $post->status = false;
        $post->like_count = 0;

        $post->save();

        $tag_service = new TagService();
        return $tag_service->addTag(explode(' ', $req->input('tags')), $post->id);
    }

    public function savePost ($id, $req) {
        $tag_service = new TagService();
        $tag_service->deleteTags(explode(' ', $req->input('tags')), $id);
        $tag_service->addTag(explode(' ', $req->input('tags')), $id);

        return Post::find($id)
            ->update([
                'title' => $req->input('title'),
                'description' => $req->input('description')
            ]);
    }

    public function getLike ($user_id, $post_id) {
        return in_array($post_id, DB::table('user_post')->where('user_id', $user_id)->pluck('post_id')->toArray());
    }

    public function likePost ($id) {
        $user = Auth::user();
        $post = Post::find($id);

        $is_like = in_array($post->id, DB::table('user_post')->where('user_id', $user->id)->pluck('post_id')->toArray());

        if (!$is_like) {
            $post->increment('like_count');

            DB::table('user_post')->insert([
                'user_id' => $user->id,
                'post_id' => $id
            ]);
        } else {
            $post->decrement('like_count');

            DB::table('user_post')->where([
                'user_id' => $user->id,
                'post_id' => $id
            ])->delete();
        }
    }

}
