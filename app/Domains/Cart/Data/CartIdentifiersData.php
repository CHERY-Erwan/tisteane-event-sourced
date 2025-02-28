<?php

declare(strict_types=1);

namespace App\Domains\Cart\Data;

use Illuminate\Support\Str;
use InvalidArgumentException;
use Spatie\LaravelData\Data;

final class CartIdentifiersData extends Data
{
    public function __construct(
        public readonly ?string $customerUuid,
        public readonly string $sessionId,
    ) {
        if ($this->customerUuid !== null && ! Str::isUuid($this->customerUuid)) {
            throw new InvalidArgumentException('Customer UUID must be a valid UUID');
        }
    }

    public function isCustomer(): bool
    {
        return $this->customerUuid !== null;
    }

    public function isGuest(): bool
    {
        return $this->customerUuid === null;
    }
}
