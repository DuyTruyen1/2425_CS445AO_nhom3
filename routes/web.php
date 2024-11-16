<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('index');
});


Route::get('admin-login', [AdminController::class, 'loginAdmin'])->name('login-admin');
Route::post('admin-login', [AdminController::class, 'postLoginAdmin']);
Route::get('admin-logout', [AdminController::class, 'Logout_admin'])->name('logout-admin');
// Route::get('admin-logout', [AdminController::class, 'admin_logout'])->name('admin-login');

Route::get('registration-admin', [AdminController::class, 'registrationAdmin'])->name('registration-admin');
Route::post('registration-admin', [AdminController::class, 'postRegistrationAdmin']);
