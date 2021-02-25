<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function Campuses(){
        return $this->belongsTo('App\Models\Campuses' , 'campuses');
    }

    public function CourseTypes(){
        return $this->belongsTo('App\Models\CourseTypes' , 'course_types');
    }
}
