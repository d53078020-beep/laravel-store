<?php

use App\Livewire\Admin\Category\CategoryCreateComponent;
use App\Livewire\Admin\Category\CategoryEditComponent;
use App\Livewire\Admin\Category\CategoryIndexComponent;
use App\Livewire\Admin\Filter\FilterCreateComponent;
use App\Livewire\Admin\Filter\FilterEditComponent;
use App\Livewire\Admin\Filter\FilterGroupCreateComponent;
use App\Livewire\Admin\Filter\FilterGroupEditComponent;
use App\Livewire\Admin\Filter\FilterGroupIndexComponent;
use App\Livewire\Admin\Filter\FilterIndexComponent;
use App\Livewire\Admin\Product\ProductCreateComponent;
use App\Livewire\Admin\Product\ProductEditComponent;
use App\Livewire\Admin\Product\ProductIndexComponent;
use App\Livewire\Admin\HomeComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\HomeComponent::class)->name('home');
Route::get('/category/{slug}', \App\Livewire\Product\CategoryComponent::class)->name('category');
Route::get('/product/{slug}', \App\Livewire\Product\ProductComponent::class)->name('product');
Route::get('/cart', \App\Livewire\Cart\Cart::class)->name('cart');
Route::get('/checkout', \App\Livewire\Cart\CheckoutComponent::class)->name('checkout');
Route::get('/search', \App\Livewire\Search\SearchComponent::class)->name('search');


Route::middleware('guest')->group(function () {
    Route::get('/register', \App\Livewire\User\RegisterComponent::class)->name('register');
    Route::get('/login', \App\Livewire\User\LoginComponent::class)->name('login');
});

Route::middleware('auth')->group(function() {
    Route::match(['get', 'post'], '/logout', function() {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');
    Route::get('/account', App\Livewire\User\AccountComponent::class)->name('account');
    Route::get('/change-account', App\Livewire\User\ChangeAccountComponent::class)->name('change-account');
    Route::get('/orders', App\Livewire\User\OrderComponent::class)->name('orders');
    Route::get('/order-show/{id}', \App\Livewire\User\OrderShowComponent::class)->name('order-show');
});

Route::prefix('admin')->middleware('admin')->group(function() {
    Route::get('/', HomeComponent::class)->name('admin');

    Route::get('/categories', CategoryIndexComponent::class)->name('admin.categories.index');
    Route::get('/categories/create', CategoryCreateComponent::class)->name('admin.categories.create');
    Route::get('/categories/{category}/edit', CategoryEditComponent::class)->name('admin.categories.edit');

    Route::get('/products', ProductIndexComponent::class)->name('admin.products.index');
    Route::get('/products/create', ProductCreateComponent::class)->name('admin.products.create');
    Route::get('/products/{product}/edit', ProductEditComponent::class)->name('admin.products.edit');

    Route::get('/filter-groups', FilterGroupIndexComponent::class)->name('admin.filter-groups.index');
    Route::get('/filter-groups/create', FilterGroupCreateComponent::class)->name('admin.filter-groups.create');
    Route::get('/filter-groups/{filter_group}/edit', FilterGroupEditComponent::class)->name('admin.filter-groups.edit');
    
    Route::get('/filters', FilterIndexComponent::class)->name('admin.filters.index');
    Route::get('/filters/create', FilterCreateComponent::class)->name('admin.filters.create');
    Route::get('/filters/{filter}/edit', FilterEditComponent::class)->name('admin.filters.edit');

    Route::get('/orders', \App\Livewire\Admin\Order\OrderIndexComponent::class)->name('admin.orders.index');
    Route::get('/orders/{order}/edit', \App\Livewire\Admin\Order\OrderEditComponent::class)->name('admin.orders.edit');

    Route::get('/users', \App\Livewire\Admin\User\UserIndexComponent::class)->name('admin.users.index');
    Route::get('/users/create', \App\Livewire\Admin\User\UserCreateComponent::class)->name('admin.users.create');
    Route::get('/users/{user}/edit', \App\Livewire\Admin\User\UserEditComponent::class)->name('admin.users.edit');
});