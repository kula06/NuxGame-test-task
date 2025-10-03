<?php

namespace App\Http\Middleware;

use App\Models\AccessLink;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AccessLinkAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->route('token');

        $accessLink = AccessLink::query()->active()->withToken($token)->firstOrFail();

        Auth::login($accessLink->user);

        return $next($request);
    }
}
