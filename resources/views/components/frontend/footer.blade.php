<footer id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="{{ $attributes->get('href') }}" class="logo d-flex align-items-center">
                        <img src="{{ $attributes->get('logo') ?? asset('image/logo.png') }}" class="gambar" style="opacity: .8; width: 20px;">
                        <span>{{ config('app.name', 'MDIGI Laraview') }}</span>
                    </a>
                    <p>{{ $description }}</p>
                </div>
                <div class="col-lg-4 col-6 footer-links">
                    <h4>Link Terkait</h4>
                    <ul>
                        {{ $link }}
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>
                        {{ $contact }}
                    </p>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>FlexStart</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer>