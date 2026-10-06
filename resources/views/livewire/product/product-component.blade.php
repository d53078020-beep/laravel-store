<div>

    @section('metatags')
        <title>{{ config('app.name') . ' :: ' . ($title ?? 'Page Title') }}</title>
        <meta name="description" content="{{ $desc ?? '' }}">
    @endsection

    <!-- Breadcrumbs -->
    <div class="container my-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white p-3 rounded-4 shadow-sm mb-0 align-items-center fs-7">
                <li class="breadcrumb-item">
                    <a wire:navigate href="{{ route('home') }}" class="text-decoration-none text-muted">
                        <i class="fa-solid fa-house me-1"></i> Home
                    </a>
                </li>
                @foreach ($breadcrumbs as $breadcrumb_slug => $breadcrumb_title)
                    <li class="breadcrumb-item">
                        <a href="{{ route('category', $breadcrumb_slug) }}" wire:navigate class="text-decoration-none text-muted">
                            {{ $breadcrumb_title }}
                        </a>
                    </li>
                @endforeach
                <li class="breadcrumb-item active text-dark fw-medium" aria-current="page">
                    {{ $product->title }}
                </li>
            </ol>
        </nav>
    </div>

    <div class="container my-4">
        <div class="row g-4">
            <!-- Product Gallery -->
            <div class="col-md-5 col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white p-3 h-100">
                    <div id="carouselExampleFade" class="carousel carousel-dark slide carousel-fade position-relative my-auto">
                        <div class="carousel-inner rounded-3">
                            <div class="carousel-item active">
                                <img src="{{ asset($product->getImage()) }}" class="d-block w-100 object-fit-contain" style="max-height: 420px;" alt="{{ $product->title }}">
                            </div>
                            @foreach ($product->gallery as $item)
                                <div class="carousel-item">
                                    <img src="{{ asset($item) }}" class="d-block w-100 object-fit-contain" style="max-height: 420px;" alt="{{ $product->title }}">
                                </div>
                            @endforeach
                        </div>
                        @if ($product->gallery)
                            <button class="carousel-control-prev rounded-circle bg-white shadow-sm my-auto ms-2 d-flex align-items-center justify-content-center" 
                                    style="width: 36px; height: 36px; opacity: 0.9;" 
                                    type="button" 
                                    data-bs-target="#carouselExampleFade" 
                                    data-bs-slide="prev">
                                <i class="fa-solid fa-chevron-left fs-7"></i>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next rounded-circle bg-white shadow-sm my-auto me-2 d-flex align-items-center justify-content-center" 
                                    style="width: 36px; height: 36px; opacity: 0.9;" 
                                    type="button" 
                                    data-bs-target="#carouselExampleFade" 
                                    data-bs-slide="next">
                                <i class="fa-solid fa-chevron-right fs-7"></i>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Product Main Info -->
            <div class="col-md-7 col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 d-flex flex-column justify-content-between">
                    <div>
                        <h1 class="fw-bold text-dark h3 mb-3">{{ $product->title }}</h1>

                        <!-- Price Box -->
                        <div class="d-flex align-items-baseline gap-3 mb-3">
                            <span class="fs-2 fw-bold text-accent">${{ $product->price }}</span>
                            @if ($product->old_price)
                                <span class="fs-5 text-muted text-decoration-line-through">${{ $product->old_price }}</span>
                            @endif
                        </div>

                        @if($product->excerpt)
                            <p class="text-muted leading-relaxed mb-4 fs-7">{{ $product->excerpt }}</p>
                        @endif

                        <!-- Add to Cart Block -->
                        <div class="product-add2cart my-4 p-3 bg-light rounded-4">
                            <div class="row g-2 align-items-center">
                                <div class="col-12 col-sm-4 col-md-3">
                                    <input type="number" 
                                           class="form-control form-control-lg border-0 rounded-3 text-center fw-bold shadow-none" 
                                           value="{{ $quantity }}"
                                           wire:model="quantity" 
                                           min="1">
                                </div>
                                <div class="col-12 col-sm-8 col-md-9">
                                    <button class="btn btn-accent btn-lg w-100 rounded-3 d-flex align-items-center justify-content-center gap-2 fw-semibold" 
                                            wire:click="add2Cart({{ $product->id }}, true)"
                                            wire:loading.attr="disabled">
                                        <i class="fas fa-shopping-cart fs-6"></i> 
                                        <span>Add to cart</span>
                                        <div wire:loading wire:target="add2Cart({{ $product->id }}, true)" class="ms-2">
                                            <div class="spinner-border spinner-border-sm text-white" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Advantages Row -->
                    <div class="row g-3 mt-2">
                        <div class="col-lg-4 col-sm-6">
                            <div class="p-3 rounded-3 bg-soft-blue h-100 border-0">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <i class="fa-solid fa-shield-halved text-accent fs-5"></i>
                                    <h6 class="fw-bold text-dark mb-0 fs-7">Warranty</h6>
                                </div>
                                <ul class="list-unstyled mb-0 fs-8 text-muted d-flex flex-column gap-1">
                                    <li>• 1 year warranty</li>
                                    <li>• 14 days return</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <div class="p-3 rounded-3 bg-soft-blue h-100 border-0">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <i class="fa-solid fa-truck-fast text-accent fs-5"></i>
                                    <h6 class="fw-bold text-dark mb-0 fs-7">Shipping</h6>
                                </div>
                                <ul class="list-unstyled mb-0 fs-8 text-muted d-flex flex-column gap-1">
                                    <li>• Nationwide delivery</li>
                                    <li>• Courier or pickup</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12">
                            <div class="p-3 rounded-3 bg-soft-blue h-100 border-0">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <i class="fa-regular fa-credit-card text-accent fs-5"></i>
                                    <h6 class="fw-bold text-dark mb-0 fs-7">Payment</h6>
                                </div>
                                <ul class="list-unstyled mb-0 fs-8 text-muted d-flex flex-column gap-1">
                                    <li>• Cash on delivery</li>
                                    <li>• VISA / MasterCard</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Description & Features Tabs -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                    <ul class="nav nav-pills gap-2 mb-4 border-bottom pb-3" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active rounded-pill px-4 fw-medium" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description-tab-pane" type="button" role="tab"
                                aria-controls="description-tab-pane" aria-selected="true">Description
                            </button>
                        </li>
                        @if ($attributes->isNotEmpty())
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill px-4 fw-medium" id="features-tab" data-bs-toggle="tab"
                                    data-bs-target="#features-tab-pane" type="button" role="tab"
                                    aria-controls="features-tab-pane" aria-selected="false">Specifications
                                </button>
                            </li>
                        @endif
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active text-muted leading-relaxed" id="description-tab-pane" role="tabpanel"
                            aria-labelledby="description-tab" tabindex="0">
                            {!! $product->content !!}
                        </div>
                        @if ($attributes->isNotEmpty())
                            <div class="tab-pane fade" id="features-tab-pane" role="tabpanel"
                                aria-labelledby="features-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0">
                                        <tbody>
                                            @foreach ($attributes as $attribute)
                                                <tr>
                                                    <th scope="row" class="fw-semibold text-dark w-25 border-0 py-3">{{ $attribute->filter_groups_title }}</th>
                                                    <td class="text-muted border-0 py-3">{{ $attribute->filters_title }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    @if (count($related_products))
        <section class="new-products my-5">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h2 class="fw-bold text-dark mb-1">Related Products</h2>
                        <p class="text-muted small mb-0">You might also like</p>
                    </div>
                </div>

                <div class="owl-carousel owl-theme owl-carousel-full" wire:ignore>
                    @foreach ($related_products as $product)
                        <div wire:key="{{ $product->id }}" class="p-1">
                            @include('incs.product-card')
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

</div>