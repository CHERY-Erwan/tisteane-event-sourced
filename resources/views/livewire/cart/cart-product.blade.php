<?php

declare(strict_types=1);

use App\Domains\Cart\Projections\CartItem;
use App\Domains\Cart\Actions\UpdateItemQuantityAction;
use App\Domains\Cart\Actions\RemoveItemFromCartAction;
use App\Domains\Shared\Data\QuantityData;
use Livewire\Volt\Component;
use Livewire\Attributes\On;

new class extends Component
{
    public CartItem $item;

    public int $quantity;

    public function mount(CartItem $item)
    {
        $this->item = $item;
        $this->quantity = $item->quantity;
    }

    public function updateItemQuantity(int $quantity, UpdateItemQuantityAction $action)
    {
        $this->quantity = max(1, $quantity);

        $action(
            itemUuid: $this->item->item->uuid,
            itemType: $this->item->item->getMorphClass(),
            quantity: QuantityData::from(['quantity' => $this->quantity]),
        );

        $this->dispatch('refresh-cart');
    }

    public function removeItemFromCart(RemoveItemFromCartAction $action)
    {
        $action(
            itemUuid: $this->item->item->uuid,
            itemType: $this->item->item->getMorphClass(),
        );

        $this->dispatch('refresh-cart');
    }

    public function getTotalPrice(): string
    {
        return number_format($this->item->item->price / 100 * $this->quantity, 2, ',', '.');
    }
}; ?>

<div>
    <div class="flex gap-3 my-6">
        <div class="w-[92px] h-[92px] flex-shrink-0 border border-neutral-200 rounded-lg bg-white flex items-center justify-center overflow-hidden shadow-lg">
            <img src="{{ $item?->item?->getMedia('color_attachment')->first()->getUrl('webp') }}"
                alt="Thumbnail of {{ $item?->item?->product?->short_label }}"
                class="w-20 h-20 object-cover object-center"
                loading="lazy"
                decoding="async"
            >
        </div>

        <div class="flex flex-col gap-2 w-full justify-between">
            <div class="flex justify-between">
                <div>
                    <flux:heading size="lg">{{ $item?->item?->product?->short_label }}</flux:heading>
                    <flux:text>
                        {{ $item?->item?->size?->label }}
                        -
                        {{ $item?->item?->color?->label }}
                    </flux:text>
                </div>
                <div>
                    <flux:text size="xl">{{ $this->getTotalPrice() }}€</flux:text>
                </div>
            </div>

            <div class="flex justify-between">
                <flux:button class="w-1/3 h-10 !flex !flex-row !justify-around !items-center">
                    <flux:icon name="minus" class="w-4 h-4 hover:cursor-pointer" wire:click="updateItemQuantity({{ $quantity - 1 }})" />
                    {{ $quantity }}
                    <flux:icon name="plus" class="w-4 h-4 hover:cursor-pointer" wire:click="updateItemQuantity({{ $quantity + 1 }})" />
                </flux:button>
                <flux:button wire:click="removeItemFromCart" size="sm" variant="subtle" :loading="false" class="hover:underline hover:cursor-pointer">
                    {{ __("pages/cart.modal.delete") }}
                </flux:button>
            </div>
        </div>
    </div>
    <flux:separator />
</div>
