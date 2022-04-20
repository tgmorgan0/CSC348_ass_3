<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a=new interest();
        $a->interest="Science";
        $a->save();

        $a=new interest();
        $a->interest="History";
        $a->save();

        $a=new interest();
        $a->interest="Sport";
        $a->save();

        $a=new interest();
        $a->interest="Gambling";
        $a->save();

        $a=new interest();
        $a->interest="Films";
        $a->save();

        
    }
}
