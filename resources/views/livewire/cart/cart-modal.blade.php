<?php

use Livewire\Attributes\On;
use Livewire\Volt\Component;
use Livewire\Attributes\Js;
use App\Domains\Cart\Projections\Cart;

new class extends Component {
    public bool $isOpen = false;
    public Cart $cart;

    #[On("show-cart")]
    public function showCart()
    {
        $this->cart = request()->attributes->get('cart');
        $this->cart->refresh();

        $this->isOpen = true;
    }
};
?>

<flux:modal :name="'cart-modal'" variant="flyout" class="w-[500px]" wire:model="isOpen">
    <flux:heading size="lg" class="mb-4">{{ __("pages/cart.modal.title") }}</flux:heading>
    <flux:separator />
    @if ($cart)
        @foreach ($cart->items as $item)
            <livewire:cart.cart-product :item="$item" wire:key="cart-product-{{ $item->item->uuid }}" />
        @endforeach
    @endif
</flux:modal>
