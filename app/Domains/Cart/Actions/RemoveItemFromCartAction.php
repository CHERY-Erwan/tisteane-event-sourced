<?php

declare(strict_types=1);

namespace App\Domains\Cart\Actions;

use App\Domains\Cart\CartAggregateRoot;
use App\Domains\Cart\Projections\Cart;

final class RemoveItemFromCartAction
{
    public function __invoke(string $itemUuid, string $itemType): Cart
    {
        $cart = request()->attributes->get('cart');

        CartAggregateRoot::retrieve(uuid: $cart->uuid)
            ->removeItemFromCart(
                itemUuid: $itemUuid,
                itemType: $itemType,
            )
            ->persist();

        return $cart->refresh();
    }
}
