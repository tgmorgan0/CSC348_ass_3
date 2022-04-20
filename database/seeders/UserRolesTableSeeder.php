<?php

namespace Database\Seeders;
use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new UserRole();
        $a->user_id = 1;
        $a->role_type = "standard_user";

        $a = new UserRole();
        $a->user_id = 2;
        $a->role_type = "administrator";
    }
}
