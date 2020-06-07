<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotifController extends Controller
{
    public function getNotif(){
    	if(Auth::guard('user')->check()){
    		$notif = ['count' => 0,'content' => 0, 'created_at' => 0];
    		$notif['count'] = Auth::guard('user')->user()->unreadNotifications->count();
    		$notif['content'] = Auth::guard('user')->user()->unreadNotifications->count();
    		$notif['created_at'] = Auth::guard('user')->user()->unreadNotifications->count();
    		// echo $notif['count'];
    		return json_encode($notif);
    	}elseif (Auth::guard('admin')->check()) {
    		
    	}
    }
}
