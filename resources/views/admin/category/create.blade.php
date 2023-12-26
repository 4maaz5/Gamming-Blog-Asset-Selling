@extends('layouts.master')

@section('title','Blog')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
    <h1 class="mt-4">Add Category</h1>
        </div>
        <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
    </div>
        @endif
        <form action="{{ route('store.category') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="mb-3">
    <label for="">Category Name</label>
    <input type="text" class="form-control" name="name">
</div>
<div class="mb-3">
    <label for="">Slug</label>
    <input type="text" class="form-control" name="slug">
</div>
<div class="mb-3">
    <label for="">Description</label>
    <textarea type="text" class="form-control" name="description" id="mytable"></textarea>
</div>
<div class="mb-3">
    <label for="">Image</label>
    <input type="file" class="form-control" name="image">
</div>
<h6>SEO Tags</h6>
<div class="mb-3">
    <label for="">Meta Title</label>
    <input type="text" class="form-control" name="meta_title">
</div>
<div class="mb-3">
    <label for="">Meta Description</label>
    <textarea type="text" class="form-control" name="meta_description" rows="3"></textarea>
</div>
<div class="mb-3">
    <label for="">Meta Keywords</label>
    <textarea type="text" class="form-control" name="meta_keywords" rows="3"></textarea>
</div>
<h6>Status Mode</h6>
<div class="row">
<div class="col-md-3 mb-3">
    <label for="">Navbar Status</label>
    <input type="checkbox" name="navbar_status">
</div>
<div class="col-md-3 mb-3">
    <label for="">Status</label>
    <input type="checkbox" name="status">
</div>
<div class="col-md-6">
<button type="submit" class="btn btn-primary">Save Category</button>
</div>
</div>
        </form>
        </div>
    </div>
</div>

@endsection
