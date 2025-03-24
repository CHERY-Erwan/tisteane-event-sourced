<?php

declare(strict_types=1);

namespace App\Domains\Cart\Actions;

use App\Domains\Cart\CartAggregateRoot;
use App\Domains\Cart\Projections\Cart;
use App\Domains\Shared\Data\QuantityData as DataQuantityData;

final class UpdateItemQuantityAction
{
    public function __invoke(string $itemUuid, string $itemType, DataQuantityData $quantity): Cart
    {
        $cart = request()->attributes->get('cart');

        CartAggregateRoot::retrieve(uuid: $cart->uuid)
            ->updateItemQuantity(
                itemUuid: $itemUuid,
                itemType: $itemType,
                quantity: $quantity,
            )
            ->persist();

        return $cart->refresh();
    }
}
