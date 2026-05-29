<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/items', function () {
        return response()->json([
            'message' => 'Berhasil akses items'
        ]);
    });

    Route::delete('/items/{id}', function ($id) {
        return response()->json([
            'message' => 'Item berhasil dihapus',
            'id' => $id
        ]);
    })->middleware('role:admin');

});