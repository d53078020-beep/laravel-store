<div>

    @section('metatags')
        <title>{{ config('app.name') . ' :: ' . ($title ?? 'Page Title') }}</title>
        <meta name="description" content="{{ $desc ?? 'default...' }}">
    @endsection

    <!-- Hero / Carousel Section -->
    <div class="container my-4">
        <div id="mainCarousel" class="carousel slide carousel-fade rounded-4 overflow-hidden shadow-sm" data-bs-ride="carousel">
            <div class="carousel-indicators mb-3">
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            
            <div class="carousel-inner">
                <div class="carousel-item active position-relative">
                    <img src="{{ asset('assets/img/slider/1.jpg') }}" class="d-block w-100 object-fit-cover" style="max-height: 480px; min-height: 280px;" alt="Banner 1">
                    <div class="carousel-caption d-none d-md-block text-start p-4 p-lg-5" style="background: linear-gradient(180deg, rgba(15,23,42,0) 0%, rgba(15,23,42,0.8) 100%); bottom: 0; left: 0; right: 0;">
                        <h2 class="fw-bold text-white display-6 mb-2">First slide label</h2>
                        <p class="text-white-50 fs-6 mb-0">Some representative placeholder content for the first slide.</p>
                    </div>
                </div>

                <div class="carousel-item position-relative">
                    <img src="{{ asset('assets/img/slider/2.jpg') }}" class="d-block w-100 object-fit-cover" style="max-height: 480px; min-height: 280px;" alt="Banner 2">
                    <div class="carousel-caption d-none d-md-block text-start p-4 p-lg-5" style="background: linear-gradient(180deg, rgba(15,23,42,0) 0%, rgba(15,23,42,0.8) 100%); bottom: 0; left: 0; right: 0;">
                        <h2 class="fw-bold text-white display-6 mb-2">Second slide label</h2>
                        <p class="text-white-50 fs-6 mb-0">Some representative placeholder content for the second slide.</p>
                    </div>
                </div>

                <div class="carousel-item position-relative">
                    <img src="{{ asset('assets/img/slider/3.jpg') }}" class="d-block w-100 object-fit-cover" style="max-height: 480px; min-height: 280px;" alt="Banner 3">
                    <div class="carousel-caption d-none d-md-block text-start p-4 p-lg-5" style="background: linear-gradient(180deg, rgba(15,23,42,0) 0%, rgba(15,23,42,0.8) 100%); bottom: 0; left: 0; right: 0;">
                        <h2 class="fw-bold text-white display-6 mb-2">Third slide label</h2>
                        <p class="text-white-50 fs-6 mb-0">Some representative placeholder content for the third slide.</p>
                    </div>
                </div>

                <div class="carousel-item position-relative">
                    <img src="{{ asset('assets/img/slider/4.jpg') }}" class="d-block w-100 object-fit-cover" style="max-height: 480px; min-height: 280px;" alt="Banner 4">
                    <div class="carousel-caption d-none d-md-block text-start p-4 p-lg-5" style="background: linear-gradient(180deg, rgba(15,23,42,0) 0%, rgba(15,23,42,0.8) 100%); bottom: 0; left: 0; right: 0;">
                        <h2 class="fw-bold text-white display-6 mb-2">Fourth slide label</h2>
                        <p class="text-white-50 fs-6 mb-0">Some representative placeholder content for the fourth slide.</p>
                    </div>
                </div>

                <div class="carousel-item position-relative">
                    <img src="{{ asset('assets/img/slider/5.jpg') }}" class="d-block w-100 object-fit-cover" style="max-height: 480px; min-height: 280px;" alt="Banner 5">
                    <div class="carousel-caption d-none d-md-block text-start p-4 p-lg-5" style="background: linear-gradient(180deg, rgba(15,23,42,0) 0%, rgba(15,23,42,0.8) 100%); bottom: 0; left: 0; right: 0;">
                        <h2 class="fw-bold text-white display-6 mb-2">Fifth slide label</h2>
                        <p class="text-white-50 fs-6 mb-0">Some representative placeholder content for the fifth slide.</p>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev ms-3 my-auto rounded-circle bg-white text-dark shadow-sm d-flex align-items-center justify-content-center" 
                    style="width: 42px; height: 42px; opacity: 0.9;" 
                    type="button" 
                    data-bs-target="#mainCarousel" 
                    data-bs-slide="prev">
                <i class="fa-solid fa-chevron-left fs-7"></i>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next me-3 my-auto rounded-circle bg-white text-dark shadow-sm d-flex align-items-center justify-content-center" 
                    style="width: 42px; height: 42px; opacity: 0.9;" 
                    type="button" 
                    data-bs-target="#mainCarousel" 
                    data-bs-slide="next">
                <i class="fa-solid fa-chevron-right fs-7"></i>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Advantages Section -->
    <section class="advantages my-5 py-3">
        <div class="container">
            <div class="text-center mb-4">
                <span class="badge bg-soft-blue text-accent fw-semibold px-3 py-2 rounded-pill mb-2">Why Choose Us</span>
                <h2 class="fw-bold text-dark h3">Our Advantages</h2>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-sm-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-up transition-all bg-white">
                        <div class="bg-soft-blue text-accent mx-auto rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px;">
                            <i class="fas fa-shipping-fast fs-4"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-2">Fast Delivery</h6>
                        <p class="text-muted small mb-0">Direct supplies from official brand manufacturers</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-up transition-all bg-white">
                        <div class="bg-soft-blue text-accent mx-auto rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px;">
                            <i class="fas fa-cubes fs-4"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-2">Wide Selection</h6>
                        <p class="text-muted small mb-0">Broad range of products. Over 10k items available</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-up transition-all bg-white">
                        <div class="bg-soft-blue text-accent mx-auto rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px;">
                            <i class="fas fa-hand-holding-usd fs-4"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-2">Best Prices</h6>
                        <p class="text-muted small mb-0">Competitive and affordable prices for everyone</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-up transition-all bg-white">
                        <div class="bg-soft-blue text-accent mx-auto rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 64px; height: 64px;">
                            <i class="fa-solid fa-headset fs-4"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-2">24/7 Support</h6>
                        <p class="text-muted small mb-0">Professional consultations from our specialists</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    @if ($hits_products->isNotEmpty())
        <section class="featured-products my-5 py-2">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h2 class="fw-bold text-dark h3 mb-1">Featured Products</h2>
                        <p class="text-muted small mb-0">Most popular products among our customers</p>
                    </div>
                </div>

                <div class="row g-4">
                    @foreach ($hits_products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6" wire:key="{{ $product->id }}">
                            @include('incs.product-card')
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- New Products -->
    @if ($new_products->isNotEmpty())
        <section class="new-products my-5 py-2">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h2 class="fw-bold text-dark h3 mb-1">New Arrivals</h2>
                        <p class="text-muted small mb-0">Fresh additions to our catalog</p>
                    </div>
                </div>

                <div class="owl-carousel owl-theme owl-carousel-full" wire:ignore>
                    @foreach ($new_products as $product)
                        <div wire:key="{{ $product->id }}" class="p-1">
                            @include('incs.product-card')
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- About Us -->
    <section class="about-us my-5 py-3" id="about">
        <div class="container">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-12">
                        <span class="badge bg-soft-blue text-accent fw-semibold px-3 py-2 rounded-pill mb-2">About Company</span>
                        <h2 class="fw-bold text-dark h3 mb-4">About Our Store</h2>
                        <div class="text-muted leading-relaxed fs-7">
                            <p class="mb-3">Welcome to our online store! We strive to provide you with the best online shopping experience by offering a wide range of high-quality products at competitive prices.</p>
                            <p class="mb-3">Our team is constantly working on expanding our catalog so you can find everything you need in one place. We guarantee fast shipping, convenient payment options, and reliable customer support at every stage of your order.</p>
                            <p class="mb-0">Thank you for choosing us! We appreciate the trust of every customer and do our best to make your shopping as smooth and comfortable as possible.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map -->
    <div class="container my-5">
        <div class="rounded-4 overflow-hidden shadow-sm border bg-white">
            <iframe id="map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2407.1070529675467!2d2.3478712780714384!3d48.85881153486507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1ee52239cb%3A0x2cacf4239af49ccb!2zMTggUnVlIFNhaW50LURlbmlzLCA3NTAwMSBQYXJpcywg0KTRgNCw0L3RhtC40Y8!5e0!3m2!1sen!2sus!4v1683972127217!5m2!1sen!2sus"
                width="100%" height="380" style="border:0; display: block;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

</div>

@if (session('success'))
    @script
        <script>
            toastr.success('{{ session('success') }}')
        </script>
    @endscript
@endif