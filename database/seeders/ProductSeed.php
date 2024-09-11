<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;


class ProductSeed extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'ProductTitle' => 'Bilgisayar',
                'ProductCategoryId' => 1,
                'Barcode' => Str::random(10),
                'ProductStatus' => 'aktif',
                'Image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ProductTitle' => 'Atkı',
                'ProductCategoryId' => 2,
                'Barcode' => Str::random(10),
                'ProductStatus' => 'pasif',
                'Image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ProductTitle' => 'Koltuk',
                'ProductCategoryId' => 3,
                'Barcode' => Str::random(10),
                'ProductStatus' => 'pasif',
                'Image' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}