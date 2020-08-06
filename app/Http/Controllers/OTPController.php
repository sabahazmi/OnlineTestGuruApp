<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OTPResult;

class OTPController extends Controller
{
 public function sendOTP($msg,$mobile){



    // Data for text message. This is the text message data.
    $numbers = $mobile; // A single number or a comma-seperated list of numbers
    $message = "One Time Password: ".$msg;
    // 612 chars or less
    // A single number or a comma-seperated list of numbers
    $message = urlencode($message);
    // $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
    $url = "http://sms.webhouse.co.in/api/mt/SendSMS?user=onlinetest&password=Webhouse@2020&senderid=OTGuru&channel=Trans&DCS=0&flashsms=0&number=91{$numbers}&text={$message}&route=10";


    $ch = curl_init($url);
    // curl_setopt($ch, CURLOPT_POST, true);
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch); // This is the result from the API
    curl_close($ch);
    $optresult = new OTPResult([
        'result'=>$result
    ]);
    $optresult->save();
    }

    public function generatePassword()
    {
      $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
                '0123456789!@#$%^&*()';
  
      $str = '';
      $max = strlen($chars) - 1;

      for ($i=0; $i < 8; $i++)
        $str .= $chars[rand(0, $max)];

      return $str;
    }
}
