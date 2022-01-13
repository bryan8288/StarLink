<?php

namespace App\Http\Controllers;

use App\Course;

class WelcomeController extends Controller
{
    public function getCourseList(){
        $courseList = Course::paginate(5);
        return view('welcome',compact('courseList'));
    }
}
