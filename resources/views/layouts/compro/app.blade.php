<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ \Setting::getSetting()->app_name }} - @yield('title')</title>

    <link rel="icon" href="{{ asset('images/website') ."/". \Setting::getSetting()->favicon }}" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link href="{{ asset('templates/dashboard/sb-admin-2') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    @stack('css')

</head>
<body>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Container -->
        <div class="container-fluid">
            @include('layouts.compro.navbar')
        </div>
        <!-- /.container -->
        
        <!-- Container -->
        <div class="container">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">@yield('content_title')</h1>
                @yield('content')
        </div>
        <!-- /.container -->
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="copyright text-center my-auto">
                            <span>&copy; Copyright {{ \Setting::getSetting()->footer_left }} {{ date('Y') }} All Rights Reserved. {{ \Setting::getSetting()->footer_right }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
    @stack('js')
</body>
</html>