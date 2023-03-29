<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function(){
Route::get('/',[AdminController::class , 'index'])->name('homePage');
Route::resource('categories', CategoryController::class);

Route::resource('courses', CourseController::class);
Route::get('all-registration',[CourseController::class , 'registration'])->name('registration');
Route::delete('all-registration/{id}',[CourseController::class , 'registrationDelete'])->name('registrationDelete');
});



Route::get('/',[PageController::class , 'index'])->name('homePagee');
Route::get('Course/{slug}',[PageController::class , 'course'])->name('Course');

Route::get('register/{slug}',[PageController::class , 'register'])->name('register');
Route::post('register/{slug}',[PageController::class , 'registerSubmit'])->name('register1');

Route::get('contact',[PageController::class , 'contact'])->name('contactPage');

Route::get('pay/{id}',[PageController::class , 'pay'])->name('pay');
Route::get('thanks/{id}',[PageController::class , 'thanks'])->name('thanks');

Route::post('/search',[PageController::class , 'search'])->name('search');

Auth::routes(['register' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
