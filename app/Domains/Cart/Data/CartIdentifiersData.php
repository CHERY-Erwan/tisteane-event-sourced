<?php

declare(strict_types=1);

namespace App\Domains\Cart\Data;

use Ramsey\Uuid\Uuid;
use Spatie\LaravelData\Data;

final class CartIdentifiersData extends Data
{
    public function __construct(
        public readonly ?Uuid $customerUuid,
        public readonly string $sessionId,
    ) {}

    public function isCustomer(): bool
    {
        return $this->customerUuid !== null;
    }

    public function isGuest(): bool
    {
        return $this->customerUuid === null;
    }
}
