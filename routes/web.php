<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserControler;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\languageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SettingAdminControler;
use App\Http\Controllers\SliderAdminControler;
use Illuminate\Support\Facades\Route;


Route::get('/admin', [AdminController::class, 'loginAdmin']);
Route::post('/admin', [AdminController::class, 'postLoginAdmin']);

Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
//    Route::prefix('categories')->group(function () {
//        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
//        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
//        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
//        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
//        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
//        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
//    });

    Route::prefix('menus')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('menus.index');
        Route::get('/create', [MenuController::class, 'create'])->name('menus.create');
        Route::post('/store', [MenuController::class, 'store'])->name('menus.store');
        Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('menus.edit');
        Route::post('/update/{id}', [MenuController::class, 'update'])->name('menus.update');
        Route::get('/delete/{id}', [MenuController::class, 'delete'])->name('menus.delete');

    });

    Route::prefix('product')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('product.index');
        Route::get('/create', [AdminProductController::class, 'create'])->name('product.create');
        Route::post('/store', [AdminProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}  ', [AdminProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}  ', [AdminProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}  ', [AdminProductController::class, 'delete'])->name('product.delete');
    });

    Route::prefix('slider')->group(function () {
        Route::get('/', [SliderAdminControler::class, 'index'])->name('slider.index');
        Route::get('/create', [SliderAdminControler::class, 'create'])->name('slider.create');
        Route::post('/store', [SliderAdminControler::class, 'store'])->name('slider.store');
        Route::get('/edit/{id}  ', [SliderAdminControler::class, 'edit'])->name('slider.edit');
        Route::post('/update/{id}  ', [SliderAdminControler::class, 'update'])->name('slider.update');
        Route::get('/delete/{id}  ', [SliderAdminControler::class, 'delete'])->name('slider.delete');


    });

    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingAdminControler::class, 'index'])->name('settings.index');
        Route::get('/create', [SettingAdminControler::class, 'create'])->name('settings.create');
        Route::post('/store', [SettingAdminControler::class, 'store'])->name('settings.store');
        Route::get('/edit/{id}  ', [SettingAdminControler::class, 'edit'])->name('settings.edit');
        Route::post('/update/{id}  ', [SettingAdminControler::class, 'update'])->name('settings.update');
        Route::get('/delete/{id}  ', [SettingAdminControler::class, 'delete'])->name('settings.delete');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [AdminUserControler::class, 'index'])->name('users.index');
    });

    Route::get('language/{language}', [languageController::class, 'index'])->name('language.index');

});

