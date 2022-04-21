<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a= new Post();
        $a->user_id=1;
        $a->post_text = "Found this the other day, absolutely stunning";
        $a->post_image = "path0";
        $a->save();

        $a= new Post();
        $a->user_id=2;
        $a->post_text = "There's something weirdly comforting about mute colours";
        $a->post_image = "path1";
        $a->save();
        
        $a= new Post();
        $a->user_id=3;
        $a->post_text = "LOG BURNER!!!";
        $a->post_image = "path2";
        $a->save();

        $a= new Post();
        $a->user_id=4;
        $a->post_text = "I can already see myself relaxing here after a hard day's work";
        $a->post_image = "path3";
        $a->save();

        $a= new Post();
        $a->user_id=5;
        $a->post_text = "We really been sleeping on this, huh?";
        $a->post_image = "path4";
        $a->save();

        Post::factory()->count(5)->create();
    }
}
