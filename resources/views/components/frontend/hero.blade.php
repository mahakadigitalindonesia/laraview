<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">{{ config('app.name', 'MDIGI Laraview') }}</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">
                    {{ $title }}
                </h2>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">
                        {{ $cta }}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ $attributes->get('image') ?? asset(config('laraview.assets.url_prefix') . '/laraview/assets/img/hero-img.png') }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section>