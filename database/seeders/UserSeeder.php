<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@gmail.com',
               'no_hp'=>'081235678901',
               'password'=> Hash::make('12345'),
               'role'=>'admin',
               'image'=>'noimg.jpg',
            ],
            [
               'name'=>'Dazzler',
               'email'=>'dazzlerind07@gmail.com',
               'no_hp'=>'081234567890',
               'password'=> Hash::make('fakhri123'),
               'role'=>'user',
               'image'=>'noimg.jpg',
            ],
        ]; 
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
