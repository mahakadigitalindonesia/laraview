<a href="{{ $attributes->get('href') ?? '#' }}" class="logo d-flex align-items-center">
    <img src="{{ $attributes->get('logo') ?? asset(config('laraview.assets.url_prefix') . '/laraview/assets/img/logo-mdigi.png') }}"
         class="gambar" style="opacity: .8; width: 20px;">
    <span>{{ config('app.name', 'MDIGI Laraview') }}</span>
</a>