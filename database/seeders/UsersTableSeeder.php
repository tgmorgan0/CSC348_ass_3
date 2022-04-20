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
        $a->name="jhanderson4";
        $a->password="essex";
        $a->email="jhanderson4@hotmail.com";
        $a->save();
        $a->interest()->attach(1);
        $a->interest()->attach(3);
        
        $a = new User();
        $a->name="khanderson4";
        $a->password="essex";
        $a->email="khanderson4@gmail.com";
        $a->save();
        $a->interest()->attach(2);
        $a->interest()->attach(4);
    }
}
