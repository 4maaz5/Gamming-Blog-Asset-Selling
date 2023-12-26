<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Password</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: rgb(45, 68, 131);
            margin: 0;
        }

        .card {
            width: 500px;
            background-color: aliceblue;
            border: solid 2px black;
        }

        .form-group {
            margin-left: 30px;
        }

        .btn-primary {
            margin-top: 30px;
            width: 200px;
            height: 30px;
            margin-left: 220px;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .navbar-link {
            margin-top: 7px;
            color: white;
            text-decoration: none;
            margin-left: 15px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(45, 68, 131)">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="height: 370px;">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <h2 style="color: white;" class="text text-center"></h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                @if(session('message'))
                                    <div style="margin-left:220px;margin-top:10px;">{{ session('message') }}</div>
                                @endif
                                <h1 class="text-center">Update Password</h1>
                                <form action="{{ route('user.update.password') }}" style="font-size:20px;" method="post">
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
                                    <button type="submit" class="btn btn-primary text-center mb-3">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if(!Auth::check())
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="navbar-link">Login</a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="navbar-link">Register</a>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
