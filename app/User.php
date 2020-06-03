<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table='users';
    protected $guard='user';
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function transaction()
    {
    	return $this->belongTo('App\Transaction');
    }

    public function review(){
        return $this->hasMany(Product_Review::class);
    }

    public function notifications(){
        return $this->morphMany(user_notification::class, 'notifiable')->orderBy('created_at', 'desc');
    }
}
