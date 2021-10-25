<x-laraview-frontend.layouts.main>
    <x-slot name="header">
        <x-laraview-frontend.header href="{{ url('') }}">
            <x-laraview-frontend.navbar>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#footer">Contact</a></li>
                <li>
                    @if (Route::has('login'))
                        @auth
                            <x-laraview-frontend.buttons.primary label="Home"/>

                        @else
                            <x-laraview-frontend.buttons.primary label="Login"/>
                        @endauth
                    @endif
                </li>
            </x-laraview-frontend.navbar>
        </x-laraview-frontend.header>
    </x-slot>
    <x-slot name="hero">
        <x-laraview-frontend.hero>
            <x-slot name="title">
                Aplikasi Administrasi Pajak Daerah
            </x-slot>
            <x-slot name="cta">
                @if (Route::has('login'))
                    @auth
                        <x-laraview-frontend.buttons.primary-icon href="{{ route('dashboard') }}" label="Dashboard"/>
                    @else
                        <x-laraview-frontend.buttons.primary-icon href="{{route('login')}}" label="Login"/>
                    @endauth
                @endif
            </x-slot>
        </x-laraview-frontend.hero>
    </x-slot>
    <x-slot name="footer">
        <x-laraview-frontend.footer href="#">
            <x-slot name="description">
                Aplikasi {{ config('app.name', 'Laravel') }}
            </x-slot>
            <x-slot name="link">
                <li><i class="bi bi-chevron-right"></i> <a href="#">Link 1</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#">Link 2</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#">Link 3</a></li>
            </x-slot>
            <x-slot name="contact">
                {{ 'Contact Us' }}
            </x-slot>
        </x-laraview-frontend.footer>
    </x-slot>
    <x-laraview-frontend.about>
        <x-slot name="title">
            Aplikasi yang dipergunakan untuk Administrasi Perpajakan.
        </x-slot>
        <x-slot name="description">
            Aplikasi ini hadir dengan tujuan guna mempermudah Pemerintah Daerah.
        </x-slot>
    </x-laraview-frontend.about>

</x-laraview-frontend.layouts.main>
