<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginUser(Request $request){
    	$dataUser=User::where('email',$request->email)->first();
    	if($dataUser!=null){
    		if(Hash::check($request->password,$dataUser->password)){
    			//password dan username yg diinput dan di db sesuai
    			Auth::guard('user')->LoginUsingId($dataUser->id);//auth guard untuk nentuin role yg login sbg apa
    			return redirect('/userHome');
    			// echo "login user sukses";
    		}else{
    			return redirect('/userLogin')->with('alert',"email atau password salah");
    		}
    	}else{
    		return redirect('/userLogin')->with('alert',"Ulang login");
    	}
    }

    public function logoutUser(){
    	if(Auth::guard('user')->check()){
    		Auth::guard('user')->logout();
    	}
    	return redirect('/userHome');
    }

    public function registerUser(Request $request){
    	$pesan = [
            'required' => ':attribute wajib',
            'max' => ':attribute maksimal :max karakter',
            'min' => ':attribute minimal :min karakter',
        ];

        $this->validate($request,[
    		'email'=>'required|email',
    		'name'=>'required|max:255',
    		'password'=>'required|min:4'
    	],$pesan);
    	$user= new User;
    	$user->email=$request->email;
    	$user->name=$request->name;
    	$user->password=Hash::make($request->password);
    	$user->save();
    	return redirect('/userLogin');
    	// echo "regis sukses";
    }
}
