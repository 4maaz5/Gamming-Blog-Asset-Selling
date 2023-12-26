@extends('layouts.app')
@section('content')
<div class="row">
    <h2 style="margin-left: 120px;">Shopping Cart</h2>
    <div class="col-8 text-center">
        @if(session('msg'))
        <div class="alert alert-success" style="margin-left: 110px;">{{ session('msg') }}</div>
    @endif
       <table class="table table-bordered" style="margin-left:80px;">
        <tr>
            <th style="">Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>SubTotal</th>
            <th>Action</th>
        </tr>
        @php
            $counter=0;
            $total=0;
        @endphp
        @foreach($cart as $item)
        @php $counter++ @endphp
        <tr>
            @if($item->post->image)
            <td><img src="{{ asset($item->post->image) }}" style="width:180px;"></td>
            @endif
            <td>{{ $item->post->name }}</td>
            <td>{{  "$"." " .$item->post->price }}</td>
            @php
            $total +=$item->post->price;
            @endphp
            <td>{{ "$". " " .$item->post->price }}</td>
            <td>
                <a href="{{ route('remove.cart',$item->id) }}" ><button class="btn btn-danger">Remove</button></a>
            </td>
        @endforeach
        </tr>
       </table>
    </div>
    <div class="col-1">
        <div class="card" style="width: 25rem;margin-left:70px;height:220px;">
            <div class="card-header">
              Cart Totals
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Total Products: <span style="margin-left:240px;">{{ $counter }}</span></li>
              <li class="list-group-item">Total Price: <span style="margin-left:240px;">{{"$". $total }}</span></li><br>
              {{-- <form method="post" action=""> --}}
              <li class="list-group-item"><a href="{{ route('stripe.checkout', ['price'=>$total,'product' => $item->post->name,'quantity'=>$counter,'total_amount'=>$total]) }}" class="btn btn-success">PayNow</a></li>
              {{-- </form> --}}
            </ul>
          </div>
    </div>
</div>
@endsection
