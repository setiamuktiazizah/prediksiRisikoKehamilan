<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DiagnoseController;
use App\Http\Controllers\SymptomController;

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

/* Auth */

// Route untuk menampilkan form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Route untuk menghandle proses login
Route::post('/login', [AuthController::class, 'login']);

// Route untuk menampilkan form register
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Route untuk menghandle proses register
Route::post('/register', [AuthController::class, 'register']);

// Route untuk proses logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Rute yang dapat diakses oleh semua pengguna terautentikasi
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    });

    Route::resource('data-diagnosis', DiagnoseController::class)->except('show');
    Route::resource('data-gejala', SymptomController::class)->except('show');
    
    // Rute yang dapat diakses oleh admin
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard-admin', function () {
            return view('admin.dashboard');
        });
    });
});

// Guest 

Route::get('/', function () {
    return view('user.dashboard');
})->name('home');

Route::get('/datatables', function () {
    return view('template.admin.tables-data');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
