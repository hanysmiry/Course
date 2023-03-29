@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
<h2>Add New Courses</h2>
@include('admin.layouts.error')
<form action="{{route('courses.store')}}" enctype="multipart/form-data" method="POST">
@csrf
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Name" value="{{old('name')}}" name="name">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Price" value="{{old('price')}}" name="price">
            </div>
            <div class="mb-3">
                <textarea name="content" class="form-control" placeholder="Content"  rows="6">{{old('content')}}</textarea>
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file" class="form-control"  name="image">
            </div>
            <div class="mb-3">
                <select name="category_id" class="form-control">
                    <option value="" selected disabled>Selected Category</option>
                    @foreach ( $categories as $category )
                        <option value="{{$category ->id}}">{{$category ->name}}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-info px-5">Add</button>
        </div>
    </div>
</form>
</div>
@stop
