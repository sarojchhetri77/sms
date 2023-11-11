<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->name = "saroj";
        $admin->role = "admin";
        $admin->email = "chhetrisaroj150@gmail.com";
        $admin->password = Hash::make("saroj@123");
        $admin->save();
    }
}
