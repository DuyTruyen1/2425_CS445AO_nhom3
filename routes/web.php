<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\NumberController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Users\UserController;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Skill;

Route::get('/', function () {
    return view('index');
});


Route::get('admin-login', [AdminController::class, 'loginAdmin'])->name('login-admin');
Route::post('admin-login', [AdminController::class, 'postLoginAdmin']);
Route::get('admin-logout', [AdminController::class, 'Logout_admin'])->name('logout-admin');
// Route::get('admin-logout', [AdminController::class, 'admin_logout'])->name('admin-login');

Route::get('registration-admin', [AdminController::class, 'registrationAdmin'])->name('registration-admin');
Route::post('registration-admin', [AdminController::class, 'postRegistrationAdmin']);

Route::group(['prefix' => 'admin'], function () {
    Route::get('home', [AdminController::class, 'adminHome'])->name('admin-home');
    Route::get('users', [AdminController::class, 'user'])->name('users');
    Route::get('feedback', [FeedbackController::class, 'feedback'])->name('feedback');
    Route::get('numbers', [NumberController::class, 'numbers'])->name('numbers');
    Route::get('deleteUser', [AdminController::class, 'delete_user']);
    Route::get('deleteBlog', [BlogController::class, 'getBlog'])->name('delete_blog');
    Route::post('deleteBlog', [BlogController::class, 'deleteBlog']);

    //Category
    Route::get('category', [CategoryController::class, 'category'])->name('category');
    Route::post('ajax_add_category', [CategoryController::class, 'postCategory']);
    Route::get('edit_category/{id}', [CategoryController::class, 'editCategory'])->name('edit_category');
    Route::post('ajax_edit_category/{id}', [CategoryController::class, 'postEditCategory']);
    Route::get('delete_category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete_category');

    //Skill
    Route::get('skill', [SkillController::class, 'skill'])->name('skill');
    Route::post('ajax_add_skill', [SkillController::class, 'postSkill']);
    Route::get('edit_skill/{id}', [SkillController::class, 'editSkill'])->name('edit_skill');
    Route::post('ajax_edit_skill/{id}', [SkillController::class, 'postEditSkill']);
    Route::get('/delete-skill/{id}', [SkillController::class, 'deleteSkill']);
});

//users
Route::group(['prefix' => 'Pages', 'middleware' => 'auth'], function () {
    Route::get('Setting', [UserController::class, 'updatePassword'])->name('user.update.password');
    Route::post('Setting', [UserController::class, 'saveUpdatePassword']);
    Route::get('Help', [UserController::class, 'getHelp'])->name('get-help');
    Route::post('Help', [UserController::class, 'postHelp']);
});


Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'post_login']);
Route::get('logout', [UserController::class, 'logout'])->name('logout');

// Auth::routes(['verify' => true]);

Route::get('registration', [UserController::class, 'registration'])->name('registration');
Route::post('registration', [UserController::class, 'post_registration']);
