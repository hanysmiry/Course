@extends('admin.layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <h2 class="mb-4">All Category</h2>
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
            <th>Name</th>
            <th>Created_At</th>
            <th>Udated_At</th>
            <th>Action</th>
        </tr>
        @foreach ($categories as $category )
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->created_at->format('d-m-Y')}}</td>
            <td>{{$category->updated_at->format('d-m-Y')}}</td>
            <td>
                <a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                <form class="d-inline" action="{{route('categories.destroy',$category->id)}}" method="POST">
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



