<?php

use App\Http\Controllers\CastController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TvShowController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/admin', function () {
    return Inertia::render('Admin/Index');
})->name('admin.index');


Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Admin/Index');
    })->name('index');

    Route::resource('/movies', MovieController::class);

    Route::resource('/tv-shows', TvShowController::class);
    Route::resource('/tv-shows/{tv-show}/seasons', SeasonController::class);
    Route::resource('/tv-shows/{tv-show}/seasons/{season}/episodes', EpisodeController::class);

    Route::resource('/genres', GenreController::class);

    Route::resource('/casts', CastController::class);

    Route::resource('/tags', TagController::class);
});
