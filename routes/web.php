<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('/subscribe', [\App\Http\Controllers\SubscriberController::class, 'index']);
Route::post('/subscribe', [\App\Http\Controllers\SubscriberController::class, 'store'])->middleware(\Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests::class);
