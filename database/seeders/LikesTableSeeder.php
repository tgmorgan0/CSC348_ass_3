<?php

namespace Database\Seeders;
use App\Models\Like;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a=new Like();
        $a->comment_id=1;
        $a->user_id=2;
        $a->save();
    }
}
