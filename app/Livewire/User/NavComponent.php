<?php

namespace App\Livewire\User;

use App\Helpers\Traits\CartTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class NavComponent extends Component
{
    use CartTrait;

    #[On('cart-updated')]
    public function render()
    {
        return view('livewire.user.nav-component');
    }
}
