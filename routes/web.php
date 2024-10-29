<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\RegisterController;

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
 return redirect('/login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/reports', [DashboardController::class, 'reports'])->middleware('auth');
Route::resource('/dashboard/absensi', AbsensiController::class)->middleware('auth');
Route::resource('/dashboard/divisions', DivisionController::class)->middleware('admin');
Route::resource('/dashboard/profile', ProfileController::class, ['parameters' => ['profile' => 'user',]])->middleware('auth');
Route::resource('/dashboard/employee', UserController::class, ['parameters' => ['employee' => 'user',]])->middleware('admin');
Route::get('/dashboard/pengajuan-admin', [PengajuanController::class, 'admin'])->middleware('admin');
Route::get('/dashboard/pengajuan/approve/{id}', [PengajuanController::class, 'approve'])->middleware('admin');
Route::get('/dashboard/pengajuan', [PengajuanController::class, 'index'])->middleware('auth');
Route::get('/dashboard/pengajuan/create', [PengajuanController::class, 'create'])->middleware('auth');
Route::post('/dashboard/pengajuan', [PengajuanController::class, 'store'])->middleware('auth');
Route::delete('/dashboard/pengajuan/{id}', [PengajuanController::class, 'destroy'])->middleware('auth');


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('users', UserController::class);
