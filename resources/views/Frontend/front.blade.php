@extends('layouts.app')
@section('content')
    <br><br>
    @php
        $category=App\Models\Category::all();
        foreach ($category as $key) {

        }
    @endphp
    @if(!empty($key->name))
    @if($key->name==="Home")
    @foreach ($posts as $post)
        @php
            $date = date('d-m-y');
        @endphp
        @if ($post->created_at->format('d-m-y') == $date)
            <h1><u>Latest Posts:</u></h1>
            <div class="py-5" style="margin-top: -110px;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 mt-5">
                            <div class="category-heading">
                                <h4>{{ $loop->iteration }}.&nbsp&nbsp{!! $post->name !!}</h4>
                            </div>
                            <div class="card card-shadow mt-4">
                                <div class="card-body">
                                    {!! $post->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <br>
    @endforeach
    @endif
    @endif
    @if (!empty($post))
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
                        {{-- <a href="" class="btn btn-primary btn-sm me-2">Edit</a> --}}
                        <button type="button" value="{{ $key->id }}"
                            class="deleteComment btn btn-danger btn-sm me-2">Delete</a>
                    </div>
                @endif
                @if (Auth::check())
                    @if (Auth::user()->role_as == '1')
                        <div style="margin-top: 10px;">
                            <a href="{{ route('admin.comment.delete', $key->id) }}" class="btn btn-danger btn-sm me-2">Delete
                                </>
                    @endif
                @endif
            </div>
        @empty
            </div>
            </div>
            </div>
            </div>
            </div>
        @endforelse
    @endif
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.deleteComment', function(e) {
                if (confirm('Are you sure you want to delete this comment?')) {
                    var thisclicked = $(this);
                    var comment_id = thisclicked.val();
                    $.ajax({
                        type: "post",
                        url: "/delete-comment",
                        data: {
                            'comment_id': comment_id
                        },
                        success: function(res) {
                            if (res.status == 200) {
                                thisclicked.closest('.comment-container').remove();
                                alert(res.message);
                            } else {
                                alert(res.message);
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
