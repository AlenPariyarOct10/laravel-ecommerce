<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\CategoryController;


Route::get('/', [FrontendProductController::class, 'index']);

Route::prefix('admin')->group(function () {

    Route::get('login', function () {
        return view('admin.login');
    })->name('admin.login');

    Route::get('logout', function () {
        Auth::logout();
        return redirect()->route('admin.login');
    });

    Route::post('login', [\App\Http\Controllers\Backend\AuthController::class, "login"])->name('admin.login.submit');

    Route::resource('products', ProductController::class);

    Route::middleware(['auth:admin', 'verified'])->group(function () {
        Route::get('/', function () {
            return view('admin.index');
        });



        Route::get('create', [ProductController::class, "create"])->name('admin.products.create');
    });


    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, "index"])->name('admin.categories.index');
        Route::get('create', [CategoryController::class, 'create'])->name('admin.categories.create'); // Use controller for create
        Route::post('store', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::delete('{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });


    Route::post('orders', [OrderController::class, 'store'])->name('orders.store');
    Route::post('categories/store', [\App\Http\Controllers\Backend\CategoryController::class, 'store'])->name('admin.categories.store');

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
