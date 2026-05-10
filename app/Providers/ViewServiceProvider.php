<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Edition;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('components.layouts.nav', function ($view) {
            $categories = Category::withCount('articles')
                ->orderBy('articles_count', 'desc')
                ->get()
                ->filter(function ($category) {
                    return $category->articles_count > 0;
                })
                ->values(); // resets the index keys


            $view->with([
                'mainCategories' => $categories->take(4),
                'moreCategories' => $categories->slice(4),
            ]);
        });
        View::composer('welcome', function ($view) {
            $editions = Edition::all();
            $view->with([
                'editions' => $editions,
            ]);
        });
    }
}
