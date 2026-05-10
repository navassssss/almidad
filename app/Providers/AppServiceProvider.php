<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useTailwind();

        $clearCache = function () {
            \Illuminate\Support\Facades\Artisan::call('cache:static-clear');
        };

        $models = [
            \App\Models\Article::class,
            \App\Models\News::class,
            \App\Models\Category::class,
            \App\Models\Author::class,
            \App\Models\Ad::class,
            \App\Models\Edition::class,
        ];

        foreach ($models as $model) {
            $model::saved($clearCache);
            $model::deleted($clearCache);
        }
    }
}
