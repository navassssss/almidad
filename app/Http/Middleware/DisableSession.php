<?php
namespace App\Http\Middleware;

use Closure;

class DisableSession
{
    public function handle($request, Closure $next)
    {
        if ($request->is('/') ||
            $request->is('category/*') ||
            $request->is('*/*')) {

            config(['session.driver' => 'array']);
        }

        return $next($request);
    }
}
