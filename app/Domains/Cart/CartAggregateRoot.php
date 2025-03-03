<?php

declare(strict_types=1);

namespace App\Domains\Cart;

use App\Domains\Cart\Data\CartIdentifiersData;
use App\Domains\Cart\Events\CartInitialized;
use App\Domains\Cart\Events\CartItemAdded;
use App\Domains\Shared\Data\PriceData;
use App\Domains\Shared\Data\QuantityData;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

final class CartAggregateRoot extends AggregateRoot
{
    /**
     * Initialize a cart for a connected client or a guest (session).
     */
    public function initializeCart(CartIdentifiersData $cartIdentifiersData): self
    {
        $this->recordThat(new CartInitialized(
            cartIdentifiersData: $cartIdentifiersData,
        ));

        return $this;
    }

    /**
     * Add an item (product or bundle) to the cart.
     */
    public function addItemToCart(string $itemUuid, string $itemType, QuantityData $quantity, PriceData $currentPrice): self
    {
        $this->recordThat(new CartItemAdded(
            itemUuid: $itemUuid,
            itemType: $itemType,
            quantity: $quantity,
            currentPrice: $currentPrice,
        ));

        return $this;
    }
}
