<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreeVideo extends Model
{
    //
 	protected $fillable = ['id', 'video_id'];

 	public function video()
    {
        return $this->belongsTo('App\Video');
    }
}
