<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    
    public function run(): void
    {$UserData = [
        ['Username' => 'Poyraz', 'UserTitle' => 'Poyraz-1', 'Role' => 'admin'],
        ['Username' => 'Erkam', 'UserTitle' => 'Erkam-2', 'Role' => 'user'],
        ['Username' => 'Buğra', 'UserTitle' => 'Buğra-3', 'Role' => 'user'],
        ['Username' => 'Emirhan', 'UserTitle' => 'Emirhan-4', 'Role' => 'user'],
        ['Username' => 'Kerem', 'UserTitle' => 'Kerem-5', 'Role' => 'user'],
    ];
    foreach ($UserData as $data) {
        DB::table('users')->insert([
            'Username' => $data['Username'],
            'UserTitle' => $data['UserTitle'],
            'Password' => '123456',
            'Role' => $data['Role'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
          
        }

    }

