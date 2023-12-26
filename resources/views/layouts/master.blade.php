<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<!-- Summernote Links-->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<!--Link for Table-->
<link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

</head>
<body>
@include('layouts.inc.admin-navbar')

<div id="layoutSidenav">
    @include('layouts.inc.admin-sidebar')

    <div id="layoutSidenav_content">
        <main>
@yield('content')
<div class="card mb-4">
    <div class="card-header"  style="font-size: 20px;">
        <i class="fas fa-table me-1"></i>
        Top Selled Products
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Added to Cart</th>
                </tr>
            </thead>
            <tbody>
                {{-- {{$topSellingProducts}} --}}
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>2011/04/25</td>
                    <td>2011/04/25</td>
                </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
    <!-- /# card -->
</div>
<!-- /# column -->
</div>
        </main>
       @include('layouts.inc.admin-footer')
    </div>


</div>
<!-- Js Plugins -->
<script src="{{ asset('asset/https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('asset/js/scripts.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#mytable").summernote({
                    height:100,
                });
                $('.dropdown-toggle').dropdown();
            });
        </script>
        <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script>
            let table = new DataTable('#myTable');
            </script>
            @yield('scripts')
</body>
</html>
