<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $user = User::get();
        return view('user.home',compact('user'));
    }

    public function loginUser(Request $request){
    	$dataUser=User::where('email',$request->email)->first();
    	if($dataUser!=null){
    		if(Hash::check($request->password,$dataUser->password)){
    			//password dan username yg diinput dan di db sesuai
                //fiqr
    			Auth::guard('user')->LoginUsingId($dataUser->id);//auth guard untuk nentuin role yg login sbg apa
    			return redirect('/profiluser');

    			// Auth::guard('user')->LoginUsingId($dataUser->id) ;//auth guard untuk nentuin role yg login sbg apa
       //          // $userName = Auth::guard('user')->user()->id;
    			// return redirect('/dashboardUser');
    			// echo "login user sukses";
    		}else{
    			return redirect('/userLogin')->with('alert',"email atau password salah");
    		}
    	}else{
    		return redirect('/userLogin')->with('alert',"Ulang login");
		}
		$userid = Auth::guard('user')->user()->id;
		$userName = Auth::guard('user')->user()->name;
    }

    public function logoutUser(){
    	if(Auth::guard('user')->check()){
            // $userid = Auth::guard('user')->user()->name;
            // echo $userid;
    		Auth::guard('user')->logout();
    	}
    	return redirect('/');
	}

	public function TampilUser(){
        if(Auth::guard('user')->check()){
    		$userName = Auth::guard('user')->user()->name;
            return view('user.profiluser',compact('userName'));
        }else{
            return redirect('/userLogin');
        }
    }

    public function registerUser(Request $request){
        //masukkan file upload ke variable dan tujuan file
        $file = $request->file('profile_image');
        $path = 'userProfile';
        $name_file = $file->getClientOriginalName()."_".$request->name."_".time();

        //proses upload ke storage larapel
        $file->move($path,$name_file);

    	$pesan = [
            'required' => ':attribute wajib',
            'max' => ':attribute maksimal :max karakter',
            'min' => ':attribute minimal :min karakter',
        ];

        $this->validate($request,[
    		'email'=>'required|email',
    		'name'=>'required|max:255',
    		'password'=>'required|required_with:conf_password|same:conf_password|min:4',
            'conf_password'=>'min:4',
    	],$pesan);
    	$user= new User;
    	$user->email=$request->email;
    	$user->name=$request->name;
    	$user->password=Hash::make($request->password);
        $user->profile_image=$name_file;
        $user->status=1;
    	$user->save();
    	return redirect('/dashboardUser');
    	// echo "regis sukses";
    }
}
