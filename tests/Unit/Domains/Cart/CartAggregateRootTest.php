<?php

declare(strict_types=1);

use App\Domains\Cart\CartAggregateRoot;
use App\Domains\Cart\Data\CartIdentifiersData;
use App\Domains\Cart\Events\CartInitialized;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| CartAggregateRoot Tests
|--------------------------------------------------------------------------
*/
pest()->group('cart');

test('cart initialized event is recorded', function () {
    $uuid = Str::uuid()->toString();
    $cartIdentifiers = new CartIdentifiersData(
        customerUuid: null,
        sessionId: $uuid,
    );

    CartAggregateRoot::fake($uuid)
        ->when(function (CartAggregateRoot $cartAggregateRoot) use ($cartIdentifiers) {
            $cartAggregateRoot->initializeCart($cartIdentifiers);
        })
        ->assertRecorded(new CartInitialized($cartIdentifiers));
});
