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

class AdminController extends Controller
{
    public function index(){
        if(Auth::guard('admin')->check()){
            $transaksi = Transaction::whereMonth('created_at','=', date('m'))->whereYear('created_at','=', date('Y'))->get();
            $status = ['unverified' => 0,'expired' => 0, 'cancelled' => 0, 'verified' => 0, 'success' => 0, 'harga' => 0, 'total' => $transaksi->count()];
            $status['unverified'] = $this->findCountStatus('unverified',1);
            $status['expired'] = $this->findCountStatus('expired',1);
            $status['cancelled'] = $this->findCountStatus('cancelled',1);
            $status['verified'] = $this->findCountStatus('verified',1);
            $status['success'] = $this->findCountStatus('success',1);

            foreach($transaksi as $item){
                if($item->status == 'verified' || $item->status == 'success'){
                    $status['harga'] = $status['harga'] + $item->total;
                }
            }

            $transaksi_tahun = Transaction::whereYear('created_at','=', date('Y'))->get();
            $status_tahun = ['unverified' => 0,'expired' => 0, 'cancelled' => 0, 'verified' => 0, 'success' => 0, 'harga' => 0, 'total' => $transaksi->count()];
            $status_tahun['unverified'] = $this->findCountStatus('unverified',2);
            $status_tahun['expired'] = $this->findCountStatus('expired',2);
            $status_tahun['cancelled'] = $this->findCountStatus('cancelled',2);
            $status_tahun['verified'] = $this->findCountStatus('verified',2);
            $status_tahun['success'] = $this->findCountStatus('success',2);

            foreach($transaksi_tahun as $item_y){
                if($item_y->status == 'verified' || $item_y->status == 'success'){
                    $status_tahun['harga'] = $status_tahun['harga'] + $item_y->total;
                }
            }

            for($i = 1;$i<=12;$i++){
                $bulan[$i] = $transaksi = Transaction::whereMonth('created_at','=', $i)->whereYear('created_at','=', date('Y'))->count();
                // echo $bulan[$i];
            }
            // dd($bulan);

            return view('admin.dashboard',compact('status','transaksi','transaksi_tahun','status_tahun','bulan'));
        }else{
            return redirect('/adminLogin');
        }
        
    }

    public function findCountStatus($status, $cek)
    {
        if($cek == 1){
            $count = Transaction::whereMonth('created_at','=', date('m'))->whereYear('created_at','=', date('Y'))->where('status',$status)->count();
        }else{
            $count = Transaction::whereYear('created_at','=', date('Y'))->where('status',$status)->count();
        }
        return $count;
    }

    public function loginAdmin(Request $request){
    	$dataAdmin=Admin::where('username',$request->username)->first();
    	if($dataAdmin!=null){
    		if(Hash::check($request->password,$dataAdmin->password)){
    			//password dan username yg diinput dan di db sesuai
    			Auth::guard('admin')->LoginUsingId($dataAdmin->id);//auth guard untuk nentuin role yg login sbg apa
    			return redirect('/dashboardAdmin');
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
            // echo "sukses logot";
    		Auth::guard('admin')->logout();
    	}
    	return redirect('/');
    }
}
