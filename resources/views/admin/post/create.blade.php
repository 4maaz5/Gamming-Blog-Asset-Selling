@extends('layouts.master')

@section('title', 'Add Post')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            @if($errors->any())
            <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
            </div>
            @endif
            <div class="card-header">
                <h4>Add Post
                    <a href="{{ route('create.post') }}" class="btn btn-primary float-end">Add Posts</a>
                </h4>
            </div>

            <div class="card-body">
                <form action="{{ route('insert.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="">Category</label>
                        <select class="form-control" name="category_id">
                            @foreach($category as $key)
                            <option value="{{ $key->id }}">{{ $key->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Post Name</label>
                        <input type="text" class="form-control" placeholder="Post Name" name="post_name">
                    </div>
                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" placeholder="Slug" name="slug">
                    </div>
                    <div class="mb-3">
                        <label for="">Post Description</label>
                        <textarea type="text" class="form-control" rows="3" name="description" id="mytable"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image" id="mysummernote" placeholder="Image">
                    </div>
                    <div class="mb-3">
                        <label for="">Enter Price if it's an Asset</label>
                        <input type="text" class="form-control" name="price" id="mysummernote" placeholder="Price">
                    </div>
                    <div class="mb-3">
                        <label for="">Youtube Iframe Link</label>
                        <input type="text" class="form-control" placeholder="Youtube Iframe Link" name="yt_iframe">
                    </div>
                    <h4>SEO Tags</h4>
                    <div class="mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" placeholder="Meta Title" name="meta_title">
                    </div>
                    <div class="mb-3">
                        <label for="" >Meta Description</label>
                        <textarea type="text" id="mytable" class="form-control" rows="3" name="meta_description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea type="text" class="form-control" name="meta_keyword"></textarea>
                    </div>
                  <h4>Status</h4>
                  <div class="col-md-3 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Save Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
