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
                    Checkout
                </li>
            </ol>
        </nav>
    </div>

    <div class="container my-4">

        @if ($cart = \App\Helpers\Cart\Cart::getCart())

            <div class="row g-4">

                <!-- Checkout Form -->
                <div class="col-lg-7 col-xl-8">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">

                        <h1 class="fw-bold text-dark h4 mb-4 pb-2 border-bottom d-flex align-items-center gap-2">
                            <i class="fa-solid fa-credit-card text-accent"></i> Checkout
                        </h1>

                        <form wire:submit="saveOrder">

                            @guest
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label fw-medium fs-7 text-dark">
                                            Name and Surname <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-0 text-muted"><i class="fa-regular fa-user"></i></span>
                                            <input type="text" id="name"
                                                class="form-control border-0 bg-light rounded-end-3 fs-7 shadow-none @error('name') is-invalid @enderror" 
                                                placeholder="Myroslav Slavutych"
                                                aria-label="Name" 
                                                wire:model="name">
                                        </div>
                                        @error('name')
                                            <div class="invalid-feedback d-block fs-8">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email" class="form-label fw-medium fs-7 text-dark">
                                            Email <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-0 text-muted"><i class="fa-regular fa-envelope"></i></span>
                                            <input type="email" id="email"
                                                class="form-control border-0 bg-light rounded-end-3 fs-7 shadow-none @error('email') is-invalid @enderror"
                                                placeholder="example@mail.com" 
                                                aria-label="Email" 
                                                wire:model="email">
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback d-block fs-8">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            @endguest

                            <div class="mb-4">
                                <label for="note" class="form-label fw-medium fs-7 text-dark">Notes to order</label>
                                <textarea class="form-control border-0 bg-light rounded-3 fs-7 shadow-none @error('note') is-invalid @enderror" 
                                          id="note" 
                                          rows="4"
                                          placeholder="Please specify any delivery requests or comments..." 
                                          wire:model="note"></textarea>
                                @error('note')
                                    <div class="invalid-feedback d-block fs-8">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="pt-2">
                                <button type="submit" 
                                        class="btn btn-accent btn-lg w-100 rounded-3 d-flex align-items-center justify-content-center gap-2 fw-semibold"
                                        wire:loading.attr="disabled">
                                    <span>Confirm order</span>
                                    <i class="fa-solid fa-arrow-right fs-6"></i>
                                    <div wire:loading wire:target="saveOrder" class="ms-2">
                                        <div class="spinner-border spinner-border-sm text-white" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-5 col-xl-4">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white sticky-lg-top" style="top: 20px;">
                        <h5 class="fw-bold text-dark mb-4 pb-2 border-bottom d-flex align-items-center justify-content-between">
                            <span>Order Details</span>
                            <span class="badge bg-soft-blue text-accent rounded-pill fs-7">{{ count($cart) }}</span>
                        </h5>

                        <ul class="list-group list-group-flush mb-3">
                            @foreach ($cart as $k => $item)
                                <li wire:key="{{ $k }}" class="list-group-item border-0 px-0 py-2 d-flex justify-content-between align-items-center">
                                    <div class="me-3 text-truncate" style="max-width: 65%;">
                                        <span class="fw-medium text-dark d-block text-truncate fs-7">{{ $item['title'] }}</span>
                                        <span class="text-muted fs-8">{{ $item['quantity'] }} шт. × ${{ $item['price'] }}</span>
                                    </div>
                                    <span class="fw-bold text-dark fs-7">${{ $item['quantity'] * $item['price'] }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                            <span class="fs-6 fw-semibold text-dark">Total amount due:</span>
                            <span class="fs-3 fw-bold text-accent">${{ \App\Helpers\Cart\Cart::getCartTotal() }}</span>
                        </div>

                    </div>
                </div>

            </div>
        @else
            <!-- Empty Cart State -->
            <div class="card border-0 shadow-sm rounded-4 p-5 text-center bg-white my-4">
                <div class="bg-soft-blue text-accent mx-auto rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 72px; height: 72px;">
                    <i class="fa-solid fa-cart-shopping fs-3"></i>
                </div>
                <h5 class="fw-bold text-dark mb-2">Your cart is empty</h5>
                <p class="text-muted small mb-4">You haven't added any product to your cart yet</p>
                <div>
                    <a wire:navigate href="{{ route('home') }}" class="btn btn-accent rounded-pill px-4 py-2 fs-7 fw-medium">
                        <i class="fa-solid fa-arrow-left me-1"></i> Go to Shopping
                    </a>
                </div>
            </div>
        @endif
    </div>

</div>