@extends('layouts.app')
@section('content')
    <div class="row" style="margin-left:100px;">
        {{-- @foreach ($asset as $key) --}}
            <div class="card" style="width: 50rem;margin-top:30px;">
                @if ($asset->main_image)
                    <img src="{{ asset($asset->main_image) }}" alt="{{ $asset->name }} Image"
                        style="width: 770px;height:500px;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">Title:
                        {{ $asset->title }}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        Price: {{ $asset->price }}</h5>
                        <div class="card-body">
                            <h4>Description:</h4>
                            {{ $asset->description }}
                        </div>
                    <a href="{{ route('stripe.checkout', ['price'=>$asset->price, 'product'=>'silver']) }}" class=""><button
                            style="border:none;width:100px;height:30px;margin-left:15px;margin-top:-100px;background-color:orange;">Add to Cart</button></a>
                </div>
                @if (session('message'))
                    <div class="alert alert-warning mb-1">{{ session('message') }}</div>
                @endif
                <h5>Review</h5>
                <form action="{{ route('store.review',$asset->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="asset_id" value="{{ $asset->id }}">
                    <textarea rows="3" name="review_body" class="form-control" required></textarea>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
    </div>
            </div>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            @forelse($asset->review as $key)
            <div class="comment-container card card-body shadow-sm mt-3" style="width:800px;margin-left:100px;">
                <div class="detail-area">
                    <h6 class="user-name mb-1">User Name:
                        @if ($key->user)
                            {{ $key->user()->name }}
                        @endif
                        <small class="ms-3 text-primary">Reviews
                            on:{{ $key->created_at->format('d-m-y') }}</small>
                    </h6>
                    <p class="user-comment mb-1">{!! $key->review_body !!}</p>
                </div>
                 @if (Auth::check() && Auth::id() == $key->user_id)
                    <div>
                        {{-- <a href="" class="btn btn-primary btn-sm me-2">Edit</a> --}}
                        <a href="{{ route('review.delete',$key->id) }}"> <button type="button" value="" class="deleteComment btn btn-danger btn-sm me-2">Delete</a>
                    </div>
                @endif
                @if(Auth::check())
                @if (Auth::user()->role_as == '1') --}}

                        <a href="{{ route('admin.review.delete',$key->id) }}" class="btn btn-danger btn-sm me-2">Delete</>
                 @endif
                @endif

            </div>
            </div>
    </div>

@empty
    <div class="card card-body shadow-sm mt-3">
        <h6>No Reviews Yet</h6>
    </div>
    </div>
</div>
</div>
</div>
</div>
    @endforelse
</div>        <!-- resources/views/your-view.blade.php -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @endsection
