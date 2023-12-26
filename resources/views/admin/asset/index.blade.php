@extends('layouts.master')

@section('title','View Post')

@section('content')
<div class="container-fluid px-4">
<div class="card mt-4">

    <div class="card-header">
<h4>View Assets
    <a href="{{ route('add.asset') }}" class="btn btn-primary float-end">Add Asset</a>
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
            <td>Title</td>
            <td>Description</td>
            <td>Image</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($asset as $key)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $key->title }}</td>
                <td>{{ $key->description }}</td>
                @if ($key->main_image)
                <td><img src="{{ asset($key->main_image) }}" alt="{{ $key->name }} Image"
                        style="width: 60px;height:60px;"></td>
            @endif
            <td>{{ $key->status }}</td>
                {{-- <td>{{ $key->status=='1'?'Hidden':'Shown' }}</td> --}}
                <td>
                    <a href="{{ route('edit.asset',$key->id) }}" class="btn btn-secondary">Edit</a>&nbsp
                    <a href="{{ route('delete.asset',$key->id) }}" class="btn btn-danger">Delete</a>
                </td>
        @endforeach
    </tbody>
    </table>
</div>
</div>
</div>
@endsection
