<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Username', 'UserTitle', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];
    protected static function boot()
    {
        
        parent::boot();
        /*
        static::creating(function ($user) {
            // UserTitle'ı oluştur
            // 'id' kullanıcı kaydedilmeden önce oluşturulamaz, dolayısıyla 'creating' olayında sadece 'Username' kullanılır
            $user->UserTitle = $user->Username;
        });

        static::created(function ($user) {
            // UserTitle'ı oluştur ve güncelle
            $user->UserTitle = $user->Username . '-' . $user->id;
            $user->save();
        });
        */
    }
}