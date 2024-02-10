<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DiagnoseController;
use App\Http\Controllers\SymptomController;
use App\Http\Controllers\KnowledgeBaseController;

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

/* Authentication */

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* Authorization */
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    });

    Route::get('konsultasi', [ConsultationController::class, 'index'])->name('konsultasi');
    Route::post('konsultasi', [ConsultationController::class, 'kalkulator']);
    Route::get('konsultasi/{id_konsultasi}', [ConsultationController::class, 'showdata']);

    // Rute yang dapat diakses oleh admin
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard-admin', function () {
            return view('admin.dashboard');
        });
        Route::resource('data-diagnosis', DiagnoseController::class)->except('show');
        Route::resource('data-gejala', SymptomController::class)->except('show');
        Route::resource('data-basis-pengetahuan', KnowledgeBaseController::class)->except('show');
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
