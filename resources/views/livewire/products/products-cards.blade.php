<?php

use App\Domains\Product\Projections\Product;
use Livewire\Volt\Component;
use App\Enums\CategoryEnum;

new class extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::query()
            ->isActive()
            ->isFeatured()
            ->get();
    }
};
?>

<div class="w-full flex flex-col gap-5 lg:flex-row">
    @foreach ($this->products as $product)
        <x-products.product-card :product="$product" />
    @endforeach
</div>
