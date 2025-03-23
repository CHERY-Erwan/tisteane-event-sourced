<?php

declare(strict_types=1);

use Livewire\Volt\Component;
use App\Domains\Product\Projections\Product;
use App\Domains\Product\Projections\ProductVariant;
use Illuminate\Support\Collection;
use Flux\Volt\Attributes\Js;

new class extends Component
{
    public Collection $images;
    public int $currentIndex = 0;

    public function mount(?Product $product, ?ProductVariant $variant)
    {
        $this->images = collect([
            ...$variant->getMedia('color_attachment'),
            ...$product->getMedia(sprintf("size_%s_attachment", strtolower($variant->size->code))),
        ]);
    }
}; ?>

<div
    x-data="{
        currentIndex: @entangle('currentIndex'),
    }"
    class="relative flex-col gap-1"
>
    <div class="overflow-hidden relative aspect-square bg-neutral-200 rounded-xl shadow-lg mb-4 w-[380px] h-[380px]">
        @foreach ($images as $index => $media)
            <img
                src="{{ $media->getUrl('webp') }}"
                alt="{{ $media->file_alt }}"
                class="absolute inset-0 w-full h-full object-contain transition-opacity duration-300"
                :style="{ opacity: currentIndex === {{ $index }} ? '1' : '0' }"
                loading="lazy"
                decoding="async"
            >
        @endforeach
    </div>

    <div class="relative">
        <div class="flex space-x-2 overflow-x-auto scroll-smooth hide-scrollbar">
            @foreach ($images as $index => $media)
                <button
                    type="button"
                    class="flex-shrink-0 w-20 h-20 border-2 rounded-lg overflow-hidden relative"
                    :class="{ 'border-neutral-950': currentIndex === {{ $index }}, 'border-neutral-950 hover:border-neutral-200': currentIndex !== {{ $index }} }"
                    @mouseenter="currentIndex = {{ $index }}"
                >
                    <img
                        src="{{ $media->getUrl('thumb') }}"
                        alt="{{ $media->name }}"
                        class="w-full h-full object-cover"
                        loading="lazy"
                        decoding="async"
                    >
                </button>
            @endforeach
        </div>
    </div>
</div>
