<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Course;
use App\Category;

class StudentController extends Controller
{
   //
      public function __construct()
    {
       // $this->middleware('auth');
       $this->middleware('student');
    }
    public function studentDashboard(){
        $courses = Course::all('id', 'name', 'category_id', 'created_at');
        $categories = Category::all('id','name');
       // return view("instructor.dashboard",array('videos' => $videos,'video_id'=>$video_id,'course_id'=>$course_id,'video_to_play'=>$video));
        return view("student.dashboard", array('courses'=>$courses,'categories'=>$categories));
    }
    
}
