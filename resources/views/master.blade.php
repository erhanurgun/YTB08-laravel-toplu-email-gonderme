<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','E-mail Send')</title>
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png"/>
    <!--plugins-->
    <link rel="stylesheet" href="{{ asset('/') }}assets/plugins/simplebar/css/simplebar.css"/>
    <link rel="stylesheet" href="{{ asset('/') }}assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css"/>
    <link rel="stylesheet" href="{{ asset('/') }}assets/plugins/highcharts/css/highcharts.css"/>
    <link rel="stylesheet" href="{{ asset('/') }}assets/plugins/vectormap/jquery-jvectormap-2.0.2.css"/>
    <link rel="stylesheet" href="{{ asset('/') }}assets/plugins/metismenu/css/metisMenu.min.css"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/app.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/icons.css">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/dark-theme.css"/>
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/semi-dark.css"/>
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/header-colors.css"/>
    <!-- loader-->
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/pace.min.css"/>
    @yield('css')

    <script src="{{ asset('/') }}assets/js/pace.min.js"></script>
</head>

<body>
<!--wrapper-->
<div class="wrapper">
    @include('data.header')
    @yield('main')
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    @include('data.footer')
</div>
<!--end wrapper-->

<!-- Bootstrap JS -->
<script src="{{ asset('/') }}assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{ asset('/') }}assets/js/jquery.min.js"></script>
<script src="{{ asset('/') }}assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{ asset('/') }}assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{ asset('/') }}assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="{{ asset('/') }}assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{ asset('/') }}assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{ asset('/') }}assets/plugins/highcharts/js/highcharts.js"></script>
<script src="{{ asset('/') }}assets/plugins/highcharts/js/exporting.js"></script>
<script src="{{ asset('/') }}assets/plugins/highcharts/js/variable-pie.js"></script>
<script src="{{ asset('/') }}assets/plugins/highcharts/js/export-data.js"></script>
<script src="{{ asset('/') }}assets/plugins/highcharts/js/accessibility.js"></script>
<script src="{{ asset('/') }}assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script src="{{ asset('/') }}assets/js/index2.js"></script>
<!--app JS-->
<script src="{{ asset('/') }}assets/js/app.js"></script>
@yield('js')
<script>
    (function () {
        'use strict'
        let forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

</body>

</html>
