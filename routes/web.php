<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalNewsController;
Route::get('/local-news', [LocalNewsController::class, 'index'])->name('local-news');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/local-news', function () {
    return view('pages.local-news');
})->name('local-news');

Route::get('/international-news', function () {
    return view('pages.international-news');
})->name('international-news');

Route::get('/summarizer', function () {
    return view('pages.summarizer');
})->name('summarizer');

Route::get('/news-submission', function () {
    return view('pages.news-submission');
})->name('news-submission');

Route::get('/news/{id}', [HomeController::class, 'show'])->name('news.show');

use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/news/{id}', [HomeController::class, 'show'])->name('news.show');

// Local News
Route::get('/local-news', function () {
    $localNews = \App\Models\News::where('category', 'Local')
                    ->orWhere('category', 'Bangladesh')
                    ->latest('published_at')
                    ->get();
    return view('pages.local-news', compact('localNews'));
})->name('local-news');
// International News
Route::get('/international-news', function () {
    $internationalNews = \App\Models\News::where('category', 'International')
                            ->orWhere('category', 'World')
                            ->latest('published_at')
                            ->get();
    return view('pages.international-news', compact('internationalNews'));
})->name('international-news');


