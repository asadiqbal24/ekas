<?php

use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\CourseController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\ContactUsController;
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
Route::get('/', [HomeController::class, 'index']);
Route::get('/get/courses/{name?}', [CourseController::class, 'getCourse'])->name('course.get');
Route::get('/get/course/details/{id}', [CourseController::class, 'getCourseDetails'])->name('course.details');
Route::get('/get/filtered/course', [CourseController::class, 'getFilteredDetails']);
Route::get('/get/search/courses', [CourseController::class, 'searchCourse']);
Route::get('/sort/data', [CourseController::class, 'SortData']);
Route::middleware('verified')->group(function(){
});

Route::middleware('auth')->group(function () {
    Route::get('add/to/wishlist/{id}', [CourseController::class, 'addCourseToWishlist']);
    Route::get('remove/from/wishlist/{id}', [CourseController::class, 'removeFromWishlist']);
    Route::get('user/dashboard' , [UserController::class , 'dashboard']);
    Route::get('get/todos' , [UserController::class , 'getTodos']);
    Route::get('user/profile' , [UserController::class , 'profile']);
    Route::post('update/user/info' , [UserController::class , 'updateInfo']);
    Route::post('add/to/list' , [UserController::class , 'addToList']);
    Route::get('delete/todo/{id}' , [UserController::class , 'deleteToList']);
    Route::post('subscribe' , [UserController::class , 'subscribe']);
    Route::get('book/consult' , function(){
        return view('book-consult');
    });
    // 
    Route::post('contact/us', [ContactUsController::class, 'contactUs'])->name('contat.us');
});

Route::get('blogs' , [BlogController::class , 'index']);
Route::get('get/blog/details/{id}' , [BlogController::class , 'details']);
Route::get('about' , function(){
    return view('about');
});
Route::get('services' , function(){
    return view('service');
});
Route::get('austria' , function(){
    return view('austria');
});
Route::get('belgium' , function(){
    return view('belgium');
});
Route::get('finland' , function(){
    return view('finland');
});
Route::get('explore' , function(){
    return view('explore');
});


Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
