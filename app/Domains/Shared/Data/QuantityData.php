<?php

declare(strict_types=1);

namespace App\Domains\Shared\Data;

use InvalidArgumentException;
use Spatie\LaravelData\Data;

final class QuantityData extends Data
{
    public function __construct(
        public readonly int $quantity,
    ) {
        if ($this->quantity <= 0) {
            throw new InvalidArgumentException('Quantity must be greater than 0');
        }
    }
}
