<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'todo'], function () {
    Route::get('/', [TodoController::class, 'index']);
    Route::post('save', [TodoController::class, 'store']);
    Route::get('edit/{id}', [TodoController::class, 'edit']);
    Route::post('update/{id}', [TodoController::class, 'update']);
    Route::get('delete/{id}', [TodoController::class, 'destroy']);
});
