<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DiagnoseController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\SymptomController;
use App\Http\Controllers\KnowledgeBaseController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;

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
    Route::post('konsultasi', [ConsultationController::class, 'kalkulator']);
    Route::get('konsultasi/{id_konsultasi}', [ConsultationController::class, 'showdata']);

    // Rute yang dapat diakses oleh admin
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard-admin', [DashboardController::class, 'index'])->name('dashboard-admin');
        Route::resource('data-user',UserController::class)->except('show');
        Route::resource('data-diagnosis', DiagnoseController::class)->except('show');
        Route::resource('data-gejala', SymptomController::class)->except('show');
        Route::resource('data-basis-pengetahuan', KnowledgeBaseController::class)->except('show');
        Route::resource('data-riwayat', HistoryController::class);
        Route::resource('data-artikel', ArticleController::class);
    });
});

// Guest 

Route::get('/', function () {
    return view('user.dashboard');
})->name('home');
Route::get('konsultasi', [ConsultationController::class, 'index'])->name('konsultasi');
Route::get('/pedoman', function () {
    return view('user.guideline');
})->name('pedoman');
Route::get('/bookmark', [BookmarkController::class, 'index'])->name('bookmark');
Route::get('bookmark/{id_bookmark}', [BookmarkController::class, 'showdata'])->name('bookmark.show');
Route::get('/artikel', [NewsController::class, 'index'])->name('artikel');
Route::get('artikel/{slug}', [NewsController::class, 'show'])->name('artikel.show');

Auth::routes();