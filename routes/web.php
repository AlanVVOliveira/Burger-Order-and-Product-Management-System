<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\CashRegisterController;
use App\Models\Product;
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
    return view('welcome');
});

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/dashboard/showActiveProducts', [DashboardController::class, 'showActiveProducts'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.showActiveProducts'); 

Route::get('/dashboard/showInactiveProducts', [DashboardController::class, 'showInactiveProducts'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.showInactiveProducts'); 

Route::get('/dashboard/showOrdersDelivered', [DashboardController::class, 'showOrdersDelivered'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.showOrdersDelivered'); 
    
Route::get('/dashboard/showCanceledOrders', [DashboardController::class, 'showCanceledOrders'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.showCanceledOrders');     

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
    Route::post('/products/{id}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
    
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::get('/orders/createJson', [OrderController::class, 'createJson'])->name('orders.createJson');
    Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
    Route::post('/orders/{id}/update', [OrderController::class, 'update'])->name('orders.update');
    Route::post('/orders/{id}/destroy', [OrderController::class, 'destroy'])->name('orders.destroy');

});

require __DIR__.'/auth.php';
