<?php

use App\Models\bundle1;
use App\Models\bundle2;
use App\Models\singlesession;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\CourseController;
use App\Http\Controllers\User\ContactUsController;
use App\Http\Controllers\DocumentCheckerController;
use App\Http\Controllers\AboutUsController;



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

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('asad.gudgk@gmail.com')->send(new \App\Mail\InvoiceUser($details));
   
    dd("Email is Sent.");
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/get/courses', [CourseController::class, 'getCourse'])->name('course.get');
Route::get('get/courses-top-university/{universityname}/{location}', [CourseController::class, 'getCoursebytopUniversity'])->name('get-courses-top-university');

Route::get('/get/courses/search/{location?}/{level?}/{programmename?}', [CourseController::class, 'getCoursesearch'])->name('get-courses-search');

Route::post('/get-universities-by-country', [CourseController::class, 'getUniversitiesByCountry']);


Route::get('/get/courses/location/{name?}/{location?}', [CourseController::class, 'getCourselocation'])->name('get.courses.location');
Route::get('/get/course/details/{id}', [CourseController::class, 'getCourseDetails'])->name('course.details');
Route::get('/get/filtered/course', [CourseController::class, 'getFilteredDetails']);
Route::get('/get/search/courses', [CourseController::class, 'searchCourse']);
Route::get('/sort/data', [CourseController::class, 'SortData']);
Route::middleware('verified')->group(function () {
});

Route::middleware('auth')->group(function () {
    Route::post('add/to/wishlist/{id}', [CourseController::class, 'addCourseToWishlist']);
    Route::get('remove/from/wishlist/{id}', [CourseController::class, 'removeFromWishlist']);
    Route::get('user/dashboard', [UserController::class, 'dashboard']);
    Route::get('user/notification/delete/{id}', [UserController::class, 'user_notification_delete'])->name('user-notification-delete');
    Route::get('get/todos', [UserController::class, 'getTodos']);
    Route::get('user/profile', [UserController::class, 'profile']);
    Route::post('update/user/info', [UserController::class, 'updateInfo']);
    Route::post('add/to/list', [UserController::class, 'addToList']);
    Route::get('delete/todo/{id}', [UserController::class, 'deleteToList']);


    Route::get('download-file/{id}', [UserController::class, 'downloadFile'])->name('download.file');


    Route::get('book/consult', function () {
        return view('book-consult');
    }); 


    Route::post('/check-availability-first', [UserController::class, 'checkAvailabilityfirst'])->name('check-availability-first');
    Route::post('/check-availability', [UserController::class, 'checkAvailability'])->name('check-availability');

    Route::post('/check-availability-last', [UserController::class, 'checkAvailabilitylast'])->name('check-availability-last');

    
    // routes/web.php
Route::get('/document-checker', [DocumentCheckerController::class, 'showForm'])->name('document.checker.form');
Route::post('/document-checker', [DocumentCheckerController::class, 'submitForm'])->name('document.checker.submit');

    // 
    Route::post('contact/us', [ContactUsController::class, 'contactUs'])->name('contat.us');
});
Route::post('subscribe', [UserController::class, 'subscribe']);
Route::get('blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('get/blog/details/{id}', [BlogController::class, 'details']);
Route::get('get/category/blogs/{id}', [BlogController::class, 'catBlogs'])->name('get.category.blogs');
Route::get('get-blog', [BlogController::class, 'getblog'])->name('get.blog');
Route::get('load/more/blogs', [BlogController::class, 'loadMoreBlogs'])->name('load.more.blogs');
Route::get('load/more/cat/blogs', [BlogController::class, 'loadMoreCatBlogs'])->name('load.more.cat.blogs');


Route::get('about', [AboutUsController::class, 'about'])->name('about');

Route::get('services', function () {
    $singleSession = singlesession::first();
    $bundle1 = bundle1::first();
    $bundle2 = bundle2::first();
    return view('service', compact('singleSession', 'bundle1', 'bundle2'));
});
Route::get('austria', function () {
    return view('austria');
});

Route::get('austria-guidance', function () {

    $userDocPayment = DB::table('user_guidance_country_document')->where('user_id',auth()->user()->id)->where('guidance_country','austria')->first();
    $payment_status = "false";
    if($userDocPayment){
        $payment_status = "true";
    }
    return view('austria-guidance',compact('payment_status'));
});






Route::post('submit-form-austria-guidance-visa', [UserController::class, 'submit_form_austria_guidance_visa'])->name('submit-form-austria-guidance-visa');


Route::get('ekas-guidance/{success}/{message}', [UserController::class, 'ekas_guidance'])->name('ekas-guidance');




Route::get('belgium-guidance', function () {

    $userDocPayment = DB::table('user_guidance_country_document')->where('user_id',auth()->user()->id)->where('guidance_country','belgium')->first();
    $payment_status = "false";
    if($userDocPayment){
        $payment_status = "true";
    }
    return view('belgium-guidance',compact('payment_status'));

});

Route::get('finland-guidance', function () {

    $userDocPayment = DB::table('user_guidance_country_document')->where('user_id',auth()->user()->id)->where('guidance_country','finland')->first();
    $payment_status = "false";
    if($userDocPayment){
        $payment_status = "true";
    }
    return view('finland-guidance',compact('payment_status'));


});


Route::get('belgium', function () {
    return view('belgium');
});
Route::get('finland', function () {
    return view('finland');
});
Route::get('explore', function () {
    return view('explore');
});



Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/process-payment', [UserController::class, 'processPayment'])->name('processPayment');
Route::post('process-payment-ekas-guide-documents', [UserController::class, 'process_payment_ekas_guide_documents'])->name('process-payment-ekas-guide-documents');
Route::get('/download-pdf/{country}/{type}', [UserController::class, 'downloadGuidancePDF'])->name('downloadGuidancePDF');


