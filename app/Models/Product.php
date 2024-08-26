<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Authenticatable
{
    
    use Notifiable;

    // Diğer model özellikleri ve ilişkiler
    protected $fillable = [
        'ProductTitle', 'ProductCategoryId','Barcode','ProductStatus'
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            // Kategoriye bağlı ürünlerin kategori ID'sini null yap
            Product::where('ProductCategoryId', $category->id)->update(['ProductCategoryId' => null]);
        });
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'ProductCategoryId');
    }
}
