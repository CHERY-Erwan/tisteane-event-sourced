<?php
declare(strict_types=1);

use App\Domains\Cart\Projections\CartItem;
use App\Domains\Cart\Actions\UpdateItemQuantityAction;
use App\Domains\Cart\Actions\RemoveItemFromCartAction;
use App\Domains\Shared\Data\QuantityData;
use Livewire\Volt\Component;
use Livewire\Attributes\Computed;

new class extends Component
{
    public CartItem $item;
    public int $quantity;

    public function mount(): void
    {
        $this->quantity = $this->item->quantity;
    }

    public function removeItemFromCart(RemoveItemFromCartAction $action): void
    {
        $action(
            itemUuid: $this->item->item->uuid,
            itemType: $this->item->item->getMorphClass(),
        );

        $this->dispatch('refresh-cart');
    }

    public function updatedQuantity(UpdateItemQuantityAction $action): void
    {
        $action(
            itemUuid: $this->item->item->uuid,
            itemType: $this->item->item->getMorphClass(),
            quantity: QuantityData::from(['quantity' => max(1, $this->quantity)]),
        );

        $this->dispatch('refresh-cart');
    }

    #[Computed]
    public function totalItemPrice(): int
    {
        return $this->item->item->price * $this->quantity;
    }
}; ?>

<div>
    <div class="flex gap-3 my-6">
        <div class="w-[92px] h-[92px] flex-shrink-0 border border-neutral-200 rounded-lg bg-white flex items-center justify-center overflow-hidden shadow-lg">
            <img
                src="{{ $item->item->getMedia('color_attachment')->first()->getUrl('webp') }}"
                alt="Thumbnail of {{ $item->item->product->short_label }}"
                class="w-20 h-20 object-cover object-center"
                loading="lazy"
                decoding="async"
            >
        </div>

        <div class="flex flex-col gap-2 w-full justify-between">
            <div class="flex justify-between">
                <div>
                    <flux:heading size="lg">{{ $item->item->product->short_label }}</flux:heading>
                    <flux:text>
                        {{ $item->item->size->label }}
                        -
                        {{ $item->item->color->label }}
                    </flux:text>
                </div>
                <div>
                    <flux:text size="xl">{{ number_format($this->totalItemPrice / 100, 2, ',', '.') }}€</flux:text>
                </div>
            </div>

            <div class="flex justify-between">
                <flux:input
                    wire:model.live.debounce.500ms="quantity"
                    type="number"
                    min="1"
                    max="100"
                    class="!w-1/3"
                >
                    <flux:button size="sm" variant="subtle" class="-mr-1" />
                </flux:input>

                <flux:button
                    wire:click="removeItemFromCart"
                    size="sm"
                    variant="subtle"
                    :loading="false"
                    class="hover:underline hover:cursor-pointer"
                >
                    {{ __("pages/cart.modal.delete") }}
                </flux:button>
            </div>
        </div>
    </div>
    <flux:separator />
</div>
