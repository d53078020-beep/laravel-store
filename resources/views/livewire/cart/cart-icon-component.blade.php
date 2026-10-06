<div class="position-relative d-inline-block">
    <button class="btn border-0 rounded-circle p-0 d-flex align-items-center justify-content-center shadow-sm" 
            id="cart-open" 
            type="button" 
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasCart" 
            aria-controls="offcanvasCart"
            aria-label="Переглянути кошик"
            style="width: 42px; height: 42px; background-color: #e2f0ff; color: #0d6efd; transition: all 0.2s ease;">
        
        <i class="fa-solid fa-cart-shopping fs-5"></i>

        @if (\App\Helpers\Cart\Cart::getCartQuantityItems() > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-2 border-white text-white fs-8 px-2 py-1 shadow-sm">
                {{ \App\Helpers\Cart\Cart::getCartQuantityItems() }}
                <span class="visually-hidden">products in cart</span>
            </span>
        @endif
    </button>
</div>