<div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden position-relative hover-up transition-all bg-white">
    <!-- Badges / Offers -->
    <div class="position-absolute top-0 start-0 p-3 z-2 d-flex flex-column gap-1">
        @if($product->is_hit)
            <span class="badge bg-danger rounded-pill px-2 py-1 fs-8 fw-semibold shadow-sm">
                <i class="fa-solid fa-fire me-1"></i>Hot
            </span>
        @endif
        @if($product->is_new)
            <span class="badge bg-success rounded-pill px-2 py-1 fs-8 fw-semibold shadow-sm">
                New
            </span>
        @endif
        @if($product->old_price)
            <span class="badge bg-warning text-dark rounded-pill px-2 py-1 fs-8 fw-semibold shadow-sm">
                Sale
            </span>
        @endif
    </div>

    <!-- Product Image -->
    <div class="product-thumb p-3 text-center bg-light-subtle position-relative overflow-hidden">
        <a href="{{ route('product', $product->slug) }}" wire:navigate class="d-block">
            <img src="{{ asset($product->getImage()) }}" 
                 alt="{{ $product->title }}" 
                 class="img-fluid object-fit-contain transition-all" 
                 style="height: 200px; width: 100%;">
        </a>
    </div>

    <!-- Product Details -->
    <div class="card-body d-flex flex-column justify-content-between p-3">
        <div>
            <h6 class="card-title mb-2">
                <a href="{{ route('product', $product->slug) }}" 
                   wire:navigate 
                   class="text-dark text-decoration-none fw-semibold lh-sm d-block text-truncate-2 hover-accent style-product-link fs-7">
                    {{ $product->title }}
                </a>
            </h6>
        </div>

        <div class="d-flex align-items-center justify-content-between pt-3 mt-2 border-top">
            <!-- Prices -->
            <div class="d-flex flex-column">
                @if($product->old_price)
                    <span class="text-muted text-decoration-line-through fs-8 lh-1 mb-1">
                        ${{ $product->old_price }}
                    </span>
                @endif
                <span class="fs-6 fw-bold text-accent lh-1">
                    ${{ $product->price }}
                </span>
            </div>

            <!-- Add to Cart Button -->
            <div>
                <button wire:click="add2Cart({{ $product->id }})" 
                        wire:loading.attr="disabled" 
                        wire:target="add2Cart({{ $product->id }})"
                        class="btn btn-accent btn-sm rounded-circle d-flex align-items-center justify-content-center p-0 shadow-sm" 
                        style="width: 38px; height: 38px;"
                        title="Add to cart">
                    
                    <span wire:loading.remove wire:target="add2Cart({{ $product->id }})">
                        <i class="fas fa-shopping-cart fs-7"></i>
                    </span>

                    <span wire:loading wire:target="add2Cart({{ $product->id }})">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>