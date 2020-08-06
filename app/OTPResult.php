<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OTPResult extends Model
{
    protected $fillable = ['result'];

    public function video()
    {
        return $this->belongsTo('App\Video');
    }
}
