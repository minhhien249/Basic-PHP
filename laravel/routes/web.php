<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//login-logout
Route::get('/admin/login',[UserController::class, 'login'])->name('login');
Route::get('/admin/logout',[UserController::class, 'logout'])->name('logout');
Route::post('/admin/postLogin',[UserController::class, 'post_login'])->name('postLogin');

//admin
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('dashboard');
        //user
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::get('user/store', [UserController::class, 'store'])->name('user.store');
        Route::get('user/index', [UserController::class, 'index'])->name('user.index');
        Route::get('user/search', [UserController::class, 'search'])->name('user.search');

        //item
        Route::get('item/create', [ItemController::class, 'create'])->name('item.create');
        Route::get('item/store', [ItemController::class, 'store'])->name('item.store');
        Route::get('item/index', [ItemController::class, 'index'])->name('item.index');
        Route::get('item/edit_{id}', [ItemController::class, 'edit'])->name('item.edit');
        Route::get('item/update_{id}', [ItemController::class, 'update'])->name('item.update');
        Route::get('item/delete_{id}', [ItemController::class, 'destroy'])->name('item.delete');
        Route::get('item/search', [ItemController::class, 'search'])->name('item.search');

        //category
        Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::get('category/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('category/index', [CategoryController::class, 'index'])->name('category.index');
        Route::get('category/show_{id}', [CategoryController::class, 'show'])->name('category.show');
    });
});
