<?php

declare(strict_types=1);

use Livewire\Volt\Component;
use Livewire\Attributes\Computed;

new class extends Component
{
    #[Computed]
    public function incentives(): array
    {
        return [
            [
                'icon' => 'france',
                'title' => __("pages/product.modal.incentives.assembled"),
                'text' => __("pages/product.modal.incentives.assembled_text")
            ],
            [
                'icon' => 'shield',
                'title' => __("pages/product.modal.incentives.warranty"),
                'text' => __("pages/product.modal.incentives.warranty_text")
            ],
            [
                'icon' => 'returns',
                'title' => __("pages/product.modal.incentives.returns_policy"),
                'text' => __("pages/product.modal.incentives.returns_text")
            ],
            [
                'icon' => 'truck',
                'title' => __("pages/product.modal.incentives.shipping"),
                'text' => __("pages/product.modal.incentives.shipping_text")
            ]
        ];
    }
}; ?>

<div class="mt-6 grid gap-4 md:grid-cols-2 md:grid-rows-2 xl:grid-cols-4 xl:grid-rows-1">
    @foreach ($this->incentives() as $incentive)
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
