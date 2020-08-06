<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Video;
use App\Course;
use App\Category;
use App\Subscription;
use App\User;
use App\Package;
use App\CoursePackage;
use App\FreeVideo;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {


        //  if($request->user()) 
        // {
        //    if($request->user()->role->slug == "instructor")
        //     {
        //         return redirect('/instructor/dashboard');
        //     }
        //     else if($request->user()->role->slug == "student")
        //     {
        //         return redirect('/student/dashboard');
        //     }     
        // }

        $packages = [];
        $categories = [];
        $courses = [];
        $coursesCount = Course::all();    
        $videos = Video::all();
        $freeVideo = [];
        if($request->get('search'))
        {
             $search = $request->get('search');
             $categories = Category::where('name','like','%'.$search.'%')->get();
             $courses = Course::where('name','like','%'.$search.'%')->get();
             $packages = Package::where('name','like','%'.$search.'%')->get();
        }else{
            // $courses = Course::all('id', 'name', 'category_id', 'created_at');
            $packages = Package::skip(2)->take(4)->get();;
            $freeVideo = FreeVideo::first();
            
        }
        $instructorUsers = User::where('role_id','=',2)->get();
        $studentUsers = User::where('role_id','=',3)->get();
        return view("welcome", array(
                                    'courses'=>$courses,
                                    'categories'=>$categories,
                                    'instructorUsers'=>$instructorUsers,
                                    'studentUsers'=>$studentUsers,
                                    'coursesCount'=>$coursesCount,
                                    'packages' => $packages,
                                    'videos' => $videos,
                                    'freeVideo' => $freeVideo
                                    )
                    );
    }

    public function searchByCategory(){
        $id =  request('category_id');
        $courses = Course::where('category_id','=',$id)->get();
        $categories = Category::all('id','name');
        return view("welcome", array('courses'=>$courses, 'categories'=>$categories));
    }

    public function courseContent($package_id,$course_id,$video_id=0)
    {
        $videos = Video::where('course_id','=',$course_id)->get();
        $course = Course::find($course_id);
        if(count($videos)>0)
            $video = $video_id!=0? Video::where('id','=',$video_id)->first() : $videos[0];
        else
            $video = "";
        $subscribed = false;
        if(auth()->user()){
        $subscription= Subscription::where('course_id','=',$course_id)->where('user_id','=',auth()->user()->id)->get();
        $subscribed = count($subscription)>0?true:false;
        }

       return view("video",array("course"=>$course, 'videos' => $videos,'video_id'=>$video_id,'course_id'=>$course_id,'video_to_play'=>$video, 'subscribed'=>$subscribed));
    }


  
}
