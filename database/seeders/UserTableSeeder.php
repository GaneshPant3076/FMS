<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users=[
            [
                'name'=>'Sharad Yadav',
                'email'=>'sharad08101@gmail.com',
                'number'=>'9867157800',
                'role_id'=>'1'
            ],
            [

                'name'=>'Ganesh Pant',
                'email'=>'ganesh3076@gmail.com',
                'number'=>'986663076',
                'role_id'=>'1'
            ],
            [

                'name'=>'sunil adhikari',
                'email'=>'sunil1@gmail.com',
                'number'=>'986157800',
                'role_id'=>'2'
            ]
            ];
            User::truncate();
                foreach($users as $user){
                    User::create($user);
                }
    }
}
