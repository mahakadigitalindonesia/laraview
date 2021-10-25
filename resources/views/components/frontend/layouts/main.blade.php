<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name', 'MDIGI Laraview') }}</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset(config('laraview.assets.url_prefix') . '/mdigi/laraview/assets/img/logo-mdigi.png') }}" rel="icon">
    <link href="{{ asset(config('laraview.assets.url_prefix') . '/mdigi/laraview/assets/img/logo-mdigi.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset(config('laraview.assets.url_prefix') . '/mdigi/laraview/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset(config('laraview.assets.url_prefix') . '/mdigi/laraview/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset(config('laraview.assets.url_prefix') . '/mdigi/laraview/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset(config('laraview.assets.url_prefix') . '/mdigi/laraview/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset(config('laraview.assets.url_prefix') . '/mdigi/laraview/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset(config('laraview.assets.url_prefix') . '/mdigi/laraview/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset(config('laraview.assets.url_prefix') . '/mdigi/laraview/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
{{ $header }}
{{ $hero }}
<main id="main">
    {{ $slot }}
</main><!-- End #main -->
{{ $footer }}

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<script src="{{ asset(config('laraview.assets.url_prefix') . '/mdigi/laraview/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset(config('laraview.assets.url_prefix') . '/mdigi/laraview/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset(config('laraview.assets.url_prefix') . '/mdigi/laraview/assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset(config('laraview.assets.url_prefix') . '/mdigi/laraview/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset(config('laraview.assets.url_prefix') . '/mdigi/laraview/assets/vendor/purecounter/purecounter.js') }}"></script>
<script src="{{ asset(config('laraview.assets.url_prefix') . '/mdigi/laraview/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset(config('laraview.assets.url_prefix') . '/mdigi/laraview/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset(config('laraview.assets.url_prefix') . '/mdigi/laraview/assets/js/main.js') }}"></script>
@stack('scripts')
</body>

</html>
