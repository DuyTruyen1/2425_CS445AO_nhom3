<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FeedbackController;
use App\Http\Controllers\Api\NumberController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\UserController;

Route::get('/', function () {
  return response()->json(['message' => 'Welcome to the API']);
});


Route::post('admin-login', [AdminController::class, 'postLoginAdmin']);
Route::get('admin-logout', [AdminController::class, 'Logout_admin']);
Route::post('registration-admin', [AdminController::class, 'postRegistrationAdmin']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth:api'], function () {
  Route::get('home', [AdminController::class, 'adminHome']);
  Route::get('users', [AdminController::class, 'user']);
  Route::get('feedback', [FeedbackController::class, 'feedback']);
  Route::get('numbers', [NumberController::class, 'numbers']);
  Route::get('deleteUser', [AdminController::class, 'delete_user']);
  Route::get('deleteBlog', [BlogController::class, 'getBlog']);
  Route::post('deleteBlog', [BlogController::class, 'deleteBlog']);

  Route::get('category', [CategoryController::class, 'category']);
  Route::post('ajax_add_category', [CategoryController::class, 'postCategory']);
  Route::get('edit_category/{id}', [CategoryController::class, 'editCategory']);
  Route::post('ajax_edit_category/{id}', [CategoryController::class, 'postEditCategory']);
  Route::get('delete_category/{id}', [CategoryController::class, 'deleteCategory']);

  Route::get('skill', [SkillController::class, 'skill']);
  Route::post('ajax_add_skill', [SkillController::class, 'postSkill']);
  Route::get('edit_skill/{id}', [SkillController::class, 'editSkill']);
  Route::post('ajax_edit_skill/{id}', [SkillController::class, 'postEditSkill']);
  Route::get('delete-skill/{id}', [SkillController::class, 'deleteSkill']);
});

Route::group(['prefix' => 'Pages', 'middleware' => 'auth:api'], function () {
  Route::get('Setting', [UserController::class, 'updatePassword']);
  Route::post('Setting', [UserController::class, 'saveUpdatePassword']);
  Route::get('Help', [UserController::class, 'getHelp']);
  Route::post('Help', [UserController::class, 'postHelp']);
});

Route::post('login', [UserController::class, 'post_login']);
Route::post('registration', [UserController::class, 'post_registration']);
