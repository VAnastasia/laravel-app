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

}
