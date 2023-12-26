@extends('layouts.master')

@section('title', 'Blog')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h1 class="mt-4">Edit Category</h1>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('update.category',$edit->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Category Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $edit->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{ $edit->slug }}">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="description" id="mysummernote" value="{{ $edit->description }}">
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <h6>SEO Tags</h6>
                    <div class="mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{ $edit->meta_title }}">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Description</label>
                        <textarea type="text" class="form-control" name="meta_description" rows="3" value="">{{ $edit->meta_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea type="text" class="form-control" name="meta_keywords" rows="3" value="">{{ $edit->meta_keyword }}</textarea>
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
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
