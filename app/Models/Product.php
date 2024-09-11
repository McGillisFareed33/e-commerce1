<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;


class Product extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    // Diğer model özellikleri ve ilişkiler
    protected $fillable = [
        'ProductTitle', 'ProductCategoryId','Barcode','ProductStatus','Image'
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            Product::where('ProductCategoryId', $category->id)->update(['ProductCategoryId' => null]);
        });
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'ProductCategoryId');
    }
}
