<?php

namespace App\Domains\Bundle\Projections;

use App\Domains\Product\Projections\ProductVariant;
use App\Domains\Shared\Data\QuantityData;
use Spatie\EventSourcing\Projections\Projection;

/**
 * @property string $bundle_uuid
 * @property string $item_uuid
 * @property string $item_type
 * @property QuantityData $quantity
 * @property-read Bundle $bundle
 * @property-read ProductVariant|null $product_variant
 */
final class BundleItem extends Projection
{
    protected $fillable = ['bundle_uuid', 'item_uuid', 'item_type', 'quantity'];

    public function bundle()
    {
        return $this->belongsTo(Bundle::class, 'bundle_uuid', 'uuid');
    }

    public function product_variant()
    {
        return $this->belongsTo(ProductVariant::class, 'item_uuid', 'uuid')->where('item_type', 'product_variant');
    }
}
