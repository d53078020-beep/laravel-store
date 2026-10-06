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
                <li class="breadcrumb-item active text-dark fw-medium" aria-current="page">
                    Cart
                </li>
            </ol>
        </nav>
    </div>

    <div class="container my-4">
        <div class="row g-4">

            <!-- Cart Table Area -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">

                    <h1 class="fw-bold text-dark h4 mb-4 pb-2 border-bottom d-flex align-items-center gap-2">
                        <i class="fa-solid fa-cart-shopping text-accent"></i> Your cart
                    </h1>

                    @if ($cart = \App\Helpers\Cart\Cart::getCart())
                        <div class="table-responsive position-relative">

                            <!-- Modern Loading Overlay -->
                            <div class="update-loading" wire:loading wire:target.except="add2Cart"
                                style="background: rgba(255, 255, 255, 0.6); backdrop-filter: blur(2px);">
                                <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>

                            <table class="table align-middle table-borderless mb-0">
                                <thead class="table-light rounded-3 text-secondary fs-7">
                                    <tr>
                                        <th scope="col" class="py-3 ps-3 rounded-start-3">Product</th>
                                        <th scope="col" class="py-3">Price</th>
                                        <th scope="col" class="py-3 text-center">Quantity</th>
                                        <th scope="col" class="py-3">Total</th>
                                        <th scope="col" class="py-3 text-end pe-3 rounded-end-3"><i
                                                class="fa-regular fa-trash-can"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $id => $item)
                                        <tr wire:key="{{ $id }}" class="border-bottom">
                                            <td class="py-3 ps-3">
                                                <div class="d-flex align-items-center gap-3">
                                                    <a href="{{ route('product', $item['slug']) }}" wire:navigate
                                                        class="flex-shrink-0">
                                                        <img src="{{ asset($item['image']) }}"
                                                            alt="{{ $item['title'] }}"
                                                            class="rounded-3 border p-1 object-fit-contain"
                                                            style="width: 60px; height: 60px;">
                                                    </a>
                                                    <a href="{{ route('product', $item['slug']) }}" wire:navigate
                                                        class="fw-semibold text-dark text-decoration-none text-truncate fs-7 style-product-link"
                                                        style="max-width: 200px;">
                                                        {{ $item['title'] }}
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="py-3 fs-7 fw-medium text-dark">
                                                ${{ $item['price'] }}
                                            </td>
                                            <td class="py-3" x-data="{ qty: {{ $item['quantity'] }} }">
                                                <div class="input-group input-group-sm mx-auto" style="width: 110px;">
                                                    <input type="number" value="{{ $item['quantity'] }}"
                                                        x-model="qty"
                                                        class="form-control border-0 bg-light text-center fw-semibold rounded-start-3 shadow-none"
                                                        min="1">
                                                    <button class="btn btn-accent rounded-end-3 px-2" type="button"
                                                        wire:loading.attr="disabled"
                                                        x-on:click="$wire.updateItemQuantity({{ $id }}, qty)"
                                                        title="Reload">
                                                        <i class="fa-solid fa-rotate fs-8"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="py-3 fs-7 fw-bold text-accent">
                                                ${{ $item['quantity'] * $item['price'] }}
                                            </td>
                                            <td class="py-3 text-end pe-3">
                                                <button class="btn btn-link text-muted hover-danger p-0 border-0"
                                                    wire:click="removeFromCart({{ $id }})"
                                                    wire:loading.attr="disabled"
                                                    wire:target="removeFromCart({{ $id }})" title="Delete">
                                                    <i class="fa-regular fa-trash-can fs-6"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-between align-items-center pt-4">
                                <a wire:navigate href="{{ route('home') }}"
                                    class="btn btn-link text-muted text-decoration-none fs-7 p-0">
                                    <i class="fa-solid fa-arrow-left me-1"></i> Continue shopping
                                </a>
                                <button class="btn btn-outline-danger btn-sm rounded-pill px-3 fs-7"
                                    wire:click="clearCart" wire:loading.attr="disabled" wire:target="clearCart">
                                    <i class="fa-regular fa-trash-can me-1"></i> Clear cart
                                </button>
                            </div>

                        </div>
                    @else
                        <!-- Empty Cart State -->
                        <div class="text-center py-5">
                            <div class="bg-soft-blue text-accent mx-auto rounded-circle d-flex align-items-center justify-content-center mb-3"
                                style="width: 72px; height: 72px;">
                                <i class="fa-solid fa-cart-shopping fs-3"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-2">Your cart is empty</h5>
                            <p class="text-muted small mb-4">You still didn't add any product to cart.</p>
                            <a wire:navigate href="{{ route('home') }}"
                                class="btn btn-accent rounded-pill px-4 py-2 fs-7 fw-medium">
                                <i class="fa-solid fa-arrow-left me-1"></i> Continue shopping
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Cart Summary Sidebar -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white sticky-lg-top" style="top: 20px;">
                    <h5 class="fw-bold text-dark mb-4 pb-2 border-bottom">Total</h5>

                    <div class="d-flex justify-content-between align-items-center mb-3 fs-7">
                        <span class="text-muted">Unique positions:</span>
                        <span class="fw-semibold text-dark">{{ \App\Helpers\Cart\Cart::getCartQuantityItems() }}</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom fs-7">
                        <span class="text-muted">All products:</span>
                        <span
                            class="fw-semibold text-dark">{{ \App\Helpers\Cart\Cart::getCartQuantityTotal() }}</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="fs-6 fw-semibold text-dark">Total:</span>
                        <span class="fs-3 fw-bold text-accent">
                            {{ \Illuminate\Support\Number::currency(\App\Helpers\Cart\Cart::getCartTotal(), in: 'USD') }}
                        </span>
                    </div>

                    @if ($cart)
                        <div class="d-grid">
                            <a wire:navigate href="{{ route('checkout') }}"
                                class="btn btn-accent btn-lg rounded-3 fw-semibold d-flex align-items-center justify-content-center gap-2 fs-6">
                                <span>Checkout</span>
                                <i class="fa-solid fa-arrow-right fs-6"></i>
                            </a>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>

</div>
