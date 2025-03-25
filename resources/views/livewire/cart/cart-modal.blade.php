<?php

declare(strict_types=1);

use Livewire\Attributes\On;
use Livewire\Volt\Component;
use App\Domains\Cart\Projections\Cart;
use App\Domains\Cart\Actions\CheckoutCartAction;
use Livewire\Attributes\Session;
use Livewire\Attributes\Computed;

new class extends Component {
    public bool $isOpen = false;

    #[Session(key: 'cart')]
    public Cart $cart;

    #[On("show-cart")]
    public function showCart(): void
    {
        $this->isOpen = true;
    }

    #[On("refresh-cart")]
    public function refreshCart(): void
    {
        $this->cart->refresh();
    }

    #[Computed]
    public function totalCartPrice(): int
    {
        return $this->cart->items->sum(
            fn ($item) => $item->item->price * $item->quantity
        );
    }

    public function checkout(CheckoutCartAction $action): void
    {
        $action();

        Flux::toast(
            position: 'top right',
            variant: 'success',
            text: __('pages/cart.modal.checkout_success'),
        );
    }
}; ?>

<flux:modal :name="'cart-modal'" variant="flyout" class="w-[500px] flex flex-col h-full" wire:model.self="isOpen">
    <div class="flex-grow overflow-auto">
        <flux:heading size="lg" class="mb-4">{{ __("pages/cart.modal.title") }}</flux:heading>
        <flux:separator />
        <livewire:cart.cart-items :cart="$cart" :key="'cart-items-' . $this->totalCartPrice" />
    </div>

    <div class="mt-auto">
        <flux:separator />
        <div class="flex justify-between my-4">
            <div class="flex flex-col gap-1 w-2/3">
                <flux:text>{{ __("pages/cart.modal.subtotal") }}</flux:text>
                <flux:text>{{ __("pages/cart.modal.shipping") }}</flux:text>
            </div>
            <flux:text size="xl">{{ number_format($this->totalCartPrice / 100, 2, ',', ' ') }}€</flux:text>
        </div>

        <flux:button
            icon="arrow-right"
            class="w-full h-10 mb-4 hover:cursor-pointer"
            wire:click="checkout"
        >
            {{ __("pages/cart.modal.checkout") }}
        </flux:button>

        <a href="#" class="text-center hover:underline">
            <flux:text>{{ __("pages/cart.modal.continue_shopping") }}</flux:text>
        </a>
    </div>
</flux:modal>
