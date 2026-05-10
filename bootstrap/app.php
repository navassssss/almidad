<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        then: function () {
            Route::middleware(['web', 'public'])
                ->group(base_path('routes/public.php'));
        },
    )

    ->withMiddleware(function (Middleware $middleware) {
        $middleware->group('public', [
            \App\Http\Middleware\StaticPageCache::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })

    ->create();