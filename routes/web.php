<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/dev1', function () {

    Artisan::call('optimize:clear');

    Artisan::call('cache:clear');
    Artisan::call('storage:link');


    return "sv";
});




Route::get('/articles', [PageController::class, 'index']);
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/editor-note', function () {
    return view('editor-note');
})->name('editor_note');
Route::get('/contact-us', function () {
    return view('contact');
})->name('contact');

Route::get('/pdf-view', function () {
    return view('pdf');
})->name('pdf');

Route::get('/subscribe', function () {
    return view('subscribe');
})->name('subscribe');

Route::get('/search', [PageController::class, 'search'])->name('search');
