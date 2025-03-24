<?php

use Livewire\Attributes\On;
use Livewire\Volt\Component;
use Livewire\Attributes\Js;
use App\Domains\Cart\Projections\Cart;

new class extends Component {
    public bool $isOpen = false;

    public ?Cart $cart = null;

    #[On("show-cart")]
    public function showCart()
    {
        $this->cart = request()->attributes->get('cart');
        $this->cart->refresh();
        $this->isOpen = true;
    }

    #[On("refresh-cart")]
    public function refreshCart()
    {
        $this->cart?->refresh();
    }
};
?>

<flux:modal :name="'cart-modal'" variant="flyout" class="w-[500px] flex flex-col h-full" wire:model="isOpen">
    <div class="flex-grow overflow-auto">
        <flux:heading size="lg" class="mb-4">{{ __("pages/cart.modal.title") }}</flux:heading>
        <flux:separator />
        @if ($cart)
            @foreach ($cart->items->sortByDesc('created_at') as $item)
                <livewire:cart.cart-product :item="$item" wire:key="cart-product-{{ $item->item->uuid }}-{{ $item->quantity }}" />
            @endforeach
        @endif
    </div>

    <div class="mt-auto">
        <flux:separator />
        <div class="p-6">
            <div class="flex justify-between text-xs mb-4">
                <div class="flex flex-col gap-1 w-2/3">
                    <span>{{ __("pages/cart.subtotal") }}</span>
                    <span>{{ __("pages/cart.shipping") }}</span>
                </div>
                <span class="font-bold">200 €</span>
            </div>
            <flux:button class="w-full h-10">
                <flux:icon name="arrow-right" class="w-4 h-4 hover:cursor-pointer" wire:click="checkout" />
                {{ __("pages/cart.checkout") }}
            </flux:button>
            <a href="{{ route("homepage") }}#products" class="group flex items-center justify-center gap-2 text-xs mt-4">
                <div class="group-hover:underline">{{ __("pages/cart.continue_shopping") }}</div>
            </a>
        </div>
    </div>
</flux:modal>
