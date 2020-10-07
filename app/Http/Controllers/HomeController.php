<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
    	return view('index');
    }

    public function AboutUs()
    {
        return view('about');
    }

    public function ContactUs()
    {
        return view('contact');
    }

    

    

    public function CourseDetails ($course_id,$course_name=''){

        $course_description = "<script>alert('you are hacked')</script>";

        return view('course_details',compact('course_id','course_name','course_description'));
    }
}
