<?php

use App\Http\Controllers\Api\Web\UserController;
use Illuminate\Support\Facades\Route;

Route::post('user/add', [UserController::class, 'add']);
Route::get('user/all', [UserController::class, 'all']);
Route::post('user/edit', [UserController::class, 'edit']);
Route::post('user/delete', [UserController::class, 'delete']);
