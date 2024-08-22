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
        // Örnek veri ekleme
        DB::table('products')->insert([
            [
                'ProductTitle' => 'Ürün 1',
                'ProductCategoryId' => 1,
                'Barcode' => Str::random(10),
                'ProductStatus' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ProductTitle' => 'Ürün 2',
                'ProductCategoryId' => 2,
                'Barcode' => Str::random(10),
                'ProductStatus' => 'pasif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ProductTitle' => 'Ürün 3',
                'ProductCategoryId' => 3,
                'Barcode' => Str::random(10),
                'ProductStatus' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}