<?php

declare(strict_types=1);

use App\Domains\Cart\Data\CartIdentifiersData;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| CartIdentifiersData Tests
|--------------------------------------------------------------------------
*/
pest()->group('cart');

test('cart identifiers can be created for a customer', function () {
    // Arrange
    $uuid = Str::uuid()->toString();
    $sessionId = 'session123';

    // Act
    $cartIdentifiers = new CartIdentifiersData(
        customerUuid: $uuid,
        sessionId: $sessionId,
    );

    // Assert
    expect($cartIdentifiers->customerUuid)->toBe($uuid)
        ->and($cartIdentifiers->sessionId)->toBe($sessionId)
        ->and($cartIdentifiers->isCustomer())->toBeTrue()
        ->and($cartIdentifiers->isGuest())->toBeFalse();
});

test('cart identifiers can be created for a guest', function () {
    // Arrange
    $sessionId = 'session123';

    // Act
    $cartIdentifiers = new CartIdentifiersData(
        customerUuid: null,
        sessionId: $sessionId,
    );

    // Assert
    expect($cartIdentifiers->customerUuid)->toBeNull()
        ->and($cartIdentifiers->sessionId)->toBe($sessionId)
        ->and($cartIdentifiers->isCustomer())->toBeFalse()
        ->and($cartIdentifiers->isGuest())->toBeTrue();
});

test('cart identifiers cannot be created with an invalid customer UUID', function () {
    // Arrange
    $uuid = 'invalid-uuid';

    // Act & Assert
    expect(fn () => new CartIdentifiersData(
        customerUuid: $uuid,
        sessionId: 'session123',
    ))->toThrow(InvalidArgumentException::class);
});
