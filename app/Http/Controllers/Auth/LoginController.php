<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use App\Http\Controllers\Auth\Request;
use Illuminate\Http\Request;
use Auth;
// use Validator;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:user')->except('logout');
    }

    public function showLoginFormAdmin(){
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request){
        $request->validate([
            'username' => 'required|max:10',
            'password' => 'required|min:4'
        ]);
        // echo "sukses admin login";
        if(Auth::guard('admin')->attempt(['username'=>$request->username, 'password'=>$request->password], $request->get('remember'))){
            return redirect('/admin');
        }
        return redirect()->intended('/admin');
        // return back()->withInput($request->only('username','remember'));
    }

    public function logoutAdmin(){
        // if(Auth::guard('admin')->check()){
        //     Auth::guard('admin')->logout();
        // }
        // return redirect('/login/admin');
        echo "logout sukses";
    }
}
