
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordAdminController;
use App\Http\Controllers\ThemeAdminController; // Make sure to import ThemeAdminController
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\WordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Word routes
    Route::get('/words', [WordController::class, 'index'])->name('words');
    Route::get('/words/{word}/edit', [WordAdminController::class, 'edit'])->name('editWord');
    Route::put('/words/{word}', [WordAdminController::class, 'update'])->name('updateWord');
    Route::delete('/words/{word}/destroy', [WordAdminController::class, 'destroy'])->name('destroyWord');

    // Theme routes
    Route::get('/themes', [ThemeController::class, 'index'])->name('themes');
    Route::get('/themes/{theme}/edit', [ThemeAdminController::class, 'edit'])->name('editTheme');
    Route::put('/themes/{theme}', [ThemeAdminController::class, 'update'])->name('updateTheme');
    Route::delete('/themes/{theme}', [ThemeAdminController::class, 'destroy'])->name('destroyTheme');
});
