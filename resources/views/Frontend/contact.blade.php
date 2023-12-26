@extends('layouts.app')
@section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-1100">
                        <h2 style="margin-left: 150px;"><b>{{ __('Contact Us') }}</b></h2>
                        <div class="container">
                            @if(session('message'))
                                <div class="alert alert-success">{{ session('message') }}</div>
                            @endif
                            <form class="row g-3" action="{{ route('user.contact.create') }}" method="post" id="my-form">
                                @csrf
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="name">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputPassword4" name="email">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Phone</label>
                                    <input type="number" class="form-control" id="inputAddress" name="phone">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress2" class="form-label">Message</label>
                                    <textarea rows="5" class="form-control" name="message">
                          </textarea>
                                    @error('message')
                                        {{ $message }}
                                    @enderror
                                </div><br>
                                <div class="col-12"><br>
                                    <button type="submit" class="btn btn-primary" id="my-button">Submit</button>
                                </div>
                            </form>
                            <span id="output"></span>
                        </div>
                        @if (session()->has('message'))
                            {{ session('message') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
<!-- resources/views/your-view.blade.php -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


@endsection
