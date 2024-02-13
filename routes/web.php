<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/add', [UserController::class, 'create'])->name('users.add');
    Route::post('/add', [UserController::class, 'store'])->name('users.store');
    Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/edit/{id}', [UserController::class, 'update'])->name('users.update');
});

Route::group(['prefix' => 'members'], function () {
    Route::get('/', [MemberController::class, 'index'])->name('members.index');
    Route::get('/add', [MemberController::class, 'create'])->name('members.add');
    Route::post('/add', [MemberController::class, 'store'])->name('members.store');
    Route::delete('/destroy/{id}', [MemberController::class, 'destroy'])->name('members.destroy');
    Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('members.edit');
    Route::post('/edit/{id}', [MemberController::class, 'update'])->name('members.update');
});

Route::group(['prefix' => 'outlets'], function () {
    Route::get('/', [OutletController::class, 'index'])->name('outlets.index');
    Route::get('/add', [OutletController::class, 'create'])->name('outlets.add');
    Route::post('/add', [OutletController::class, 'store'])->name('outlets.store');
    Route::delete('/destroy/{id}', [OutletController::class, 'destroy'])->name('outlets.destroy');
    Route::get('/edit/{id}', [OutletController::class, 'edit'])->name('outlets.edit');
    Route::post('/edit/{id}', [OutletController::class, 'update'])->name('outlets.update');
});

Route::group(['prefix' => 'statuses'], function () {
    Route::get('/', [StatusController::class, 'index'])->name('statuses.index');
    Route::get('/add', [StatusController::class, 'create'])->name('statuses.add');
    Route::post('/add', [StatusController::class, 'store'])->name('statuses.store');
    Route::delete('/destroy/{id}', [StatusController::class, 'destroy'])->name('statuses.destroy');
    Route::get('/edit/{id}', [StatusController::class, 'edit'])->name('statuses.edit');
    Route::post('/edit/{id}', [StatusController::class, 'update'])->name('statuses.update');
});

Route::group(['prefix' => 'packages'], function () {
    Route::get('/', [PackageController::class, 'index'])->name('packages.index');
    Route::get('/add', [PackageController::class, 'create'])->name('packages.add');
    Route::post('/add', [PackageController::class, 'store'])->name('packages.store');
    Route::delete('/destroy/{id}', [PackageController::class, 'destroy'])->name('packages.destroy');
    Route::get('/edit/{id}', [PackageController::class, 'edit'])->name('packages.edit');
    Route::post('/edit/{id}', [PackageController::class, 'update'])->name('packages.update');
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/add', [CategoryController::class, 'create'])->name('categories.add');
    Route::post('/add', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/edit/{id}', [CategoryController::class, 'update'])->name('categories.update');
});

Route::group(['prefix' => 'transactions'], function () {
    Route::get('/', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/add', [TransactionController::class, 'create'])->name('transactions.add');
});
