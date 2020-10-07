<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Avialable methods (get,post,put,patch,delete)
*/

Route::get('/','App\Http\Controllers\HomeController@index')->name('Home');
Route::get('/about-us','App\Http\Controllers\HomeController@AboutUs')->name('aboutus');
Route::get('/contact-us','App\Http\Controllers\HomeController@ContactUs')->name('aboutus');




Route::get('/about', function () {
    return view('about');
});

// this mean paramater id is required
Route::get('/user/{id}', function ($id=null) {
    return $id;
})->where('id', '[0-9]+');

// this mean paramater name is not required
Route::get('/product/{name?}', function ($name=null) {
    return $name;
});

Route::get('/user/profile', function () {
    echo "your profile here";
})->name('profile');

// Route::get('/course_details/{course_id}/{course_name?}','App\Http\Controllers\HomeController@CourseDetails')->name('CourseDetails')->where('course_id', '[0-9]+');


// Route::get('/course_details/{course_id}/{course_name?}','App\Http\Controllers\HomeController@CourseDetails')->where('course_id', '[0-9]+')->name('CourseDetails');






