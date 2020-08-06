<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Otp;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:10']
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $users = User::where('mobile','=',$data['mobile'])->get();
        if($users->count()>0){
            return redirect('/register')->with('status','Number already registered! Please login.');
        }
        $password = $this->generatePassword();
        $user = User::create([
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'role_id' => $data['role_id'],
            // 'email' => $data['email'],
            'password' => Hash::make($password),
        ]);
        Otp::sendOTP($data['mobile'], $password);
        return $user;
    }

    public function generatePassword()
    {
      $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
                '0123456789!@#$%^&*()';

      $str = '';
      $max = strlen($chars) - 1;

      for ($i=0; $i < 8; $i++)
        $str .= $chars[random_int(0, $max)];

      return $str;
    }
}

