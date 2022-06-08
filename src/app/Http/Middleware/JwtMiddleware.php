<?php

namespace App\Http\Middleware;

use App\Exceptions\ExpectedException;
use Closure;
use Illuminate\Http\Request;

class JwtMiddleware
{
    /**
     * @throws ExpectedException
     */
    public function handle(Request $request, Closure $next)
    {
        $jwt = $request->header('Token') ?? $request->input('Token');
        if (!$jwt) {
            throw new ExpectedException('Token is not sent', 901);
        }
        return $next($request);
    }
}
