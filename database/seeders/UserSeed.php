<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeed extends Seeder
{
    
    public function run(): void
    {$UserData = [
        ['Username' => 'Poyraz', 'UserTitle' => 'Poyraz-1', 'role' => 'admin'],
        ['Username' => 'Erkam', 'UserTitle' => 'Erkam-2', 'role' => 'provisor'],
        ['Username' => 'Buğra', 'UserTitle' => 'Buğra-3', 'role' => 'admin'],
        ['Username' => 'Emirhan', 'UserTitle' => 'Emirhan-4', 'role' => 'provisor'],
        ['Username' => 'Kerem', 'UserTitle' => 'Kerem-5', 'role' => 'provisor'],
    ];
    foreach ($UserData as $data) {
        DB::table('users')->insert([
            'Username' => $data['Username'],
            'UserTitle' => $data['UserTitle'],
            'Password' => Hash::make('123456'),
            'role' => $data['role'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]);
        }
          
    }

}

