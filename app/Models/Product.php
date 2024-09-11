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

    protected $fillable = [
        'ProductTitle', 'ProductCategoryId','ProductStatus','Image'
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {//kategori silince product'taki kategori silinmesi
            Product::where('ProductCategoryId', $category->id)->update(['ProductCategoryId' => null]);
        });
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'ProductCategoryId');
    }
}
