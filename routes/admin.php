<?php

use App\Http\Controllers\Admin\ProgramController;
use Illuminate\Support\Facades\Route;

Route::middleware(['isAdmin', 'auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard.dashboard');
        });
        Route::prefix('programs')->group(function () {
            Route::get('/',[ProgramController::class, 'createProgram']);
            Route::post('/',[ProgramController::class, 'storeProgram'])->name('admin.program.store');
            Route::prefix('{program_id}')->group(function () {
                Route::get('/',[ProgramController::class, 'getProgram'])->name('admin.program.get.single');
                Route::get('/edit',[ProgramController::class, 'editProgram'])->name('admin.program.edit.single');
                Route::put('/',[ProgramController::class, 'updateProgram'])->name('admin.program.update.single');
            });
        });
    });
});
