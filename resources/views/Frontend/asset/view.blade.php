@extends('layouts.app')
@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="category-heading">
                        <h4>{!! $post->name !!}</h4>
                    </div>
                    <div class="card card-shadow mt-4">
                        <div class="card-body">
                            {!! $post->description !!}
                        </div>
                    </div>
                    <div class="comment-area mt-4">
                        @if (session('message'))
                            <div class="alert alert-warning mb-1">{{ session('message') }}</div>
                        @endif
                        <div class="card card-body">
                            <h5>Leave a Comment</h5>
                            <form action="{{ route('store.comment') }}" method="post">
                                @csrf
                                <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                                <textarea rows="3" name="comment_body" class="form-control" required></textarea>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                        @forelse($post->comments as $key)
                            <div class="comment-container card card-body shadow-sm mt-3">
                                <div class="detail-area">
                                    <h6 class="user-name mb-1">User Name:
                                        @if ($key->user)
                                            {{ $key->user->name }}
                                        @endif
                                        <small class="ms-3 text-primary">Commented
                                            on:{{ $key->created_at->format('d-m-y') }}</small>
                                    </h6>
                                    <p class="user-comment mb-1">{!! $key->comment_body !!}</p>
                                </div>
                                @if (Auth::check() && Auth::id() == $key->user_id)
                                    <div>
                                        <a href="{{ route('comment.delete', $key->id) }}"
                                            style="text-decoration:none;color:black"><button type="button"
                                                class="btn btn-danger btn-sm me-2">Delete</a>
                                    </div>
                                @endif
                                {{-- @if (Auth::check())
                                    @if (Auth::user()->role_as == '1')
                                        <div style="margin-top: 10px;">
                                            <a href="{{ route('admin.comment.delete', $key->id) }}"
                                                class="btn btn-danger btn-sm me-2">Delete</>
                                    @endif
                                @endif --}}
                            </div>
                        @empty
                            <div class="card card-body shadow-sm mt-3">
                                <h6>No Comments Yet</h6>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforelse
@endsection
