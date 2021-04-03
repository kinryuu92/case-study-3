<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminRoleControler;
use App\Http\Controllers\AdminUserControler;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\languageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SettingAdminControler;
use App\Http\Controllers\SliderAdminControler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [AdminController::class, 'loginAdmin']);
Route::post('/', [AdminController::class, 'postLoginAdmin']);

Route::get('language/{language}', [languageController::class, 'index'])->name('language.index');

Route::get('/home', function () {
    return view('home');
});


Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])
            ->name('categories.index')
            ->middleware('can:category-list');
        Route::get('/create', [CategoryController::class, 'create'])
            ->name('categories.create')
            ->middleware('can:category-add');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])
            ->name('categories.edit')
            ->middleware('can:category-edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])
            ->name('categories.delete')
            ->middleware('can:category-delete');;
    });

    Route::prefix('menus')->group(function () {
        Route::get('/', [MenuController::class, 'index'])
            ->name('menus.index')
            ->middleware('can:menu-list');
        Route::get('/create', [MenuController::class, 'create'])
            ->name('menus.create')
            ->middleware('can:menu-add');
        Route::post('/store', [MenuController::class, 'store'])->name('menus.store');
        Route::get('/edit/{id}', [MenuController::class, 'edit'])
            ->name('menus.edit')
            ->middleware('can:menu-edit');
        Route::post('/update/{id}', [MenuController::class, 'update'])->name('menus.update');
        Route::get('/delete/{id}', [MenuController::class, 'delete'])
            ->name('menus.delete')
            ->middleware('can:menu-delete');
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])
            ->name('product.index')
            ->middleware('can:product-list');
        Route::get('/create', [AdminProductController::class, 'create'])
            ->name('product.create')
            ->middleware('can:product-add');

        Route::post('/store', [AdminProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}  ', [AdminProductController::class, 'edit'])
            ->name('product.edit')
            ->middleware('can:product-edit,id');
        Route::post('/update/{id}  ', [AdminProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}  ', [AdminProductController::class, 'delete'])
            ->name('product.delete')
            ->middleware('can:product-delete');

    });

    Route::prefix('slider')->group(function () {
        Route::get('/', [SliderAdminControler::class, 'index'])
            ->name('slider.index')
            ->middleware('can:slider-list');
        Route::get('/create', [SliderAdminControler::class, 'create'])
            ->name('slider.create')
            ->middleware('can:slider-add');
        Route::post('/store', [SliderAdminControler::class, 'store'])->name('slider.store');
        Route::get('/edit/{id}  ', [SliderAdminControler::class, 'edit'])
            ->name('slider.edit')
            ->middleware('can:slider-edit');
        Route::post('/update/{id}  ', [SliderAdminControler::class, 'update'])->name('slider.update');
        Route::get('/delete/{id}  ', [SliderAdminControler::class, 'delete'])
            ->name('slider.delete')
            ->middleware('can:slider-delete');
    });

    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingAdminControler::class, 'index'])
            ->name('settings.index')
            ->middleware('can:setting-list');
        Route::get('/create', [SettingAdminControler::class, 'create'])
            ->name('settings.create')
            ->middleware('can:setting-add');
        Route::post('/store', [SettingAdminControler::class, 'store'])->name('settings.store');
        Route::get('/edit/{id}  ', [SettingAdminControler::class, 'edit'])
            ->name('settings.edit')
            ->middleware('can:setting-edit');
        Route::post('/update/{id}  ', [SettingAdminControler::class, 'update'])->name('settings.update');
        Route::get('/delete/{id}  ', [SettingAdminControler::class, 'delete'])
            ->name('settings.delete')
            ->middleware('can:setting-delete');

    });

    Route::prefix('users')->group(function () {
        Route::get('/', [AdminUserControler::class, 'index'])
            ->name('users.index')
            ->middleware('can:user-list');

        Route::get('/create', [AdminUserControler::class, 'create'])
            ->name('users.create')
            ->middleware('can:user-add');
        Route::post('/store', [AdminUserControler::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [AdminUserControler::class, 'edit'])
            ->name('users.edit')
            ->middleware('can:user-edit');
        Route::post('/update/{id}', [AdminUserControler::class, 'update'])->name('users.update');
        Route::get('/delete/{id}', [AdminUserControler::class, 'delete'])
            ->name('users.delete')
            ->middleware('can:user-delete');


    });

    Route::prefix('roles')->group(function () {
        Route::get('/', [AdminRoleControler::class, 'index'])
            ->name('roles.index')
            ->middleware('can:role-list');
        Route::get('/create', [AdminRoleControler::class, 'create'])
            ->name('roles.create')
            ->middleware('can:role-add');
        Route::post('/store', [AdminRoleControler::class, 'store'])->name('roles.store');
        Route::get('/edit{id}', [AdminRoleControler::class, 'edit'])
            ->name('roles.edit')
            ->middleware('can:role-edit');
        Route::post('/update{id}', [AdminRoleControler::class, 'update'])->name('roles.update');
        Route::get('/delete/{id}', [AdminRoleControler::class, 'delete'])
            ->name('roles.delete')
            ->middleware('can:role-delete');

    });

    Route::prefix('permission')->group(function () {
        Route::get('/create', [AdminPermissionController::class, 'create'])->name('permission.create');
        Route::post('/store', [AdminPermissionController::class, 'store'])->name('permission.store');

    });


});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

