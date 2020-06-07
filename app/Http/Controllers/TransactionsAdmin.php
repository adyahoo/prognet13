<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use App\Admin;
use App\User;
use App\Transaction;
use App\Product;
use App\Courier;
use App\Response;
use App\Product_Review;
use App\Notifications\AdminResponse;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UpdateStatus;

class TransactionsAdmin extends Controller
{
	public function __construct(){
		$this->middleware('isAdmin');
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

    public function konfirmasiAdmin(){
        $admin = Auth::guard('admin')->user();
        $transactions = Transaction::with('User','Courier')->get();
        $proof = Transaction::get('proof_of_payment');
        // echo $proof;
        return view('admin.konfirmasi',compact('admin','transactions','proof'));
    }

public function review(){
        $all_review = Product_Review::with('User','Product')->get();
        $admin = Auth::guard('admin')->user();
        return view('admin.response',compact('all_review','admin'));
    }

    public function response(Request $request){
        // dd($request);
        $notif_id = $request->id_user;
        Response::create([
            'review_id' => $request->id_review,
            'admin_id' => $request->id_admin,
            'content' => $request->content
        ]);
        $review = Product_Review::where('id',$request->id_review)->first();
        $user = User::where('id',$notif_id)->first();
        $user->notify(new AdminResponse($review->product_id));

        return redirect('/responseadmin');
    }

    public function deleteResponse($id){
        // echo $id;
        Product_Review::destroy($id);
        return redirect('/responseadmin');        
    }

    public function declineKonf($id){
        // echo $id;
        Transaction::where('id',$id)->update([
            'status' => 'canceled'
        ]);
        return redirect('/konfirmasiAdmin');
    }

    public function updateKonf(Request $request){
        // dd($request);
        Transaction::where('id',$request->id_transaction)->update([
            'status' => 'verified'
        ]);
        $trans = Transaction::where('id',$request->id_transaction)->first();
        $user = User::where('id',$trans->user_id)->first();
        // dd($user);
        $user->notify(new UpdateStatus());
        return redirect('/konfirmasiAdmin');
    }

    public function dataAdmin(){
        $admins = Admin::all();
        return view('admin.dataadmin', compact('admins'));
    }

    public function dataUser(){
        $users = User::all();
        return view('admin.datauser', compact('users'));
    }

}
