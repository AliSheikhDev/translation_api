<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TranslationController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function (): void {
    Route::post('/translations', [TranslationController::class, 'store']);
    Route::put('/translations/{id}', [TranslationController::class, 'update']);
    Route::get('/translations', [TranslationController::class, 'index']);
    Route::get('/translations/export', [TranslationController::class, 'export']);
    Route::delete('/translations/{id}', [TranslationController::class, 'destroy']);
    Route::get('/translations/search', [TranslationController::class, 'search']);

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
});
