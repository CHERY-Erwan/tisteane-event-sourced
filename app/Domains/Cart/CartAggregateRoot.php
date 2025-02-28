<?php

declare(strict_types=1);

namespace App\Domains\Cart;

use App\Domains\Cart\Data\CartIdentifiersData;
use App\Domains\Cart\Events\CartInitialized;
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
}
