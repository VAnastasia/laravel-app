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
                ['name' => $tag],
                ['name' => $tag]
            );

            DB::table('post_tag')->insert([
                'post_id' => $post_id,
                'tag_id' => $newTag->id
            ]);
        }
    }

    public function deleteTags ($tags, $post_id) {

        foreach ($tags as $tag) {
            DB::table('post_tag')->where('post_id', '=', $post_id)->delete();
        }
    }
}
