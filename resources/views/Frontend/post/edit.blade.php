@extends('layouts.app')
{{-- @section('title', "$post->meta_title")
@section('meta_description', "$post->meta_description")
@section('meta_keyword', "$post->meta_keyword") --}}
@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="category-heading">
                    </div>
                    <div class="comment-area mt-1">
                        @if (session('message'))
                            <div class="alert alert-warning mb-1">{{ session('message') }}</div>
                        @endif
                        <div class="card card-body">
                            <h5>Edit a Comment</h5>
                            <form action="{{ route('comment.update',$edit->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                {{-- <input type="hidden" name="post_slug" value="{{ $post->slug }}"> --}}
                                {{-- <input type="hidden" name="category_id" value="{{ $post->category_id }}"> --}}
                                <textarea rows="3" name="comment_body" value="{{ $edit->comment_body }}" class="form-control" required>{{ $edit->comment_body }}</textarea>
                                <button type="submit" class="btn btn-primary mt-3">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
@endsection
