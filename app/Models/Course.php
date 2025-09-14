<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable =[
        'title',
        'description',
        'start_date',
        'max_students',
        'instructor_id'
    ];

    public function instructor(){
        return $this->belongsTo(User::class , 'instructor_id');
    }

    public function students(){
        return $this -> belongsToMany(User::class , 'enrollments'  , 'course_id','user_id')->withTimestamps();
    }

    public function enrollments(){
        return $this -> hasMany(Enrollment::class);
    }

    public function enrolledCount(){
        return $this -> students -> count();
    }
}
