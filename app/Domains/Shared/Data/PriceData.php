<?php

declare(strict_types=1);

namespace App\Domains\Shared\Data;

use Spatie\LaravelData\Data;
use Symfony\Component\Routing\Exception\InvalidParameterException;

final class PriceData extends Data
{
    public function __construct(
        public readonly int $amount,
    ) {
        if ($this->amount < 0) {
            throw new InvalidParameterException('Price must be above or equal to 0');
        }
    }

    public static function fromInt(int $amount): self
    {
        return new self($amount);
    }

    public function toInt(): int
    {
        return $this->amount;
    }
}
