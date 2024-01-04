<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('jobs.index');
});

// Route::get('test', [JobController::class, 'index']);
// To use controllers without using laravel conventions

Route::resource('jobs', JobController::class);
Route::resource('auth', AuthController::class)->only(['create', 'store']);

Route::get('login', fn() => redirect()->route('auth.create'));
// in laravel it is assumed that default route for login is route('login') is is reflected in
// Authenticate.php middleware. => this is why above redirect function is created.

Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');
// we have to define this separately because by default laravel resource_controller->destroy accepts an id 
// and we don't have as id to pass. 