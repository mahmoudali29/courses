<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AdminController;


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
Route::get('/contact-us','App\Http\Controllers\HomeController@ContactUs')->name('contactus');

Route::get('/admin','App\Http\Controllers\AdminController@Dashboard');
Route::get('/admin/dashboard','App\Http\Controllers\AdminController@Dashboard');
//================== Course Moduel ==========================//
Route::resource('admin/courses', CourseController::class);
 

