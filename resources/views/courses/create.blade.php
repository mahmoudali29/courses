@extends('layouts.admin_app')
@section('content')
 
        
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        	<form action="{{ url('admin/courses') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Course Name</label>
                  <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Course Name">
                   
                </div>

                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" id="price" name="price"  placeholder="Enter Course Price">
                </div>

                <div class="form-group">
                  <label for="price">Description</label>
                  <textarea class="form-control" id="description" name="description"></textarea>
                </div>

                <div class="form-group">
                  <label for="price">Image</label>
                  <input type="file" class="form-control" id="image" name="image">
                </div>
                
             
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>
        </main>
@endsection