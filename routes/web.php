<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PermissionController;
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


    // Common Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('index');
    })->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


    // Super Admin Routes
Route::group(['middleware' => ['auth','role:Super Admin']], function () {
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubcategoryController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('tax', TaxController::class);
    Route::resource('product', ProductController::class);
    Route::resource('order', OrderController::class);
    Route::resource('invoice', InvoiceController::class);
    // Export Excel File
    Route::get('/export', [ProductController::class, 'export'])->name('export');
    // Export CSV File
    Route::get('/export-csv', [ProductController::class, 'exportCSV'])->name('export.csv');
    // Search Products
    Route::get('/search', [ProductController::class, 'search'])->name('search-products');

});

    // Admin Routes
Route::group(['middleware' => ['auth','role:Admin']], function () {
    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubcategoryController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('tax', TaxController::class);
    Route::resource('product', ProductController::class);
    Route::resource('order', OrderController::class);
    Route::resource('invoice', InvoiceController::class);
    // Export Excel File
    Route::get('/export', [ProductController::class, 'export'])->name('export');
    // Export CSV File
    Route::get('/export-csv', [ProductController::class, 'exportCSV'])->name('export.csv');
    // Search Products
    Route::get('/search', [ProductController::class, 'search'])->name('search-products');

});

    // Stock Manager Routes
Route::group(['middleware' => ['auth','role:Stock Manager']], function () {
        Route::resource('category', CategoryController::class);
        Route::resource('subcategory', SubcategoryController::class);
        Route::resource('unit', UnitController::class);
        Route::resource('tax', TaxController::class);
        Route::resource('product', ProductController::class);
        Route::resource('supplier', SupplierController::class);
        Route::resource('customer', CustomerController::class);
        Route::resource('order', OrderController::class);
        Route::resource('invoice', InvoiceController::class);
        // Export Excel File
        Route::get('/export', [ProductController::class, 'export'])->name('export');
        // Export CSV File
        Route::get('/export-csv', [ProductController::class, 'exportCSV'])->name('export.csv');
        // Search Products
        Route::get('/search', [ProductController::class, 'search'])->name('search-products');
});


    // Commercial Manager Routes
Route::group(['middleware' => ['auth','role:Commercial Manager']], function () {
        Route::resource('supplier', SupplierController::class);
        Route::resource('customer', CustomerController::class);
        Route::resource('order', OrderController::class);
        Route::resource('invoice', InvoiceController::class);
});

    // Commercial Manager Routes
Route::group(['middleware' => ['auth','role:Order Manager']], function () {
        Route::resource('order', OrderController::class);
        Route::resource('invoice', InvoiceController::class);
});
    


// Route::middleware(['auth'])->group(function () {
//         Route::resources([
//             'user' => UserController::class,
//             'category' => CategoryController::class,
//             'subcategory' => SubcategoryController::class,
//             'unit' => UnitController::class,
//             'supplier' => SupplierController::class,
//             'customer' => CustomerController::class,
//             'tax' => TaxController::class,
//             'product' => ProductController::class,
//             'order' => OrderController::class,
//             'invoice' => InvoiceController::class,
//             'role' => RoleController::class,
//             'permission' => PermissionController::class,
//         ]);
    
//         Route::get('/home', function () {
//             return view('index');
//         })->name('home');
    
//         Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//         // Export Excel File
//         Route::get('/export', [ProductController::class, 'export'])->name('export');
//         // Export CSV File
//         Route::get('/export-csv', [ProductController::class, 'exportCSV'])->name('export.csv');
//         // Search Products
//         Route::get('/search', [ProductController::class, 'search'])->name('search-products');
// });
