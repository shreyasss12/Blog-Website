<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/',[BlogController::class, 'frontIndex'])->name('front.end.index');

Route::get('/login-page', [AdminController::class, 'loginPage'])->name('login');
Route::post('/login',[AdminController::class, 'login'])->name('login.submit');
Route::get('/register-page',[AdminController::class, 'registerPage'])->name('register');
Route::post('/register',[AdminController::class,'register'])->name('register.submit');
Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('profile.update');

Route::group(['middleware' => ['auth']], function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.blog.index');
    // })->name('dashboard');

    Route::post('/user-logout', [AdminController::class, 'logout'])->name('logout');

    //Blog Routes   
    Route::get('/blogs',[BlogController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/create',[BlogController::class, 'create'])->name('blogs.create');
    Route::post('/blogs/store',[BlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/edit/{id}',[BlogController::class, 'edit'])->name('blogs.edit');
    Route::post('/blogs/update/{id}',[BlogController::class, 'update'])->name('blogs.update');
    Route::get('/blogs/delete/{id}',[BlogController::class, 'delete'])->name('blogs.delete');
});
