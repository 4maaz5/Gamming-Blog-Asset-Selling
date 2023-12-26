@extends('layouts.master')

@section('title','View Post')

@section('content')
<div class="container-fluid px-4">
<div class="card mt-4">

    <div class="card-header">
<h4>View Posts
    <a href="{{ route('create.post') }}" class="btn btn-primary float-end">Add Posts</a>
</h4>
    </div>

<div class="card-body">
    @if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif
<table id="myTable" class="table table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Category</td>
            <td>Post Name</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $key)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $key->category->name }}</td>
                <td>{{ $key->name }}</td>
                <td>{{ $key->status=='1'?'Hidden':'Visible' }}</td>
                <td>
                    <a href="{{ route('edit.post',$key->id) }}" class="btn btn-secondary">Edit</a>&nbsp
                    <a href="{{ route('delete.post',$key->id) }}" class="btn btn-danger">Delete</a>
                </td>
        @endforeach
    </tbody>
    </table>
</div>
</div>
</div>
@endsection
