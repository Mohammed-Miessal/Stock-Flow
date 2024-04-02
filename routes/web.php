<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;

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


// Home page :
Route::get('/home', function () {
    return view('index');
})->name('home');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/forget-password', function () {
    return view('auth.forget-password');
})->name('forget-password');

Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->name('reset-password');


// Route::group(['middleware' => ['role:Super Admin,Admin']], function () {
    Route::resources(['user' => UserController::class]);
// });
