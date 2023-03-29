@extends('admin.layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <h2 class="mb-4">All Courses</h2>
          @if (session('success'))
          <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
              {{(session('success'))}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
    <table class="table">
        <tr>
            <th>Id</th>
            <th>image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>
        @foreach ($courses as $course )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <img width="100" src="{{asset('uplods/'.$course->image)}}" alt="">
            </td>
            <td>{{$course->name}}</td>
            <td>{{$course->price}}</td>
            <td>{{$course->Category->name}}</td>
            <td>{{$course->created_at->format('d-m-Y')}}</td>
            <td>
                <a href="{{route('courses.edit',$course->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                <form class="d-inline" action="{{route('courses.destroy',$course->id)}}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm" onclick="return confirm('are you sure ?')"><i class="fas fa-times"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        </table>
    </div>
    </div>
</div>


@stop



