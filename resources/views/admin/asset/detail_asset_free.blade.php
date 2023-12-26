@extends('layouts.app')
@section('content')
    <div class="row" style="margin-left:100px;">
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
                        {{-- <a href="www.download.com">
                            <button style="margin-left:15px;margin-top:-20px;" class="btn btn-primary">Download</button>
                        </a> --}}


                </div>
            </div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <!-- resources/views/your-view.blade.php -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @endsection
