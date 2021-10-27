<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="{{ $attributes->get('logo-url') ?? '#' }}">
                <img class="img-fluid for-light"
                     src="{{ $attributes->get('logo') ?? asset(config('laraview.assets.url_prefix') . '/mdigi/laraview/assets/img/logo-mdigi.png') }}"
                     alt="" style="width: 20px;">
                <img class="img-fluid for-dark"
                     src="{{ $attributes->get('logo') ?? asset(config('laraview.assets.url_prefix') . '/mdigi/laraview/assets/img/logo-mdigi.png') }}"
                     alt="" style="width: 20px;">
            </a>
            {{ config('app.name', 'MDIGI Laraview') }}
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="{{ $attributes->get('logo-url') ?? '#' }}">
                <img class="img-fluid"
                     src="{{ asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/images/logo/logo-icon.png') }}"
                     alt="logo">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                                                              aria-hidden="true"></i></div>
                    </li>
                    {{ $slot }}
                </ul>
            </div>
        </nav>
    </div>
</div>
