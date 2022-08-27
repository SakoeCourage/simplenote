<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Post::factory()->count(10)->create();
        // DB::table('posts')->insert([
        //     'user_id' => mt_rand(1,10),
        //     'caption' => Str::random(10),
        //     'body' => Str::random(21),
        //     'image'=> 'https://source.unsplash.com/collection/928423/480x480'

        // ]);
    }
}
