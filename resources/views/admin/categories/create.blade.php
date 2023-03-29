@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
<h2>Add New Category</h2>
@include('admin.layouts.error')
<form action="{{route('categories.store')}}" method="POST">
@csrf
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Name" value="{{old('name')}}" name="name">
            </div>
            <button class="btn btn-info px-5">Add</button>
        </div>
    </div>
</form>
</div>
@stop
