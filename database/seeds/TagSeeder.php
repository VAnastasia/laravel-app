<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            '#природа',
            '#спорт',
            '#отдых',
            '#музыка',
            '#кино',
            '#хобби',
            '#юмор'
        ];

        foreach ($tags as $value) {
            $tag = new Tag(['name' => $value]);
            $tag->save();
        }
    }
}
