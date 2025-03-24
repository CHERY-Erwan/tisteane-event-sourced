<?php

declare(strict_types=1);

namespace App\Domains\Cart\Actions;

class CheckoutCartAction
{
    public function __invoke(): void
    {
        $cart = request()->attributes->get('cart');

        dump($cart);
    }
}
