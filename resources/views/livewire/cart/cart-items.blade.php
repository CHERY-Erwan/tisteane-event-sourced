<?php

declare(strict_types=1);

use Livewire\Volt\Component;
use App\Domains\Cart\Projections\Cart;
use Illuminate\Support\Collection;

new class extends Component {
    public Cart $cart;

    #[Computed]
    public function items(): Collection
    {
        return $this->cart->items->sortBy('created_at', SORT_ASC);
    }
}; ?>

<div class="flex-grow overflow-auto">
    @foreach ($this->items() as $item)
        <livewire:cart.cart-item
            :item="$item"
            wire:key="cart-item-{{ $item->item->uuid }}"
        />
    @endforeach
</div>
