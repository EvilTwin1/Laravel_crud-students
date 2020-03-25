<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','email','phone','course','image','_token'];


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

    public function setCourseAttribute($value)
    {
        $this->attributes['course'] = implode(" ", $value);
    }

}

