@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
<h2 class="mb-4">Update Coueses</h2>
@include('admin.layouts.error')
<form action="{{route('courses.update', $course->id)}}" method="POST" enctype="multipart/form-data">
@csrf
{{-- <input type="hidden" name="_method" value="PUT"> --}}
@method('put')
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Name" value="{{$course->name}}" name="name">
                {{-- @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror --}}
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Price" value="{{$course->price}}" name="price">
            </div>
            <div class="mb-3">
                <textarea name="content" class="form-control" placeholder="Content"  rows="6">{{$course->content}}</textarea>
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file" class="form-control"  name="image">
                <img class="mt-1" width="100" src="{{asset('uplods/'.$course->image)}}" alt="">
            </div>
            <div class="mb-3">
                <select name="category_id" class="form-control">
                    <option value="" selected disabled>Selected Category</option>
                    @foreach ( $categories as $category )
                    {{-- <option {{$Category->id == $post->Category->id ? 'selected' : ''}} value="{{$Category->id}}">{{ $Category->name}}</option> --}}
                        <option {{$category->id == $course->category->id ? 'selected' : '' }} value="{{$category ->id}}">{{$category ->name}}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-info px-5">Update</button>
        </div>
    </div>
</form>
</div>
@stop
