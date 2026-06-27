<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Riddhi Desai',
            'email'=>'riddhidesai33@gmail.com',
            'password'=>'Riddhi33@',
            'role'=>'student'
        ]);

        User::create([
            'name'=>'Pradip Singh',
            'email'=>'PS24@gmail.com',
            'password'=>'Pradip$56',
            'role'=>'recruiter'
        ]);

        User::create([
            'name'=>'Sameer Shekhavat',
            'email'=>'Rim10@gmail.com',
            'password'=>'Himanshu&22',
            'role'=>'admin'
        ]);
    }
}
