<?php

declare(strict_types=1);

namespace App\Domains\Cart\Projections;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Spatie\EventSourcing\Projections\Projection;

/**
 * @property string $uuid
 * @property string $customer_uuid
 * @property string $session_id
 */
final class Cart extends Projection
{
    use HasUuids;

    protected $primaryKey = 'uuid';

    protected $fillable = ['uuid', 'customer_uuid', 'session_id'];

    protected $casts = [
        'session_id' => 'string',
    ];
}
