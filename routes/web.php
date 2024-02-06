<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    
    // Rute yang dapat diakses oleh admin
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard-admin', function () {
            return view('template.admin.dashboard');
        });
    });
});

// Guest 

Route::get('/', function () {
    return view('user.dashboard');
})->name('home');

Route::get('/register-user', function () {
    return view('auth.register-user');
});

Route::get('/login-user', function () {
    return view('auth.login-user');
});

Route::get('/datatables', function () {
    return view('template.admin.tables-data');
});


// Route::get('/login', function () {
//     return view('register');
// });


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
