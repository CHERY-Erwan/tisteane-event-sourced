<?php

declare(strict_types=1);

namespace App\Domains\Cart\Projectors;

use App\Domains\Cart\Events\CartInitialized;
use App\Domains\Cart\Events\CartItemAdded;
use App\Domains\Cart\Projections\Cart;
use App\Domains\Cart\Projections\CartItem;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

final class CartProjector extends Projector
{
    public function onCartInitialized(CartInitialized $event): void
    {
        Cart::new()
            ->writeable()
            ->create([
                'uuid' => $event->aggregateRootUuid(),
                'customer_uuid' => $event->cartIdentifiersData->customerUuid,
                'session_id' => $event->cartIdentifiersData->sessionId,
            ]);
    }

    public function onCartItemAdded(CartItemAdded $event): void
    {
        CartItem::new()
            ->writeable()
            ->create([
                'cart_uuid' => $event->aggregateRootUuid(),
                'item_uuid' => $event->itemUuid,
                'item_type' => $event->itemType,
                'quantity' => $event->quantity->quantity,
            ]);
    }
}
