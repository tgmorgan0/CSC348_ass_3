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
        $a->text = "Found this the other day, absolutely stunning";
        $a->image = "a picture of a living room";
        $a->save();

        $a= new Post();
        $a->text = "There's something weirdly comforting about mute colours";
        $a->image = "a picture of a room with muted colours";
        $a->save();
        
        $a= new Post();
        $a->text = "LOG BURNER!!!";
        $a->image = "a picture of a room with a fireplace";
        $a->save();

        $a= new Post();
        $a->text = "I can already see myself relaxing here after a hard day's work";
        $a->image = "a picture of an asylum cell";
        $a->save();

        $a= new Post();
        $a->text = "We really been sleeping on this, huh?";
        $a->image = "a picture of a wallpapered room, the pattern's weird";
        $a->save();
    }
}
