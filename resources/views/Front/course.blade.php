@extends('Front.layouts.master')

@section('content')
<main>
    <section class="page-header bg-light py-5">
      <div class="container">
        <div class="row">
          <div class="col">
            <ol class="list-unstyled d-flex">
              <li><a href="https://bakkah.com">Home</a></li>
              <li class="mx-4">{{$course->name}}</li>
            </ol>
            <h1>{{$course->name}}</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="courses py-5">
      <div class="container">
        <div class="Course_image row">
          <div class="col-md-4">
            <img src="{{asset('uplods/'.$course->image)}}" class="w-100" alt="">
          </div>
          <div class="col-md-6">
            <h3>{{$course->name}}</h3>
            <h4>{{$course->price}}</h4>
            <p>{{$course->content}}</p>
            <a class="btn btn-dark px-5" href="{{route('register1',$course->slug)}}">Register</a>
          </div>
        </div>
      </div>
    </section>
  </main>


@stop
