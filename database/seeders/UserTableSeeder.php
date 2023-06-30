<?php

namespace Database\Seeders;

use App\Constants\RoleConstant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $users = [
            [
                'name' => 'Sharad Yadav',
                'email' => 'sharad08101@gmail.com',
                'password' => 'password',
                'number' => '9867157800',
                'role_id' => RoleConstant::ADMIN_ID
            ],
            [

                'name' => 'Ganesh Pant',
                'email' => 'ganesh3076@gmail.com',
                'password' => 'password',
                'number' => '986663076',
                'role_id' => RoleConstant::STUDENT_ID
            ],
            [

                'name' => 'sunil adhikari',
                'email' => 'sunil1@gmail.com',
                'password' => 'password',
                'number' => '986157800',
                'role_id' => RoleConstant::TEACHER_ID
            ]
        ];

        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
