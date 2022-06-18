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
            [
               'name'=>'Kebijakan',
               'email'=>'kebijakan@gmail.com',
               'no_hp'=>'081234567891',
               'password'=> Hash::make('12345'),
               'role'=>'kebijakan',
               'image'=>'noimg.jpg',
            ],
            [
               'name'=>'Sanksi',
               'email'=>'sanksi@gmail.com',
               'no_hp'=>'081234567892',
               'password'=> Hash::make('12345'),
               'role'=>'sanksi',
               'image'=>'noimg.jpg',
            ],
            [
               'name'=>'Surat Tugas',
               'email'=>'st@gmail.com',
               'no_hp'=>'081234567893',
               'password'=> Hash::make('12345'),
               'role'=>'st',
               'image'=>'noimg.jpg',
            ],
            [
               'name'=>'Profesi Keuangan',
               'email'=>'profkeu@gmail.com',
               'no_hp'=>'081234567894',
               'password'=> Hash::make('12345'),
               'role'=>'profkeu',
               'image'=>'noimg.jpg',
            ],
            [
               'name'=>'Perizinan',
               'email'=>'perizinan@gmail.com',
               'no_hp'=>'081234567895',
               'password'=> Hash::make('12345'),
               'role'=>'perizinan',
               'image'=>'noimg.jpg',
            ],
            [
               'name'=>'User',
               'email'=>'user@gmail.com',
               'no_hp'=>'081234567896',
               'password'=> Hash::make('12345'),
               'role'=>'user',
               'image'=>'noimg.jpg',
            ],
        ]; 
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
