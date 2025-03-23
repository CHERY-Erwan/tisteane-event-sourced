<?php

use Livewire\Attributes\On;
use Livewire\Volt\Component;
use Livewire\Attributes\Js;

new class extends Component {
    public bool $isOpen = false;

    #[On("show-cart")]
    public function showCart()
    {
        dump(request()->attributes->get('cart'));
        $this->isOpen = true;
    }
};
?>

<flux:modal :name="'cart-modal'" variant="flyout" wire:model="isOpen" class="w-[500px]">
    <flux:heading size="lg" class="my-4">
        Cart
    </flux:heading>
    <flux:separator/>
    <flux:text class="my-4">
        Cart is empty
    </flux:text>
</flux:modal>
