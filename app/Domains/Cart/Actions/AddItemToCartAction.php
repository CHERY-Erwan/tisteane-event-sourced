<?php

declare(strict_types=1);

namespace App\Domains\Cart\Actions;

use App\Domains\Cart\CartAggregateRoot;
use App\Domains\Cart\Projections\Cart;
use App\Domains\Shared\Data\PriceData;
use App\Domains\Shared\Data\QuantityData;

final class AddItemToCartAction
{
    public function __invoke(Cart $cart, string $itemUuid, string $itemType, QuantityData $quantity, PriceData $currentPrice): Cart
    {
        CartAggregateRoot::retrieve(uuid: $cart->uuid)
            ->addItemToCart(
                itemUuid: $itemUuid,
                itemType: $itemType,
                quantity: $quantity,
                currentPrice: $currentPrice,
            )
            ->persist();

        return $cart->refresh();
    }
}
