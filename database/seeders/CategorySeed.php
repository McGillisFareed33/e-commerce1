<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class CategorySeed extends Seeder
{
    public function run() :void
    {
        // Örnek kategori verileri
        DB::table('categories')->insert([
            [
                'CategoryTitle' => 'Elektronik',
                'CategoryDescription' => 'Elektronik ürünlerin yer aldığı kategori.',
                'Status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'CategoryTitle' => 'Giyim',
                'CategoryDescription' => 'Giyim ve aksesuar ürünlerinin yer aldığı kategori.',
                'Status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'CategoryTitle' => 'Ev & Yaşam',
                'CategoryDescription' => 'Ev ve yaşam ürünlerinin bulunduğu kategori.',
                'Status' => 'pasif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
