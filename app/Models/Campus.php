<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;

    protected $fillable=['name','school','email','phone','address'];


    public function Schools(){
        return $this->belongsToMany('App\Models\School' , 'schools');
    }
}
