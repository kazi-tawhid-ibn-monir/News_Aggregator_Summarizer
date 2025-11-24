<?php

use App\Http\Controllers\HomeController;

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
