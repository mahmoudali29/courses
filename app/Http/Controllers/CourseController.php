<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Course;
use Redirect;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       return view('courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // use query builder
        /*DB::table('courses')->insert(
            [
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
            ]
        );
        */

        // Course::create($request->all());

        // user Eloquent
        $objCourse = new Course();
        $objCourse->name = $request->name;
        $objCourse->price = $request->price;
        $objCourse->description = $request->description;

        # upload image 
        $image = $request->image;
        $image_name = time().".".$image->getClientOriginalExtension();
        $destination = "images/courses";
        $image->move($destination,$image_name);
        
        $objCourse->image = "public/".$destination.$image_name;
        $objCourse->save();

        return Redirect::back();




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        print_r('we will show this id : ' . $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        print_r('we will edit this id : ' . $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
