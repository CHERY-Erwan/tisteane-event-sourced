<?php

declare(strict_types=1);

use App\Domains\Product\Projections\Product;
use Livewire\Volt\Component;
use Illuminate\Support\Collection;

new class extends Component
{
    public Collection $products;

    public function mount(): void
    {
        $this->products = Product::query()
            ->isActive()
            ->isFeatured()
            ->get();
    }
}; ?>

<div class="w-full flex flex-col gap-5 lg:flex-row">
    @foreach ($this->products as $product)
        <x-products.product-card :product="$product" />
    @endforeach
</div>
