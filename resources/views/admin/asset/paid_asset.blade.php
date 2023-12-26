@extends('layouts.app')
@section('content')
<div class="row" style="margin-left:100px;">
@foreach($asset as $key)
@if($key->status==='Paid')
<div class="card" style="width: 20rem;margin-top:30px;">
    @if ($key->main_image)
                <img src="{{ asset($key->main_image) }}" alt="{{ $key->name }} Image"
                        style="width: 305px;height:160px;">
            @endif
    <div class="card-body">
      <h5 class="card-title">Title: {{ $key->title }}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  Price: {{ $key->price }}</h5>
      <a href="{{ route('detail.asset.paid',$key->id) }}" class=""><button style="border:none;width:100px;height:30px;margin-left:80px;margin-top:10px;">Preview</button></a>
    </div>
</div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
@endif
    @endforeach
<!-- resources/views/your-view.blade.php -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
