<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a=new Notification();
        $a->user_id=1;
        $a->notifiable_id=1;
        $a->notifiable_type='App\Models\Post';
        $a->save();

        $a=new Notification();
        $a->user_id=1;
        $a->notifiable_id=1;
        $a->notifiable_type='App\Models\Comment';
        $a->save();

    }
}
