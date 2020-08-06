<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = ['name','description','category_id','created_by'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function videos()
    {
    	return $this->hasMany('App\Video');
    }
    public function packages()
    {
        return $this->belongsTo('App\package');
    }
}

