<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="{{ $attributes->get('href') }}" class="logo d-flex align-items-center">
            <img src="{{ $attributes->get('logo') ?? asset('image/logo.png') }}" class="gambar" style="opacity: .8; width: 30px;">
            <span>{{ config('app.name', 'MDIGI Laraview') }}</span>
        </a>
        {{ $slot }}
    </div>
</header>