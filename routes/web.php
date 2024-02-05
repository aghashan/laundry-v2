<?php

use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('/content/dashboard');
})->name('dashboard');

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/add', [UserController::class, 'create'])->name('users.add');
    Route::post('/add', [UserController::class, 'store'])->name('users.store');
});

Route::group(['prefix' => 'members'], function () {
    Route::get('/', [MemberController::class, 'index'])->name('members.index');
    Route::get('/add', [MemberController::class, 'create'])->name('members.add');
    Route::post('/add', [MemberController::class, 'store'])->name('members.store');
});

Route::group(['prefix' => 'outlets'], function () {
    Route::get('/', [OutletController::class, 'index'])->name('outlets.index');
    Route::get('/add', [OutletController::class, 'create'])->name('outlets.add');
    Route::post('/add', [OutletController::class, 'store'])->name('outlets.store');
});

Route::group(['prefix' => 'packages'], function () {
    Route::get('/', [PackageController::class, 'index'])->name('packages.index');
    Route::get('/add', [PackageController::class, 'create'])->name('packages.add');
    Route::post('/add', [PackageController::class, 'store'])->name('packages.store');
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/add', [CategoryController::class, 'create'])->name('categories.add');
    Route::post('/add', [CategoryController::class, 'store'])->name('categories.store');
});

Route::group(['prefix' => 'statuses'], function () {
    Route::get('/', [StatusController::class, 'index'])->name('statuses.index');
    Route::get('/add', [StatusController::class, 'create'])->name('statuses.add');
    Route::post('/add', [StatusController::class, 'store'])->name('statuses.store');
});

Route::group(['prefix' => 'transactions'], function () {
    Route::get('/', [TransactionController::class, 'index'])->name('transactions.index');
});
