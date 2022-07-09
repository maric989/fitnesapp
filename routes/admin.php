<?php

use App\Http\Controllers\Admin\CoachController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['isAdmin', 'auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard.dashboard');
        });
        Route::prefix('programs')->group(function () {
            Route::get('/',[ProgramController::class, 'createProgram'])->name('admin.program.store.get');
            Route::post('/',[ProgramController::class, 'storeProgram'])->name('admin.program.store');
            Route::get('/paginate',[ProgramController::class, 'paginatePrograms'])->name('admin.program.paginate');
            Route::prefix('{program_id}')->group(function () {
                Route::get('/',[ProgramController::class, 'getProgram'])->name('admin.program.get.single');
                Route::get('/edit',[ProgramController::class, 'editProgram'])->name('admin.program.edit.single');
                Route::post('/',[ProgramController::class, 'updateProgram'])->name('admin.program.update.single');
            });
        });

        Route::prefix('lessons')->group(function () {
            Route::get('/', [LessonController::class, 'createLesson'])->name('admin.lesson.create');
            Route::post('/', [LessonController::class, 'storeLesson'])->name('admin.lesson.store');
            Route::get('/paginate', [LessonController::class, 'paginateLessons'])->name('admin.lesson.paginate');
            Route::prefix('{lesson_id}')->group(function () {
                Route::get('/edit', [LessonController::class, 'editLesson'])->name('admin.lesson.edit');
                Route::put('/', [LessonController::class, 'updateLesson'])->name('admin.lesson.update');
            });
        });

        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'paginateUsers'])->name('admin.users.paginate');
        });

        Route::prefix('coaches')->group(function () {
            Route::get('/paginate', [CoachController::class, 'paginateCoaches'])->name('admin.coach.paginate');
            Route::get('/', [CoachController::class, 'createCoach'])->name('admin.coach.create');
            Route::post('/', [CoachController::class, 'storeCoach'])->name('admin.coach.store');
            Route::prefix('{coach_id}')->group(function () {
                Route::get('/', [CoachController::class, 'getCoach'])->name('admin.coach.single');
                Route::get('/edit', [CoachController::class, 'editCoach'])->name('admin.coach.edit');
                Route::post('/update', [CoachController::class, 'updateCoach'])->name('admin.coach.update');
            });
        });
    });
});
