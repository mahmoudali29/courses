<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Course;
use Redirect;
use Validator;
use App\Http\Requests\StoreCourses;
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
       $arrCourses =  Course::all();
       return view('courses.index',compact('arrCourses'));
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
    public function store(StoreCourses $request)
    {

        // $rules = $request->validate([
        //     'name' => 'required|unique:courses|max:255',
        //     'price' => 'required',
        // ]);

        // $rules = [
        //     'name' => 'required|unique:courses|max:255',
        //     'price' => 'required|integer',
        //     'description' => 'required',
        // ];

        // if($request->hasFile('image')){
        //     $rules['image']= 'mimes:jpeg,bmp,png';
        // }

         


        // $messages = [
        //     'name.required' => 'Please Enter Name',
        //     'name.unique' => 'Please choose diffrent name',
        //     'price.required' => 'Please Enter Price',
        // ];

        // $input = $request->all();

         
        // $validator = Validator::make($input, $rules, $messages);

        // if ($validator->fails()) {
        //     return Redirect::back()
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
        
        // use query builder
        /*DB::table('courses')->insert(
            [
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
            ]
        );
        */

        //Course::create($request->all());

        // user Eloquent
        $objCourse = new Course();
        $objCourse->name = $request->name;
        $objCourse->price = $request->price;
        $objCourse->description = $request->description;

        # upload image 
        $image = "";
        #  validate if image upload or not 
        if($request->hasFile('image')){
            $image = $request->image;
            $image_name = time().".".$image->getClientOriginalExtension();
            $destination = "images/courses";
            $image->move($destination,$image_name);
            $objCourse->image = $destination."/".$image_name;
        }

        $objCourse->save();

        //$request->session()->flash('sucessMSG','Course Added Succesfully');

        return Redirect::back()->with('sucessMSG', 'Course Added Succesfully !');




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
        $objCourse = Course::findOrFail($id);
        return view('courses.show',compact('objCourse'));
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
        $objCourse = Course::findOrFail($id);
        return view('courses.edit',compact('objCourse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCourses $request, $id)
    {
        //
        $objCourse = Course::findOrFail($id);

        $objCourse->name = $request->name;
        $objCourse->price = $request->price;
        $objCourse->description = $request->description;

        # upload image 
        $image = "";
        #  validate if image upload or not 
        if($request->hasFile('image')){
            $image = $request->image;
            $image_name = time().".".$image->getClientOriginalExtension();
            $destination = "images/courses";
            $image->move($destination,$image_name);
            $objCourse->image = $destination."/".$image_name;
        }

        $objCourse->save();

        return Redirect::back()->with('sucessMSG', 'Course Updated Succesfully !');

         
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
        Course::findOrFail($id)->delete();
        return Redirect::back()->with('sucessMSG', 'Course Deleted Succesfully !');
    }
}
