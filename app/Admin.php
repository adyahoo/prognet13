<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticateable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticateable
{
    use Notifiable;
    
	protected $table='admins';
    protected $guard='admin';
    protected $fillable=['username','name','password'];
    protected $hidden=['password'];

    public function isAdmin(){
        return $this->admin;
    }

    public function response(){
    	return $this->hasMany('App\Response');
    }

    public function notifications(){
        return $this->morphMany(admin_notification::class, 'notifiable')->orderBy('created_at', 'desc');
    }
}
