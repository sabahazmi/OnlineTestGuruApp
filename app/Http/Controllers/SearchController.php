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

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index(Request $request)
    {
        
        $packages = [];
        $categories = [];
        $courses = [];
        // $videos = Video::all();

        if($request->get('search'))
        {
             $search = $request->get('search');
             // $categories = Category::where('name','like','%'.$search.'%')->get();
             $courses = Course::where('name','like','%'.$search.'%')->get();
             $packages = Package::where('name','like','%'.$search.'%')->get();
        }else{
            // $courses = Course::all('id', 'name', 'category_id', 'created_at');
            // $packages = Package::all();
            
        }
        $instructorUsers = User::where('role_id','=',2)->get();
        $studentUsers = User::where('role_id','=',3)->get();
        return view("search", array(
                                    'courses'=>$courses,
                                    'categories'=>$categories,
                                    'instructorUsers'=>$instructorUsers,
                                    'studentUsers'=>$studentUsers,
                                    'packages' => $packages
                                    )
                    )->with('status','Property is updated .');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
