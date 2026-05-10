<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/search', [PageController::class, 'search'])->name('search');

Route::get('/category/{category:slug}', [PageController::class, 'categoryShow'])
    ->name('category.show');

Route::get('/{category:slug}/{article:slug}', [PageController::class, 'show'])
    ->name('article.show');
