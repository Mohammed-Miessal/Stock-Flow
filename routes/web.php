<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SubcategoryController;

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



Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->name('forget-password');
Route::post('/forget-password', [AuthController::class, 'forgetPasswordPost'])->name('forget-password.post');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('reset-password');
Route::post('/reset-password/{token}', [AuthController::class, 'resetPasswordPost'])->name('reset-password.post');


// Route::group(['middleware' => ['role:Super Admin,Admin']], function () {
    Route::middleware(['auth'])->group(function () {
        Route::resources([
            'user' => UserController::class,
            'category' => CategoryController::class,
            'subcategory' => SubcategoryController::class,
            'unit' => UnitController::class,
            'supplier' => SupplierController::class,
            'customer' => CustomerController::class,
            'tax' => TaxController::class,
            'product' => ProductController::class,
            'order' => OrderController::class,
            'invoice' => InvoiceController::class,
        ]);
    
        Route::get('/home', function () {
            return view('index');
        })->name('home');
    
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // Export Excel File
        Route::get('/export', [ProductController::class, 'export'])->name('export');
        // Export CSV File
        Route::get('/export-csv', [ProductController::class, 'exportCSV'])->name('export.csv');
    });
    
