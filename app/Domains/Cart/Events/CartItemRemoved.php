<?php

declare(strict_types=1);

namespace App\Domains\Cart\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

final class CartItemRemoved extends ShouldBeStored
{
    public function __construct(
        public string $itemUuid,
        public string $itemType,
    ) {}
}
