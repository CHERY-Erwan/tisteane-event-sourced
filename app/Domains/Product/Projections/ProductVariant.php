<?php

declare(strict_types=1);

namespace App\Domains\Product\Projections;

use App\Domains\Shared\Data\PriceData;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\EventSourcing\Projections\Projection;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

/**
 * @property string $uuid
 * @property string $product_uuid
 * @property string $sku
 * @property string $slug
 * @property PriceData $price
 * @property bool $is_active
 * @property-read Product $product
 * @property-read Size $size
 * @property-read Color $color
 * @property-read Collection<ProductAttribute> $attributes
 */
final class ProductVariant extends Projection implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use HasUuids;
    use InteractsWithMedia;

    public $appends = ['color_attachment'];

    protected $primaryKey = 'uuid';

    protected $fillable = ['uuid', 'product_uuid', 'sku', 'slug', 'size_id', 'color_id', 'price', 'is_active'];

    /**
     * Get the product of the variant.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_uuid', 'uuid');
    }

    /**
     * Get the size of the variant.
     */
    public function size(): HasOne
    {
        return $this->hasOne(Size::class, 'id', 'size_id');
    }

    /**
     * Get the color of the variant.
     */
    public function color(): HasOne
    {
        return $this->hasOne(Color::class, 'id', 'color_id');
    }

    /**
     * Get the attributes of the variant.
     */
    public function attributes(): HasMany
    {
        return $this->hasMany(ProductAttribute::class, 'product_variant_uuid');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->performOnCollections('color_attachment')
            ->nonQueued();

        $this->addMediaConversion('thumb')
            ->format('webp')
            ->performOnCollections('color_attachment')
            ->nonQueued();
    }

    public function scopeIsActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    protected function colorAttachment(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->getFirstMediaUrl('color_attachment', 'webp')
        );
    }
}
