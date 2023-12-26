@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row" style="margin-left: px;margin-top:20px;">
            <div class="col-lg-4 col-xl-4">
                <div class="card" style="width: 400px;">
                    <div class="card-body">
                        <div class="media align-items-center mb-4">
                            <img class="mr-3" style="margin-left: px;" src="{{ asset('img/admin.jpg') }}" width="160"
                                height="" alt="">
                            <div class="media-body">
                                <h3 class="mb-0 mt-2">Role: {{ $profileData->name }}</h3>
                                <p class="text-muted mb-0">Country: Pakistan</p>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col">
                                <div class="card card-profile text-center">
                                    <span class="mb-1 text-primary"><i class="icon-people"></i></span>
                                    <h3 class="mb-0">263</h3>
                                    <p class="text-muted px-4">Following</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card card-profile text-center">
                                    <span class="mb-1 text-warning"><i class="icon-user-follow"></i></span>
                                    <h3 class="mb-0">263</h3>
                                    <p class="text-muted">Followers</p>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-1">
                                <button class="btn btn-danger px-5">Follow Now</button>
                            </div>
                        </div>

                        <h4 style="margin-top: -30px;">About Me</h4>
                        <p class="text-muted">Hi, I'm Pikamy, has been the industry standard dummy text ever since the
                            1500s.</p>
                        <ul class="card-profile__info">
                            <li class="mb-1"><strong class="text-dark mr-4">Name: </strong>
                                <span>{{ $profileData->name }}</span>
                            </li>
                            <li class="mb-1"><strong class="text-dark mr-4">Email: </strong>
                                <span>{{ $profileData->email }}</span>
                            </li>
                            {{-- <li><strong class="text-dark mr-4">Address</strong> <span>{{ $profileData->address }}</span> --}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-8">
                <div class="card" style="margin-left: 20px; width:800px;">

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @endif
                        <form action="" method="post"
                            class="form-profile">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card mt-4">
                                            @if($errors->any())
                                            <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                            <div>{{ $error }}</div>
                                            @endforeach
                                            </div>
                                            @endif
                                        <div class="card">
                                            <div class="card-title p-2">
                                                <h4>Admin update Password</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="basic-form">
                                                    <form action="{{ route('admin.password.update') }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label>Old Password</label>
                                                            <input type="password" class="form-control" placeholder="Old Password"
                                                                name="old_password" value="">
                                                        </div>
                                                        <div class="form-group mt-4">
                                                            <label>New Password</label>
                                                            <input type="password" class="form-control" placeholder="New Password"
                                                                name="new_password" value="">
                                                        </div>
                                                        <div class="form-group mt-4">
                                                            <label>Re-type Password</label>
                                                            <input type="password" class="form-control" placeholder="Re-type Password"
                                                                name="new_password_confirm" value="" id="new_password_confirm">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary mt-4">Save
                                                            Changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>


    </body>

    </html>
@endsection
