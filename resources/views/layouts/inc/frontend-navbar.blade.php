<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(45, 68, 131)">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('front.index') }}">Home</a>
                </li> --}}
                {{-- <li class="nav-item dropdown">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('paid.asset') }}" style="color:white;">Paid Assets</a>
                </li>
                </li>
                <li class="nav-item dropdown">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('free.asset') }}" style="color:white;">Free Assets</a>
                </li>
                </li> --}}
                @php
                    $categories = App\Models\Category::where('navbar_status', '0')
                        ->where('status', '0')
                        ->get();
                @endphp
                @foreach ($categories as $key)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('category/' . $key->slug) }}"
                            style="color:white;">{{ $key->name }}</a>
                    </li>
                @endforeach
                <li class="nav-item dropdown">
                    {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.contact') }}" style="color:white;">Contact</a>
                </li> --}}
                <li>
                </li>
                </li>
                <!-- resources/views/layouts/app.blade.php (or any other Blade file where you want the button) -->

                @if (Auth::check())
                    <form method="POST" action="{{ route('logout') }}" id="logout-form"
                        style="margin-left: 1100px;margin-top:0px;">
                        @csrf
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle"
                                style="background-color: rgb(45, 68, 131);border:none;" type="button"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Setting
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('user.change.password') }}">Change
                                        Password</a></li>
                                <li><a class="dropdown-item" href=""><button type="submit"
                                            style="border:none;background-color:white;">Logout</button></a></li>
                            </ul>
                        </div>

                    </form>
                @endif
                @if (!Auth::check())
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}"
                            style="margin-top:7px;color:white;margin-left:1150px;text-decoration:none;"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>
                    @endif
                    &nbsp&nbsp&nbsp
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" style="margin-top:7px;color:white;text-decoration:none;"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endif
                </li>
            </ul>
        </div>
    </div>
    </div>
</nav>
</div>
