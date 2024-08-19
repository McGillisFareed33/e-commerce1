<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    
    public function run(): void
    {
        $category=['Elektronik','Beyaz eşya','Kozmetik'];
        foreach($category as $cat){
        DB::table('users')->insert([
            'name'=>$cat,
            'email'=>"poyraz_7533@hotmail.com",
            'password'=>md5('102030')
        ]);
        }

    }
}
