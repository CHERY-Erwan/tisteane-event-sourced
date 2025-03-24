<?php

declare(strict_types=1);

namespace App\Domains\Cart\Events;

use App\Domains\Shared\Data\QuantityData;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

final class CartItemQuantityUpdated extends ShouldBeStored
{
    public function __construct(
        public readonly string $itemUuid,
        public readonly string $itemType,
        public readonly QuantityData $quantity,
    ) {}
}
