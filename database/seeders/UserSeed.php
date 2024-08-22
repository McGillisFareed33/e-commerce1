<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeed extends Seeder
{
    
    public function run(): void
    {
        $UserName=['Poyraz'=>'Poyraz-1','Erkam'=>'Erkam-2','Buğra'=>'Buğra-3','Emirhan'=>'Emirhan-4'];
        foreach($UserName as $UsNa=>$UsTi){
        DB::table('users')->insert([
            'Username'=>$UsNa,
            'UserTitle'=>$UsTi,
            'Password'=>123456, 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
          
        }

    }
}
