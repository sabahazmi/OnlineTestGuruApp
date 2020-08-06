<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $fillable = ['title', 'course_id', 'youtube_url', 'file_url'];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
     public function assignments()
    {
        return $this->hasMany('App\Assignment');
    }
}
