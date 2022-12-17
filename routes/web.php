<?php

use App\Http\Controllers\SegmentController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return Inertia::render('Index');
    })->name('index');

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('/segment', SegmentController::class);
    
    Route::get('/segment-wise-subscriber/{segment_id}', [SegmentController::class, 'segmentWiseSubscriber']);
});
