<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\CategoryController;

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
    return view('welcome');
});

Route::prefix('administrator')->middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::resource('categories', CategoryController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
