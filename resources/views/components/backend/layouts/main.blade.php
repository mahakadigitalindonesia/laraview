<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MDIGI Laraview') }}</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css" />


    <link rel="stylesheet" type="text/css" href="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/css/fontawesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/css/vendors/sweetalert2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/css/vendors/prism.css') }}">
    <!-- Plugins css Ends-->
    <link rel="stylesheet" type="text/css" href="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/datagrid/datagrid.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/adminlte/plugins/select2/css/select2.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/css/responsive.css') }}">

    {{ $styles }}
</head>

<body class="">
    <div id="app">
        <!-- tap on top starts-->
        <div class="tap-top"><i data-feather="chevrons-up"></i></div>
        <!-- tap on tap ends-->
        <!-- page-wrapper Start-->
        <div class="page-wrapper compact-wrapper" id="pageWrapper">
            {{ $body }}
        </div>
    </div>
    <!-- latest jquery-->
    <script src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- scrollbar js-->
    <script src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/js/scrollbar/custom.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/adminlte/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Daterange picker -->
    <script src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/js/custom-card/custom-card.js') }}"></script>
    <script src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/js/form-validation-custom.js') }}"></script>
    <script src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/js/tooltip-init.js') }}"></script>
    <script src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    <!-- Theme js-->
    <script src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/js/script.js') }}"></script>
    <!-- Plugin used-->
    @stack('scripts')
</body>

</html>
