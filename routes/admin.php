<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['isAdmin', 'auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard.dashboard');
        });
    });
});
