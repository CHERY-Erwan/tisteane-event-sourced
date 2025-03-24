<?php

declare(strict_types=1);

use App\Domains\Product\Projections\Product;
use App\Domains\Product\Projections\ProductVariant;
use Livewire\Volt\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Collection;
use App\Domains\Cart\Actions\AddItemToCartAction;
use App\Domains\Shared\Data\QuantityData;
use App\Domains\Shared\Data\PriceData;
use Flux\Flux;

new class extends Component
{
    public Product $product;
    public ProductVariant $variant;
    public Collection $sizes;
    public Collection $colors;
    public int $quantity = 1;
    public bool $isOpen = false;

    public function mount(): void
    {
        $this->sizes = collect([]);
        $this->colors = collect([]);
    }

    #[On('show-product')]
    public function showProduct(string $uuid): void
    {
        $this->product = Product::query()
            ->with(['variants.size', 'variants.color'])
            ->findOrFail($uuid);

        $this->variant = $this->product->variants->first();
        $this->quantity = 1;

        $this->sizes = $this->product->variants->pluck('size')->unique();
        $this->colors = $this->product->variants->where('size.code', $this->variant->size->code)->pluck('color')->unique();

        $this->isOpen = true;
    }

    public function updateSize(string $size): void
    {
        $this->variant = $this->product->variants->where('size.code', $size)->first();
        $this->colors = $this->product->variants->where('size.code', $this->variant->size->code)->pluck('color')->unique();
    }

    public function updateColor(string $color): void
    {
        $this->variant = $this->product->variants->where('color.code', $color)->first();
    }

    public function addToCart(AddItemToCartAction $action): void
    {
        $action(
            itemUuid: $this->variant->uuid,
            itemType: 'product_variant',
            quantity: QuantityData::from(['quantity' => $this->quantity]),
            currentPrice: PriceData::from(['amount' => $this->variant->price])
        );

        $this->dispatch('refresh-cart');

        Flux::toast(
            position: 'top right',
            variant: 'success',
            text: __('pages/product.modal.product_added_to_cart'),
        );
    }
}; ?>

