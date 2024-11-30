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
use App\Http\Controllers\Users\CompanyController;
use App\Http\Controllers\Users\StudentController;
use App\Http\Controllers\JitsiController;
use App\Http\Controllers\Users\AppointmentStudentController;
use App\Http\Controllers\Users\AppointmentCompanyController;



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


    Route::group(['prefix' => 'Student'], function () {
        Route::get('Home', [StudentController::class, 'getHome'])->name('student-home');

        Route::get('Blog', [StudentController::class, 'getBlog']);
        Route::post('Blog', [StudentController::class, 'postBlog']);
        Route::post('updateBlog/{id_blog}', [StudentController::class, 'updateBlog']);
        Route::get('getUpdateBlog/{id_blog}', [StudentController::class, 'getUpdateBlog']);
        Route::get('delBlog/{id_blog}', [StudentController::class, 'delBlog']);

        Route::get('DS1', [StudentController::class, 'getDS1']);
        Route::get('DS2', [StudentController::class, 'getDS2']);

        Route::get('Profile/{id}', [StudentController::class, 'getProfile']);

        Route::get('CV/{id}', [StudentController::class, 'getCV']);
        Route::get('Share/{id}', [StudentController::class, 'getShare']);
        Route::get('Share2/{id_blog}', [StudentController::class, 'getShare2']);
        Route::post('updateProfile/{id}', [StudentController::class, 'postUpdate']);
        Route::get('messenger-student/{id}', [StudentController::class, 'messenger'])->name('messenger-student');
        Route::post('send-mes', [StudentController::class, 'send_Messenger']);
        Route::post('load-mes', [StudentController::class, 'load_Mes']);

        Route::get('/jitsi-meet', [JitsiController::class, 'index']);
        // Hiển thị danh sách cuộc hẹn
        Route::get('appointments', [AppointmentStudentController::class, 'index'])->name('appointments.index');

        // Hiển thị form tạo cuộc hẹn
        Route::get('appointments/create', [AppointmentStudentController::class, 'create'])->name('appointments.create');

        // Lưu cuộc hẹn vào cơ sở dữ liệu
        Route::post('appointments', [AppointmentStudentController::class, 'store'])->name('appointments.store');

        // Hiển thị chi tiết một cuộc hẹn
        Route::get('appointments/{appointment}', [AppointmentStudentController::class, 'show'])->name('appointments.show');

        Route::get('appointments/{appointment}/edit', [AppointmentStudentController::class, 'edit'])->name('appointments.edit');

        Route::put('appointments/{appointment}', [AppointmentStudentController::class, 'update'])->name('appointments.update');

        // Xóa cuộc hẹn
        Route::delete('appointments/{appointment}', [AppointmentStudentController::class, 'destroy'])->name('appointments.destroy');
    });


    Route::group(['prefix' => 'Company'], function () {
        Route::get('Home', [CompanyController::class, 'getHome'])->name('company-home');
        Route::get('Blog', [CompanyController::class, 'getBlog']);
        Route::post('Blog', [CompanyController::class, 'postBlog']);
        Route::post('updateBlog/{id_blog}', [CompanyController::class, 'updateBlog']);
        Route::get('getUpdateBlog/{id_blog}', [CompanyController::class, 'getupdateBlog']);
        Route::get('delBlog/{id_blog}', [CompanyController::class, 'delBlog']);

        Route::get('DS1', [CompanyController::class, 'getDS1']);
        Route::get('DS2', [CompanyController::class, 'getDS2']);

        Route::get('Profile/{id}', [CompanyController::class, 'getProfile']);

        Route::get('CV/{id}', [CompanyController::class, 'getCV']);
        Route::get('Share/{id}', [CompanyController::class, 'getShare']);
        Route::get('Share2/{id_blog}', [CompanyController::class, 'getShare2']);
        Route::post('updateProfile/{id}', [CompanyController::class, 'postUpdate']);
        Route::get('updateProfile', [CompanyController::class, 'postUpdate']);
        Route::get('messenger-company/{id}', [CompanyController::class, 'messenger'])->name('messenger-company');
        Route::post('send-mes', [CompanyController::class, 'send_messenger']);
        Route::post('load-mes', [CompanyController::class, 'load_mes']);

        Route::get('/jitsi-meet', [JitsiController::class, 'index']);
        // Hiển thị danh sách cuộc hẹn
        Route::get('appointments', [AppointmentCompanyController::class, 'index'])->name('appointments.index');

        // Hiển thị form tạo cuộc hẹn
        Route::get('appointments/create', [AppointmentCompanyController::class, 'create'])->name('appointments.create');

        // Lưu cuộc hẹn vào cơ sở dữ liệu
        Route::post('appointments', [AppointmentCompanyController::class, 'store'])->name('appointments.store');

        // Hiển thị chi tiết một cuộc hẹn
        Route::get('appointments/{appointment}', [AppointmentCompanyController::class, 'show'])->name('appointments.show');

        Route::get('appointments/{appointment}/edit', [AppointmentCompanyController::class, 'edit'])->name('appointments.edit');

        Route::put('appointments/{appointment}', [AppointmentCompanyController::class, 'update'])->name('appointments.update');

        // Xóa cuộc hẹn
        Route::delete('appointments/{appointment}', [AppointmentCompanyController::class, 'destroy'])->name('appointments.destroy');
    });
});


Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'post_login']);
Route::get('logout', [UserController::class, 'logout'])->name('logout');

// Auth::routes(['verify' => true]);

Route::get('registration', [UserController::class, 'registration'])->name('registration');
Route::post('registration', [UserController::class, 'post_registration']);
