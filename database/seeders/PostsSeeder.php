<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Test Post',
            'content' => 'test content',
            'thumbnail' => null,
            'author_id' => 1,
            'keywords' => 'k',
            'tags' => 't'
        ]);
    }
}
