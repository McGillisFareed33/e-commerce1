<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Username','UserTitle', 'Password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected static function boot()
    {
        parent::boot();

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
    }
}