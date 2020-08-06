<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscription;

class SubscriptionController extends Controller
{
    public function subscribe($user_id, $package_id)
    {
    	$subscription = new Subscription(array(
    				'user_id'=>$user_id,
    				'package_id'=>$package_id
    	));

    	$subscription->save();
		
    	return redirect('package/'.$package_id)->with('status', 'Susbcribed to this package!');
    }
}
