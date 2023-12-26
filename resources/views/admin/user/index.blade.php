@extends('layouts.master')

@section('title','View Post')

@section('content')
<div class="container-fluid px-4">
<div class="card mt-4">

    <div class="card-header">
<h4>View Users
</h4>
    </div>

<div class="card-body">
    @if(session('message'))
    <div class="alert alert-danger">{{ session('message') }}</div>
@endif
<table id="myTable" class="table table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>UserName</td>
            <td>Email</td>
            <td>Role</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
         @foreach($user as $key)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $key->name }}</td>
                <td>{{ $key->email }}</td>
                <td>{{ $key->role_as=='1'?'Admin':'User' }}</td>
                <td>
                    <a href="{{ route('delete.user',$key->id) }}" class="btn btn-danger">Delete</a>
                </td>
        @endforeach
    </tbody>
    </table>
</div>
</div>
</div>
@endsection
