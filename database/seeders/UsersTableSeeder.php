<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new User();
        $a->name="John Anderson";
        $a->password=bcrypt("fakefake");
        $a->email="jhanderson4@hotmail.com";
        $a->save();
        $a->interests()->attach(1);
        $a->interests()->attach(3);
        
        $a = new User();
        $a->name="Kyle Anderson";
        $a->password=bcrypt("fakefake");
        $a->email="khanderson4@gmail.com";
        $a->save();
        $a->interests()->attach(2);
        $a->interests()->attach(4);

        User::factory()->count(3)->create();
    }
}
