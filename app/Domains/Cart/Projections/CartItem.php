<?php

declare(strict_types=1);

namespace App\Domains\Cart\Projections;

use App\Domains\Bundle\Projections\Bundle;
use App\Domains\Product\Projections\ProductVariant;
use App\Domains\Shared\Data\QuantityData;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\EventSourcing\Projections\Projection;

/**
 * @property string $cart_uuid
 * @property string $item_uuid
 * @property string $item_type
 * @property QuantityData $quantity
 * @property-read Cart $cart
 * @property-read ProductVariant|Bundle|null $item
 */
final class CartItem extends Projection
{
    protected $fillable = ['cart_uuid', 'item_uuid', 'item_type', 'quantity'];

    protected $casts = [
        'quantity' => 'integer',
    ];

    protected $with = ['item'];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class, 'cart_uuid', 'uuid');
    }

    public function item(): MorphTo
    {
        return $this->morphTo('item', 'item_type', 'item_uuid');
    }
}
