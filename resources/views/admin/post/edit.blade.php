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
                <h4>Edit Post
<a href="{{ route('post.index') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>

            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
                </div>
                @endif
                <form action="{{ route('update.post',$post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Category</label>
                        <option>--Select Category--</option>
                        <select class="form-control" name="category_id">
                            @foreach($category as $key)
                            <option value="{{ $key->id }}" {{ $post->category_id == $key->id ? 'Selected':'' }}>{{ $key->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Post Name</label>
                        <input type="text" class="form-control" placeholder="Post Name" name="post_name" value="{{ $post->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" placeholder="Slug" name="slug" value="{{ $post->slug }}">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea type="text" class="form-control" rows="3" name="description" id="mysummernote">{!! $post->description !!}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Youtube Iframe Link</label>
                        <input type="text" class="form-control" placeholder="Youtube Iframe Link" name="yt_iframe" value="{{ $post->yt_iframe }}">
                    </div>
                    <h4>SEO Tags</h4>
                    <div class="mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" placeholder="Meta Title" name="meta_title" value="{{ $post->meta_title }}">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Description</label>
                        <textarea type="text" class="form-control" rows="3" name="meta_description">{!! $post->meta_description !!}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Meta keywords</label>
                        <textarea type="text" class="form-control" name="meta_keyword">{{ $post->meta_keyword }}</textarea>
                    </div>
                  <h4>Status</h4>
                  <div class="col-md-3 mb-3">
                    <label for="">Hide</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Update Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
