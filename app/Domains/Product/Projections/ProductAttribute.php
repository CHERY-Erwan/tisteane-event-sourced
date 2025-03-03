<?php

declare(strict_types=1);

namespace App\Domains\Product\Projections;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\EventSourcing\Projections\Projection;

/**
 * @property string $product_variant_uuid
 * @property string $key
 * @property string $value
 */
final class ProductAttribute extends Projection
{
    use HasFactory;

    protected $fillable = ['product_variant_uuid', 'key', 'value'];
}
