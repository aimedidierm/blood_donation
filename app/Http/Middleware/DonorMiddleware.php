<?php

namespace App\Http\Middleware;

use App\Enums\UserType;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DonorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->type == UserType::DONOR->value) {
            return $next($request);
        }

        return response()->json([
            'success' => false,
            'message' => 'This action is restricted to donors only.'
        ], Response::HTTP_UNAUTHORIZED);
    }
}
