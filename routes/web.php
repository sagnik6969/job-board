<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\MyJobController;
use App\Models\Employer;
use App\Models\JobApplication;
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

Route::get('login', fn() => redirect()->route('auth.create'))->name('login');
// in laravel it is assumed that default route for login is route('login') is is reflected in
// Authenticate.php middleware. => this is why above redirect function is created.

Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');
// we have to define this separately because by default laravel resource_controller->destroy accepts an id 
// and we don't have as id to pass.

Route::middleware('auth')->resource('jobs.application', JobApplicationController::class)->only(['create', 'store', 'destroy']);
// 'auth' middleware alias for authentication => cookie based authentication for blade
// You can see all middleware aliases at app\http\kernel.php

// auth:sanctum => token based authentication for rest apis.
//   middleware can either be applied here or inside the controller
// following is the syntax

// public function __construct()
// {
//      $this->middleware('auth:sanctum')->only('destroy');
// }
// or
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//  return $request->user();
// });
Route::middleware('auth')
    ->resource('my-job-applications', MyJobApplicationController::class)
    ->only(['index', 'destroy']);

Route::middleware('auth')
    ->resource('employer', EmployerController::class)
    ->only(['create', 'store']);


Route::middleware(['auth', 'employer']) //employer => name of the middlewire alias
    ->resource('my_jobs', MyJobController::class);
// middleWires are checked before every request. if the middle wire allows then only
// request is executed. 
// to create a middle wire php artisan make:middlewire middlewire_name 
// after that we can register the middlewire alias in kernel.php  
// then we can use the middlewire in any route

