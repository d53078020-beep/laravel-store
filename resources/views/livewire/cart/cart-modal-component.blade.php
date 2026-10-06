<div class="offcanvas offcanvas-end border-0 shadow-lg" tabindex="-1" id="offcanvasCart"
    aria-labelledby="offcanvasCartLabel" wire:ignore.self>
    <div class="offcanvas-header border-bottom py-3">
        <h5 class="offcanvas-title fw-bold text-dark d-flex align-items-center gap-2" id="offcanvasCartLabel">
            <i class="fa-solid fa-bag-shopping text-accent"></i> Cart
        </h5>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body position-relative d-flex flex-column justify-content-between">
        @if ($cart = \App\Helpers\Cart\Cart::getCart())
            <div>
                <!-- Loading Indicator for Cart Actions -->
                <div class="update-loading" wire:loading wire:target.except="add2Cart"
                    style="background: rgba(255, 255, 255, 0.6); backdrop-filter: blur(2px);">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <!-- Products List -->
                <div class="list-group list-group-flush">
                    @foreach ($cart as $id => $item)
                        <div class="list-group-item border-0 border-bottom py-3 px-0 d-flex align-items-center justify-content-between gap-2"
                            wire:key="{{ $id }}">
                            <div class="d-flex align-items-center gap-3 text-truncate">
                                <a href="{{ route('product', $item['slug']) }}" wire:navigate class="flex-shrink-0">
                                    <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}"
                                        class="rounded-3 border p-1 object-fit-contain"
                                        style="width: 54px; height: 54px;">
                                </a>
                                <div class="text-truncate">
                                    <a href="{{ route('product', $item['slug']) }}" wire:navigate
                                        class="fw-semibold text-dark text-decoration-none text-truncate d-block fs-7 style-product-link">
                                        {{ $item['title'] }}
                                    </a>
                                    <div class="fs-8 text-muted mt-1">
                                        <span>${{ $item['price'] }}</span> × <span
                                            class="fw-bold text-dark">{{ $item['quantity'] }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center gap-2">
                                <span class="fw-bold text-accent fs-7">${{ $item['price'] * $item['quantity'] }}</span>
                                <button class="btn btn-link text-muted hover-danger p-1 border-0"
                                    wire:click="removeFromCart({{ $id }})" wire:loading.attr="disabled"
                                    wire:target="removeFromCart({{ $id }})" title="Видалити">
                                    <i class="fa-regular fa-circle-xmark"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Offcanvas Footer Summary & Actions -->
            <div class="border-top pt-3 mt-auto">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="fs-6 fw-semibold text-dark">Total:</span>
                    <span class="fs-4 fw-bold text-accent">${{ \App\Helpers\Cart\Cart::getCartTotal() }}</span>
                </div>

                <div class="d-grid gap-2">
                    <a wire:navigate href="{{ route('checkout') }}"
                        class="btn btn-accent rounded-3 fw-semibold py-2 fs-7 d-flex align-items-center justify-content-center gap-2">
                        <span>Checkout</span>
                        <i class="fa-solid fa-arrow-right fs-7"></i>
                    </a>
                    <a wire:navigate href="{{ route('cart') }}"
                        class="btn btn-light rounded-3 fw-medium text-dark py-2 fs-7">
                        Cart
                    </a>
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="my-auto text-center py-5">
                <div class="bg-soft-blue text-accent mx-auto rounded-circle d-flex align-items-center justify-content-center mb-3"
                    style="width: 64px; height: 64px;">
                    <i class="fa-solid fa-cart-shopping fs-4"></i>
                </div>
                <h6 class="fw-bold text-dark mb-1">Your cart is empty</h6>
                <p class="text-muted fs-8 mb-0">Add product from category for checkout</p>
            </div>
        @endif
    </div>
</div>
