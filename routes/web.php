<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatusController;
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

Route::get('/', function () {
    return view('auth/login_page');
})->name('halaman_login');

Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::resource('user', UserController::class)->middleware('status');
    Route::resource('status', StatusController::class)->middleware('status');
    Route::resource('category', CategoryController::class)->middleware('status');

    Route::get('change_password', [UserController::class, 'change_password'])->name('change_password');
    Route::patch('update_password', [UserController::class, 'update_password'])->name('update_password');
    Route::get('user_setting', [UserController::class, 'user_setting'])->name('user_setting');
    Route::resource('certificate', CertificateController::class);
    Route::get('export', [CertificateController::class, 'export'])->name('export');
});
