<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Package;
use App\Video;
use App\User;
use App\Subscription;
class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	public function index(){
	$packages = Package::all();
	return view("packages", array('packages' => $packages));
	}

	public function packageContent($package_id)
    {
        $package = Package::find($package_id);
        $subscribed = false;
        if(auth()->user()){
        $subscription = Subscription::where('package_id','=',$package_id)->where('user_id','=',auth()->user()->id)->get();
        $subscribed = count($subscription)>0?true:false;
        }
       	return view('package',array('package'=>$package,'subscribed'=>$subscribed));
    }

    public function playVideo($package_id, $video_id=0)
    {
    	$package = Package::find($package_id);
    	
        if(auth()->user()){
        $subscription = Subscription::where('package_id','=',$package_id)->where('user_id','=',auth()->user()->id)->get();
   
            if (count($subscription) == 0) {
                return redirect('package/'.$package_id);
            }
         }
    	if($video_id!=0)
    		$video_to_play = Video::find($video_id);
    	else
    		$video_to_play = $package->courses[0]->videos[0];

    	
    	
    	return view('watch',['package'=>$package,'video'=>$video_to_play]);
    }



}
