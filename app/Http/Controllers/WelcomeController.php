<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function getCourseList(){
        $courseList = Course::all();

        return view('welcome',compact('courseList'));
    }

}
