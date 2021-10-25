<section id="about" class="about">
    <div class="container" data-aos="fade-up">
        <div class="row gx-0">

            <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                    <h3>Tentang Aplikasi {{ config('app.name', 'Laravel') }}</h3>
                    <h2>
                        {{ $title }}
                    </h2>
                    <p>
                        {{ $description }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ $attributes->get('image') ?? asset(config('laraview.assets.url_prefix') . '/laraview/assets/img/values-3.png') }}"
                     class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section>