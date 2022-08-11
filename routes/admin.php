<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CoachController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FilterController;
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
                Route::get('/add-lesson', [ProgramController::class, 'addLesson'])->name('admin.program.add-lesson.get');
                Route::post('/add-lesson', [ProgramController::class, 'storeLesson'])->name('admin.program.add-lesson.store');
            });
        });

        Route::prefix('lessons')->group(function () {
            Route::get('/', [LessonController::class, 'createLesson'])->name('admin.lesson.create');
            Route::post('/', [LessonController::class, 'storeLesson'])->name('admin.lesson.store');
            Route::get('/paginate', [LessonController::class, 'paginateLessons'])->name('admin.lessons.paginate');
            Route::prefix('{lesson_id}')->group(function () {
                Route::get('/', [LessonController::class, 'showLesson'])->name('admin.lesson.show');
                Route::get('/edit', [LessonController::class, 'editLesson'])->name('admin.lesson.edit');
                Route::post('/', [LessonController::class, 'updateLesson'])->name('admin.lesson.update');
            });
        });

        Route::prefix('users')->group(function () {
            Route::get('/paginate', [UserController::class, 'paginateUsers'])->name('admin.users.paginate');
            Route::prefix('{user_id}')->group(function () {
                Route::get('/', [UserController::class, 'getUser'])->name('admin.user.single');
                Route::get('/edit', [UserController::class, 'editUser'])->name('admin.user.edit');
                Route::post('/update', [UserController::class, 'updateUser'])->name('admin.user.update');
            });
        });

        Route::prefix('coaches')->group(function () {
            Route::get('/paginate', [CoachController::class, 'paginateCoaches'])->name('admin.coach.paginate');
            Route::get('/', [CoachController::class, 'createCoach'])->name('admin.coach.create');
            Route::post('/', [CoachController::class, 'storeCoach'])->name('admin.coach.store');
            Route::prefix('{coach_id}')->group(function () {
                Route::get('/', [CoachController::class, 'showCoach'])->name('admin.coach.show');
                Route::get('/edit', [CoachController::class, 'editCoach'])->name('admin.coach.edit');
                Route::post('/update', [CoachController::class, 'updateCoach'])->name('admin.coach.update');
            });
        });

        Route::prefix('settings')->group(function () {
            Route::get('/', [SettingsController::class, 'index'])->name('admin.settings.index');
            Route::prefix('banners')->group(function () {
                Route::get('/edit', [SettingsController::class, 'editBanners'])->name('admin.settings.banners.edit');
                Route::post('/update', [SettingsController::class, 'updateBanners'])->name('admin.settings.banners.update');
            });
            Route::prefix('filters')->group(function () {
                Route::get('/edit', [SettingsController::class, 'editFilters'])->name('admin.settings.filters.edit');
            });
        });

        Route::prefix('filters')->group(function () {
            Route::get('/edit', [FilterController::class, 'editFilters'])->name('admin.filters.edit');
            Route::get('/update', [FilterController::class, 'updateFilters'])->name('admin.filters.update');
        });
    });
});
