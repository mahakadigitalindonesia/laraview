<div class="page-header">
    <div class="header-wrapper row m-0">
        <form class="form-inline search-full col" action="#" method="get">
            <div class="form-group w-100">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                               placeholder="Search Cuba .." name="q" title="" autofocus>
                        <div class="spinner-border Typeahead-spinner" role="status"><span
                                    class="sr-only">Loading...</span>
                        </div>
                        <i class="close-search" data-feather="x"></i>
                    </div>
                    <div class="Typeahead-menu"></div>
                </div>
            </div>
        </form>
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="{{ $attributes->get('logo-url') ?? '#' }}"><img class="img-fluid"
                                                                                                      src="{{ $attributes->get('logo') ?? asset(config('laraview.assets.url_prefix').'/mdigi/laraview/cuba/html/assets/images/logo/logo.png') }}"
                                                                                                      alt="logo"></a>
            </div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
            </div>
        </div>
        <div class="left-header col horizontal-wrapper ps-0">
        </div>
        <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">
                <li class="profile-nav onhover-dropdown p-0 me-0">
                    <div class="media profile-media"><img class="b-r-10"
                                                          src="{{ $attributes->get('user-avatar') ?? asset(config('laraview.assets.url_prefix'). '/mdigi/laraview/assets/img/profile.jpg') }}"
                                                          alt="">
                        <div class="media-body"><span>{{ Auth::user()->name }}</span>
                            <p class="mb-0 font-roboto">{{ Auth::user()->email }} <i
                                        class="middle fa fa-angle-down"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li>
                            <a href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i data-feather="log-in"> </i>
                                <span>Log out</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>