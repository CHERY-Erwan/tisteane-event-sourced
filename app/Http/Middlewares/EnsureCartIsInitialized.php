<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Domains\Cart\Actions\InitializeCartAction;
use App\Domains\Cart\Data\CartIdentifiersData;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

final class EnsureCartIsInitialized
{
    public function handle(Request $request, Closure $next): Response
    {
        $cart = (new InitializeCartAction)(CartIdentifiersData::from([
            'customerUuid' => Auth::id(),
            'sessionId' => $request->session()->getId(),
        ]));

        $request->attributes->set('cart', $cart);

        return $next($request);
    }
}
