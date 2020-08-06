<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE Illuminate\Support\Facades\Auth;
use App\Category;
use App\Course;

class CourseController extends Controller
{
	public function __construct()
    {
       // $this->middleware('auth');
       // $this->middleware('instructor');
    }
	public function index(){
		$categories = Category::all('id', 'name');
		$courses = Course::all('id', 'name', 'description', 'category_id', 'created_by');
		return view("course", array('categories'=>$categories), array('courses' => $courses));
	}
    //
    public function addCourse(){
    	$course = new Course();
    	$course->category_id = request('category_id');
        $course->name = request('name');
        $course->description = request('description');
    	$course->created_by = Auth::user()->id;
    	$course->save();
		return redirect('course')->with('status', 'Course Successfully Created!');
		// return "Course Sucessfylly Created!";
    }
}
