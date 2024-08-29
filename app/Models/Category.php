<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;


class Category extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    // Diğer model özellikleri ve ilişkiler
    protected $fillable = [
        'CategoryTitle', 'CategoryDescription','Status'
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'ProductCategoryId');
    }
    
}
