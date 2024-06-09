<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WordController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\RelationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/words', [WordController::class, 'index']);
Route::get('/themes', [ThemeController::class, 'index']);
Route::get('/themes/{theme}', [WordController::class, 'getWordsByTheme']);
Route::get('/relations', [RelationController::class, 'index']);


//POST

Route::post('/words', [WordController::class, 'store']);
Route::post('/themes', [ThemeController::class, 'store']);