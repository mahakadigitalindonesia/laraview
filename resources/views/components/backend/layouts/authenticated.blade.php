<x-laraview-backend.layouts.main>
    <x-slot name="body">
        <x-laraview-backend.navbar/>
        <div class="page-body-wrapper horizontal-menu">
            <x-laraview-backend.sidebar>
                {{ $sidebarItems ?? '' }}
            </x-laraview-backend.sidebar>
            <div class="page-body">
                {{ $content ?? '' }}
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 footer-copyright text-center">
                            <p class="mb-0">Copyright 2021-{{ date('Y') }} © Mahaka Digital Indonesia</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </x-slot>
</x-laraview-backend.layouts.main>