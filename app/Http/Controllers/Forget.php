<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
 
class Forget extends Controller
{
    public function index(){
    	return view('forget');
    }


    public function forgetPassword(Request $request)
    {
    	$mobile  = $request->mobile;
    	$user = User::where('mobile', '=', $mobile)->first();
    	if($user){
    		// code to resset and send otp
    		$newPassword = app('App\Http\Controllers\OTPController')->generatePassword();

    		app('App\Http\Controllers\OTPController')->sendOTP($newPassword, $mobile);
    		$user->update(['password'=> Hash::make($newPassword)]);
    		
    		return redirect('forget')->with('status', 'New password has been sent to your mobile');

    	}else{
    		// redirect user doesnot exit view
    		return redirect('forget')->with('status', 'User does not exist');
    	}


    }
}
