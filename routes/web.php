<?php

use Illuminate\Support\Facades\Route;
use App\Models\Students;
use App\Models\Teachers;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\StudentsController;

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

Route::get('teachers', [App\Http\Controllers\TeachersController::class, 'index']);
Route::get('myview/createteachers', [App\Http\Controllers\TeachersController::class, 'create']);
Route::post('myview/createteachers', [App\Http\Controllers\TeachersController::class, 'store']);
Route::get('myview/{id}/edit', [TeachersController::class, 'edit']);
Route::put('myview/{id}/edit', [TeachersController::class, 'update']);
Route::get('myview/{id}/delete', [TeachersController::class, 'destroy']);

Route::get('students', [App\Http\Controllers\StudentsController::class, 'index']);
Route::get('myview/createstudents', [App\Http\Controllers\StudentsController::class, 'create']);
Route::post('myview/createstudents', [App\Http\Controllers\StudentsController::class, 'store']);
Route::get('myview/{id}/edit', [StudentsController::class, 'edit']);
Route::put('myview/{id}/edit', [StudentsController::class, 'update']);
Route::get('myview/{id}/delete', [StudentsController::class, 'destroy']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
