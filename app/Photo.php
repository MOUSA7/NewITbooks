<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['title','file'];
    //

    public function blog(){

        return $this->belongsTo(Blog::class);

    }
}
