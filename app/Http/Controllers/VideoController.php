<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Course;
use App\Video;
use App\Assignment;
use DB;
class VideoController extends Controller
{
    public function index()
    {
  //   	$videos = Video::all();
  //       all('id', 'title', 'course_id', 'file_url', 'is_approved');
		// return view("video",array('videos' => $videos));
        return redirect('course');
    }

    
    public function addVideo(Request $request){

 $this->validate($request, [
        'file_url' => 'mimetypes:video/avi,video/mp4,video/mkv,video/webm,video/mpeg,video/quicktime',
        'assignment' => 'mimes:pdf,doc,docx,txt',
    ]);
    	$video = new Video();
    	$video->course_id = request('course_id');
    	$video->title = request('title');
    	$video->description = request('description');
    	$video->youtube_url = request('youtube_url');

    	// $video->file_url= $request('file_url');

     // Handling file upload
        if ($request->hasFile('file_url')) {
            // $path = $request->file_url->path();
    
            // $extension = $request->file_url->extension(); 
            // $path = $request->file_url->store('public/videos');     
            $fileNameWithExt = $request->file('file_url')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('file_url')->getClientOriginalExtension();
            //filename to store
            // $pathoffile = <img  class='w-100' src='/storage/videos/{{$video->file_url}}';
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('file_url')->move('videos', $fileNameToStore);
        } else {
            $fileNameToStore = 'novideo';
        }
        $video->file_url= $fileNameToStore;
        $video->save();
    
    // Handling Assignment upload
        if ($request->hasFile('assignment')) {
            // $path = $request->assignment->path();
    
            // $extension = $request->assignment->extension(); 
            // $path = $request->assignment->store('public/videos');     
            $fileNameWithExt = $request->file('assignment')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('assignment')->getClientOriginalExtension();
            //filename to store
            // $pathoffile = <img  class='w-100' src='/storage/videos/{{$video->assignment}}';
            $assignmentNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('assignment')->move('assignment', $assignmentNameToStore);
        } else {
            $assignmentNameToStore = '';
        }

        $assignment = new Assignment();
        $assignment->video_id = $video->id;
       
        $assignment->file_name = $assignmentNameToStore;
    	$assignment->save();

		return redirect('video')->with('status', 'Video Successfully Created!');
		// return "Course Sucessfylly Created!";


    }

    public function showVideo($id){
        $courses = Course::all('id', 'name');
        $video = Video::find($id);
        // $videos = Video::('id', 'title', 'course_id', 'file_url', 'is_approved');
       
        return view("video", array('videos' => $video));
    }

    public function videoInstructor(){

        $videos = Video::all();
        $courses = Course::all('id','name');
        //all('id', 'title', 'course_id', 'file_url', 'is_approved');
        return view("instructor.video",array('videos' => $videos,'courses'=>$courses));
    }
   

}
