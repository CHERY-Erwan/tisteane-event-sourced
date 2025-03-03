<?php

declare(strict_types=1);

namespace App\Serializers;

use Spatie\EventSourcing\EventSerializers\JsonEventSerializer;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

final class DataEventSerializer extends JsonEventSerializer
{
    public function serialize(ShouldBeStored $event): string
    {
        if ($event instanceof ShouldBeStored) {
            return json_encode($event);
        }

        return parent::serialize($event);
    }

    public function deserialize(string $eventClass, string $json, int $version, ?string $metadata = null): ShouldBeStored
    {
        return parent::deserialize($eventClass, $json, $version, $metadata);
    }
}
