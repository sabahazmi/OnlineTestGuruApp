<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['name','price', 'course_id'];

    public function courses(){
    	return $this->belongsToMany('App\Course', 'course_packages');
    }
    public function videos(){
    	return $this->belongsToMany('App\Video');
    }
}
