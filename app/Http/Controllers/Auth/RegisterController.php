<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Admin;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $this->middleware('guest:admin');
    }

    public function showRegisterFormAdmin(){
        return view('auth.register', ['url'=>'admin']);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:10'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    public function createAdmin(Request $request){
        $this->validator($request->all())->validate();
        // Admin::create([
        //     'username' => $request['username'],
        //     'password' => Hash::make($request['password']),
        // ]);
        $admin = new Admin;
        $admin->username = $request->username;
        $admin->name = $request->name;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->intended('login/admin');
        // echo "sukses admin regis";
    }

    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            // 'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
