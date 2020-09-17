<?php

namespace App\Services;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;

class TagService {
    public function addTag ($tags, $post_id) {

        foreach ($tags as $tag) {
            $tagModel = new Tag();

            $newTag = $tagModel->firstOrCreate(
                ['tag_name' => $tag],
                ['tag_name' => $tag, 'tag_slug' => Str::slug($tag, '_', 'en')
            ]);

            DB::table('tagrels')->insert([
                'post_id' => $post_id,
                'tag_id' => $newTag->tag_id ?? 1
            ]);
        }
    }

    public function getPostTags ($post_id) {
        return DB::table('tagrels')
            ->leftJoin('tags', 'tagrels.tag_id', '=', 'tags.tag_id')
            ->select('tags.tag_name', 'tags.tag_slug', 'tags.tag_id')
            ->where('post_id', '=', $post_id)
            ->get();
    }

    public function getTagPosts ($tag_id) {
        return DB::table('tagrels')
            ->where('tagrels.tag_id', '=', $tag_id)
            ->leftJoin('posts', 'tagrels.post_id', '=', 'posts.id')
            ->leftJoin('users', 'posts.author_id', '=', 'users.id')
            ->select('posts.id', 'posts.title', 'posts.description', 'posts.image', 'posts.like_count', 'posts.comment_count', 'posts.updated_at', 'posts.status', 'users.name', 'users.avatar')
            ->where('posts.status', '=', true)
            ->get();
    }

    public function getTag ($id) {
        $tag = new Tag();
        return $tag->where('tag_id', '=', $id)->get();
    }
}