<flux:modal :name="'product-details-' . $product?->uuid" class="w-full max-w-[1200px]" wire:model="isOpen">
    <flux:heading size="lg">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="#" @click="$wire.isOpen = false">
                <flux:icon name="home" class="w-4 h-4" />
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#" @click="$wire.isOpen = false">
                {{ __("pages/product.modal.breadcrumbs.products") }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                {{ $product?->label }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </flux:heading>

    <div class="pt-6 flex flex-row gap-8">
        @if ($product && $variant)
            <livewire:products.product-slider
                :product="$product"
                :variant="$variant"
            />
        @endif

        <section class="w-full flex flex-col gap-4">
            <flux:heading size="xl" level="2" class="opacity-80 flex justify-between">
                {{ $product?->label }}
                <flux:badge
                    :color="$product?->stock > 0 ? 'lime' : 'rose'"
                    variant="solid"
                    inset="top bottom"
                    class="opacity-80 h-10"
                >
                    {{ $product?->stock > 0 ? __("pages/product.modal.in_stock") : __("pages/product.modal.out_of_stock") }}
                </flux:badge>
            </flux:heading>

            <flux:text class="!text-xl">{{ number_format($variant?->price / 100, 2, ',', '.') }} €</flux:text>

            <div x-data="{ expanded: false }" class="relative">
                <div
                    class="text-base transition-all duration-300"
                    :class="expanded ? 'max-h-[1000px]' : 'overflow-hidden max-h-[6.5rem]'"
                    :style="expanded ? {} : { '-webkit-box-orient': 'vertical', 'display': '-webkit-box', '-webkit-line-clamp': '4' }"
                >
                    <flux:text>{!! $product?->description !!}</flux:text>
                </div>

                <flux:button
                    @click="expanded = !expanded"
                    variant="ghost"
                    size="sm"
                    color="neutral"
                    class="mt-2"
                >
                    <span x-text="expanded ? '{{ __("pages/product.modal.show_less") }}' : '{{ __("pages/product.modal.show_more") }}'"></span>
                    <flux:icon
                        name="chevron-down"
                        class="w-4 h-4 transition-transform duration-200"
                        x-bind:class="expanded ? 'rotate-180' : ''"
                    />
                </flux:button>
            </div>

            <div class="flex flex-col gap-2">
                <div class="text-base flex gap-2 items-center justify-start">
                    <flux:text>{{ __("pages/product.modal.size") }}</flux:text>
                    <flux:text class="font-bold">{{ $variant?->size?->label }}</flux:text>
                </div>
                <div class="flex gap-2 flex-wrap">
                    @foreach ($sizes as $size)
                        <flux:button
                            wire:click="updateSize('{{ $size->code }}')"
                            :loading="false"
                            class="hover:cursor-pointer h-12"
                        >
                            <div class="flex items-center justify-center w-full gap-2">
                                <flux:icon
                                    name="{{ $variant?->size?->code === $size->code ? 'plus-circle' : 'plus' }}"
                                    class="w-3"
                                />
                                {{ $size->label }}
                            </div>
                        </flux:button>
                    @endforeach
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <div class="text-base flex gap-2 items-center justify-start">
                    <flux:text>{{ __("pages/product.modal.color") }}</flux:text>
                    <flux:text class="font-bold">{{ $variant?->color?->label }}</flux:text>
                </div>
                <div class="flex gap-2 flex-wrap">
                    @foreach ($colors as $color)
                        <flux:button
                            wire:click="updateColor('{{ $color->code }}')"
                            :loading="false"
                            style="background-color: {{ $color->hex_code }};"
                            class="flex !border {{ $variant?->color?->code == $color->code ? '!border-neutral-200' : '!border-neutral-950' }} w-8 h-8 hover:cursor-pointer"
                        >
                        </flux:button>
                    @endforeach
                </div>
            </div>

            <flux:button class="w-1/4 h-12 !flex !flex-row !justify-around !items-center">
                <flux:icon
                    name="minus"
                    class="w-4 h-4 hover:cursor-pointer"
                    wire:click="$set('quantity', {{ max($quantity - 1, 1) }})"
                />
                {{ $quantity }}
                <flux:icon
                    name="plus"
                    class="w-4 h-4 hover:cursor-pointer"
                    wire:click="$set('quantity', {{ min($quantity + 1, 99) }})"
                />
            </flux:button>

            <div class="flex flex-row gap-2">
                <flux:button class="w-1/2 hover:cursor-pointer h-12" wire:click="addToCart">
                    {{ __("pages/product.modal.add_to_cart") }}
                </flux:button>

                <livewire:cart.cart-indicator/>
            </div>
        </section>
    </div>

    <div class="mt-6 grid gap-4 md:grid-cols-2 md:grid-rows-2 xl:grid-cols-4 xl:grid-rows-1">
        @foreach ([
            ['icon' => 'france', 'title' => __("pages/product.modal.incentives.assembled"), 'text' => __("pages/product.modal.incentives.assembled_text")],
            ['icon' => 'shield', 'title' => __("pages/product.modal.incentives.warranty"), 'text' => __("pages/product.modal.incentives.warranty_text")],
            ['icon' => 'returns', 'title' => __("pages/product.modal.incentives.returns_policy"), 'text' => __("pages/product.modal.incentives.returns_text")],
            ['icon' => 'truck', 'title' => __("pages/product.modal.incentives.shipping"), 'text' => __("pages/product.modal.incentives.shipping_text")]
        ] as $incentive)
            <flux:card class="shadow-md">
                <div class="flex gap-4 items-start">
                    <flux:icon name="{{ $incentive['icon'] }}" class="shrink-0 w-8 h-8 text-white"/>
                    <div class="flex flex-col gap-2">
                        <flux:heading size="xl" level="3">{{ $incentive['title'] }}</flux:heading>
                        <flux:text>{{ $incentive['text'] }}</flux:text>
                    </div>
                </div>
            </flux:card>
        @endforeach
    </div>
</flux:modal>
