<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticateable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticateable
{
	protected $table='admins';
    protected $guard='admin';
    protected $fillable=['username','name','password'];
    protected $hidden=['password'];
}
