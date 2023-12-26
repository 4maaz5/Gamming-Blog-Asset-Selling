@extends('layouts.app')
@section('title',"$category->meta_title")
@section('meta_description',"$category->meta_description")
@section('meta_keyword',"$category->meta_keyword")
@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="category-heading">
                      <h4>{{ $category->name }}</h4>
                    </div>
                    @forelse($post as $posts)
                    <div class="card card-shadow mt-4">
                        <div class="card-body">
                            <a href="{{url('category/'.$category->slug.'/'.$posts->slug)  }}" class="text-decoration-none">
                    <h2 class="post-heading"> {{ $posts->name }}</h2>
                            </a>
                            {{-- @if ($posts->image)
                        <img src="{{ asset($posts->image) }}" alt="{{ $posts->name }} Image"
                            style="width: 170px;height:100px;margin-left:0px;">
                    @endif --}}
                            <h6>Posted on:{{ $posts->created_at->format('d-m-y') }}</h6>
                            <h6>Posted by:{{ $posts->user ->name }}</h6>
                        </div>
                    </div>
                    @empty
                    <div class="card card-shadow mt-4">
                        <div class="card-body">
                    <h2> No Post Available</h2>
                        </div>
                    </div>
                    @endforelse
                </div>
                <div class="col-md-2">

                </div>
            </div>
        </div>
    </div>
@endsection
