<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subscription;
use App\Course;
use App\Category;
use App\Package;
class WelcomeController extends Controller
{
    //
    public function enrolledCourses($user_id)
    {
    	 $user = User::find($user_id);
    	 if($user)
    	 {
    	 	$subscriptions = Subscription::where('user_id','=',$user_id)->get();
    		$username = $user->first()->name;
    	 }else{
    	 	return view('unauthorized',['role'=>'guest']);
    	 }

    	 
    	return view('enroll',['subscriptions'=>$subscriptions,'username'=>$username]);
     // return $subscriptions;
    }
    public function getSearch(Request $request){
        
        $searchKeyword = $request->get('search');

        $categories = Category::where('name','like','%'.$search.'%')->get();
        $course = Course::where('name','like','%'.$search.'%')->get();
        $package = Package::where('name','like','%'.$search.'%')->get();

        return view('welcome');
    }
}
