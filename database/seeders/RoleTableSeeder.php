<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles=[
            [
                'name'=>'Admin'
            ],
            [
                'name'=>'Student'
            ]
            ];
            Role::truncate();
            foreach($roles as $role){
                Role::create($role);
            }
    }
}
