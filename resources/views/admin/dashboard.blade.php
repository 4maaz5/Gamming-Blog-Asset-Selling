@extends('layouts.master')

@section('title','Blog')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">


                    <div class="card-body">
                        Total Posts &nbsp&nbsp&nbsp
                        @if(!empty($postCount))
                            <h1>{{ $postCount }}</h1>
                        @else
                            <h1>0</h1>
                        @endif
                    </div>


                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">

                    <div class="card-body">
                        Registered Users &nbsp&nbsp&nbsp
                        @if(!empty($userCount))
                            <h1>{{ $userCount }}</h1>
                        @else
                           <h1> 0</h1>
                        @endif
                    </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    Total Categories &nbsp&nbsp&nbsp
                    @if(!empty($categoryCount))
                        <h1>{{ $categoryCount }}</h1>
                    @else
                       <h1> 0</h1>
                    @endif
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
