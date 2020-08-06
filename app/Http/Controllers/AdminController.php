<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Course;
use App\Category;
use App\User;
use App\Role;
use App\Subscription;
use App\Package;
use App\CoursePackage;
use App\FreeVideo;


class AdminController extends Controller
{
    //
      public function __construct()
    {
       // $this->middleware('auth');
       $this->middleware('admin');
    }
    public function dashboard(){

      $courses = Course::all('id', 'name', 'category_id', 'created_at');
      $categories = Category::all('id','name');
      $users = User::all();
      $studentUsers = User::where('role_id','=',3)->get();
     // return view("instructor.dashboard",array('videos' => $videos,'video_id'=>$video_id,'course_id'=>$course_id,'video_to_play'=>$video));
      return view("admin.dashboard", array('courses'=>$courses,'categories'=>$categories,'users'=>$users, 'studentUsers'=>$studentUsers));
    }
    public function category(){
      $categories = Category::all();
      return view("admin.category", array('categories'=>$categories));
    }
    public function course(){
      $categories = Category::all();
      $courses = Course::all();
      return view("admin.course", array('courses'=>$courses, 'categories'=>$categories));
    }
    public function user(){
      $instructorUsers = User::where('role_id','=',2)->get();
      $studentUsers = User::where('role_id','=',3)->get();
      return view("admin.user", array('instructorUsers'=>$instructorUsers, 'studentUsers'=>$studentUsers));
    }
    public function showVideo($id){
        $courses = Course::all('id', 'name');
        $video = Video::find($id);
        // $videos = Video::('id', 'title', 'course_id', 'file_url', 'is_approved');
       
        return view("admin.video", array('videos' => $video));
    }

    public function videoAdmin(){

        $videos = Video::paginate(10);
        $courses = Course::all('id','name');
        $categories = Category::all('id','name');
        $freeVideo = FreeVideo::all()->first();
        //all('id', 'title', 'course_id', 'file_url', 'is_approved');
        return view("admin.video",array('videos' => $videos, 'courses'=>$courses, 'categories'=>$categories, 'freeVideo'=>$freeVideo));
    }

    public function approveVideo($id){
        $video = Video::find($id);
        $video->is_approved = 1;
        $video->save();
        return redirect('admin/video')->with('status', 'Video Approved!');
    }
    public function rejectVideo($id){
        $video = Video::find($id);
        $video->is_approved = 0;
        $video->save();
        return back()->with('status', 'Video Rejected!');
    }
    public function package(){
        $courses = Course::all('id', 'name', 'category_id', 'created_at');
        // $categories = Category::all('id','name');
        return view("admin.package", array('courses' => $courses));
    }

    public function createPackage(Request $request){
      $package = new Package();
      $package->name = request('name');
      $package->price = request('price');
      $package->save();
  
      $course_ids = request('course_id');

      foreach($course_ids as $course_id) {
          $course_package = new CoursePackage();
          $course_package->package_id = $package->id;
          $course_package->course_id = $course_id;
          $course_package->save();
      }

      return redirect('admin/package')->with('status', 'Package Sucessfully Created!');
    }

    public function freeVideo($id)
    {

      $video = FreeVideo::find(1);
      if(!$video)
      {
        $video = new FreeVideo(['id'=>1,'video_id'=>$id]);
        $video->save();
      }else{
        $video->video_id = $id;
        $video->update();
      }
      return redirect('admin/video');
    }
}
