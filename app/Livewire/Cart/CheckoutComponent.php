<?php

namespace App\Livewire\Cart;

use App\Mail\OrderClient;
use App\Mail\OrderManager;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public string $name = '';
    public string $email = '';
    public ?string $note = null; // Виправлено: додано ?string та null за замовчуванням

    public function mount()
    {
        $this->name = auth()->user()->name ?? '';
        $this->email = auth()->user()->email ?? '';
    }

    public function saveOrder()
    {
        $validated = $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'note' => 'nullable|string',
        ]);

        $cart = \App\Helpers\Cart\Cart::getCart();
        $total = \App\Helpers\Cart\Cart::getCartTotal();

        if (empty($cart)) {
            $this->js("toastr.error('Cart is empty!')");
            return;
        }

        $validated = array_merge($validated, [
            'user_id' => auth()->id(),
            'total' => $total,
        ]);

        try {
            DB::beginTransaction();

            $order = Order::query()->create($validated);

            $order_products = [];
            foreach ($cart as $product_id => $product) {
                $order_products[] = [
                    'product_id' => $product_id,
                    'title' => $product['title'],
                    'price' => $product['price'],
                    'quantity' => $product['quantity'],
                    'slug' => $product['slug'],
                    'image' => $product['image'],
                ];
            }

            $order->orderProducts()->createMany($order_products);

            DB::commit(); 
            Mail::to($validated['email'])->send(
                new OrderClient($order_products, $total, $order->id, $validated['note'] ?? null)
            );
            Mail::to('manager@laravel-eshop.loc')->send(
                new OrderManager($order_products, $order->id, $total, $validated['note'] ?? null)
            );

            \App\Helpers\Cart\Cart::clearCart();
            $this->dispatch('cart-updated');
            $this->js("toastr.success('Success ordering!')");
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Order process error: ' . $e->getMessage());
            $this->js("toastr.error('Error ordering!')");
        }
    }

    public function render()
    {
        return view('livewire.cart.checkout-component', [
            'title' => 'Checkout'
        ]);
    }
}
