<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('ProductTitle');
            $table->string('ProductCategoryId')->nullable();
            $table->string('Barcode');
            $table->string('ProductStatus');
            $table->string('Image')->nullable(); //default eklenerek belli bir sayfaya yönlendirilebilir sayfa silindiğinde
            $table->timestamps();
            $table->softDeletes(); 
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
