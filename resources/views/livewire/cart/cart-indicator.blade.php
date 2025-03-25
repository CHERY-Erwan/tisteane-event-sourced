<?php

declare(strict_types=1);

use App\Domains\Cart\Projections\Cart;
use Livewire\Volt\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;
use Livewire\Volt\Computed;

new class extends Component {
    #[Session(key: 'cart')]
    public Cart $cart;

    public function mount(): void
    {
        $this->cart->refresh();
    }

    #[On("refresh-cart")]
    public function updateCartCount(): void
    {
        $this->cart->refresh();
    }

    #[Computed]
    public function cartItemCount(): int
    {
        return $this->cart->items->sum('quantity');
    }
}; ?>

<div class="relative">
    <div
        @click="$dispatch('show-cart')"
        class="w-fit p-3 h-12 rounded-lg hover:cursor-pointer border border-zinc-600 bg-zinc-600/75 flex items-center justify-center"
    >
        <flux:icon name="shopping-cart" class="shrink-0 w-6 h-6 text-white"/>
        @if ($this->cartItemCount() > 0)
            <div class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full h-5 w-5 flex items-center justify-center text-xs">
                {{ $this->cartItemCount() }}
            </div>
        @endif
    </div>
</div>
