<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    return '<p>Hi!
                In case you want to continue working on the project
                feel free to reach me out on maric989@gmail.com
            </p>';
});


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
