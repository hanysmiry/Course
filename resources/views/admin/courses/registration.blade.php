@extends('admin.layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <h2 class="mb-4">All Registration</h2>
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
            <th>Student Name</th>
            <th>Course Name</th>
            <th>Status</th>
            <th>Registration At</th>
            <th>Action</th>
        </tr>
        @foreach ($data as $record )
        <tr>
            <td>{{ $record->id }}</td>
            <td>{{$record->user->name}}</td>
            <td>{{$record->course->name}}</td>
            <td>{!! $record->stutas ? '<span class="badge badge-success">Completed</span>' : '<span class="badge badge-warning"> Not Completed</span>' !!}</td>
            <td>{{$record->created_at->format('d-m-Y')}}</td>
            <td>
                <form class="d-inline" action="{{route('registrationDelete',$record->id)}}" method="POST">
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



