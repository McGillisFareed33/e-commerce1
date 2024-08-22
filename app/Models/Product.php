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
}
