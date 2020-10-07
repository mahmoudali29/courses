<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;

class HomeController extends Controller
{
    //
    public function index()
    {
        # all::  to get all data from table
        $arrCourses = Course::all();
        $arrTeachers = Teacher::all();
          
    	return view('index',compact('arrCourses','arrTeachers'));
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
