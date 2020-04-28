<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
	// public function __construct(){
	// 	$this->middleware('guest:admin')->except('logoutAdmin');
	// }

    public function index(){
        $admin = Admin::get();
        return view('admin.home',compact('admin'));
    }

    public function loginAdmin(Request $request){
    	$dataAdmin=Admin::where('username',$request->username)->first();
    	if($dataAdmin!=null){
    		if(Hash::check($request->password,$dataAdmin->password)){
    			//password dan username yg diinput dan di db sesuai
    			Auth::guard('admin')->LoginUsingId($dataAdmin->id);//auth guard untuk nentuin role yg login sbg apa
    			return redirect('/dashboard');
    			// echo "login admin sukses";
    		}else{
    			return redirect('/adminLogin')->with('alert',"username atau password salah");
    		}
    	}else{
    		return redirect('/adminLogin')->with('alert',"Ulang login");
    	}
    }

    public function logoutAdmin(){
    	if(Auth::guard('admin')->check()){
    		Auth::guard('admin')->logout();
    	}
    	return redirect('/');
    }

    public function registerAdmin(Request $request){
    	//menyimpan file yg diupload ke variable
        $file = $request->file('profile');
        // echo $file->getClientOriginalName();
        // echo $request->name;;

        //direktori tempat file yg diupload disimpan
        // $path = $request->file('profile')->store('adminProfile');
        $path = 'adminProfile';
        $name_file = $file->getClientOriginalName()."_".$request->username."_".time();

        //upload file ke storage larapel
        $file->move($path,$name_file);

        $pesan = [
            'required' => ':attribute wajib diisi',
            'unique' => ':attribute sudah ada',
            'max' => ':attribute maksimal :max karakter',
            'min' => ':attribute minimal :min karakter',
        ];

        $this->validate($request,[
    		'username'=>'required|unique:admins|max:10',
    		'name'=>'required|max:255',
    		'password'=>'required|required_with:conf_password|same:conf_password|min:4',
            'conf_password' => 'min:4',
            'phone' => 'max:13',
    	],$pesan);

    	$admin= new Admin;
    	$admin->username=$request->username;
    	$admin->name=$request->name;
    	$admin->password=Hash::make($request->password);
        $admin->profile_image=$name_file;
        $admin->phone=$request->phone;
    	$admin->save();
    	return redirect('/dashboard');
    	// echo "regis sukses";
    }
}
