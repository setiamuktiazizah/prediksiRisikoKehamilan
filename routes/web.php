<?php

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
    return view('user.dashboard');
});

Route::get('/auth', function () {
    return view('admin');
});

Route::get('/template', function () {
    return view('template.user.template');
});

Route::get('/template-admin', function () {
    return view('template.admin.template');
});

Route::get('/datatables', function () {
    return view('template.admin.tables-data');
});

Route::get('/dashboard-admin', function () {
    return view('template.admin.dashboard');
});
