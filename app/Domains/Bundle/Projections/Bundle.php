<?php

namespace App\Domains\Bundle\Projections;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EventSourcing\Projections\Projection;
use Spatie\Translatable\HasTranslations;

/**
 * @property string $uuid
 * @property string $slug
 * @property string $label
 * @property string $description
 * @property float $price
 * @property bool $is_active
 * @property Collection<BundleItem> $items
 */
final class Bundle extends Projection
{
    use HasTranslations;
    use HasUuids;
    use SoftDeletes;

    protected $primaryKey = 'uuid';

    protected $fillable = ['uuid', 'slug', 'label', 'description', 'price', 'is_active'];

    public $translatable = ['label', 'description'];

    public function items()
    {
        return $this->hasMany(BundleItem::class, 'bundle_uuid', 'uuid');
    }
}
