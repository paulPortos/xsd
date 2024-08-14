<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;



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


Route::post('/add-teachers', [TeachersController::class,'adding']);
Route::post('/add-students', [StudentsController::class,'adding']);

Route::put('/edit-teachers', [TeachersController::class, 'edit']);
Route::put('/edit-students', [StudentsController::class, 'edit']);

Route::delete('/delete-teachers', [TeachersController::class, 'delete']);
Route::delete('/delete-students', [StudentsController::class, 'delete']);

Route::get('/get-teachers', [TeachersController::class, 'get']);
Route::get('/get-students', [StudentsController::class, 'get']);

Route::post('/add-user', [UserController::class,'adding']);

Route::put('/edit-user', [UserController::class, 'edit']);

Route::delete('/delete-user', [UserController::class, 'delete']);

Route::get('/get-user', [UserController::class, 'get']);

