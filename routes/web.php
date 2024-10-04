<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {

    Route::get('login', function () {
        return view('admin.login');
    })->name('admin.login');

    Route::get('logout', function () {
        Auth::logout();
        return redirect()->route('admin.login');
    });

    Route::post('login', [\App\Http\Controllers\Backend\AuthController::class, "login"])->name('admin.login.submit');

    Route::middleware(['auth:admin', 'verified'])->group(function () {
        Route::get('/', function () {
            return view('admin.index');
        });

        Route::get('dashboard', function () {
            return view('admin.products.index');
        })->name('admin.products.index');

        Route::get('create', function () {
            return view('admin.products.create');
        })->name('admin.products.create');
    });


    Route::prefix('categories')->group(function () {
       Route::get('index', function () {
           return view('admin.categories.index');
       })->name('admin.categories.index');
       Route::get('create', function () {
           return view('admin.categories.create');
       })->name('admin.categories.create');
    });
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
