<?php  

/**
 * summary
 */
namespace App\Http\Controllers;

use App\OTPResult;
class Otp
{
    /**
     * summary
     */
    public function __construct()
    {
        
    }

    public static function sendOTP($mobile,$message)
    {
    	$message = "One Time Password: ".$message;
    	// $message = urlencode($message);
   
    	$url = "http://sms.webhouse.co.in/api/mt/SendSMS?user=onlinetest&password=Webhouse@2020&senderid=OTGuru&channel=Trans&DCS=0&flashsms=0&number=91{$mobile}&text={$message}&route=10";

		$ch = curl_init($url);
     	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     	$result = curl_exec($ch); 
     	$otpResult = new OTPResult([
					        		'result'=>$result
						    	  ]);
	    $otpResult->save();
    }
}

?>