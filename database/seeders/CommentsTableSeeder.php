<?php

namespace Database\Seeders;
use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a=new Comment();
        $a->post_id=1;
        $a->user_id=1;
        $a->comment_text="Lorem Ipsum";
        $a->save();

        $a=new Comment();
        $a->post_id=1;
        $a->user_id=2;
        $a->comment_text="Lorem Ipsum";
        $a->save();
    }
}
