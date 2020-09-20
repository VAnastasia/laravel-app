<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 50)->create()
        ->each(function ($user) {
            factory(App\Models\Post::class, rand(1, 5))->create(
                [
                    'user_id' => $user->id
                ]
            )
            ->each(function ($post) {
                $tag_ids = range(1, 7);
                shuffle($tag_ids);
                $assingments = array_slice($tag_ids, 0, rand(0, 5));
                foreach($assingments as $tag_id) {
                    DB::table('post_tag')
                        ->insert(
                            [
                                'post_id' => $post->id,
                                'tag_id' => $tag_id,
                                'created_at' => Now(),
                                'updated_at' => Now()
                            ]
                        );
                }

                factory(App\Models\Comment::class, rand(0, 5))->create([
                    'user_id' => rand(1, 50),
                    'post_id' => $post->id
                ]);
            });
        });
    }
}
