
<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DataExportController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\SessionsController;
use App\Http\Controllers\Admin\StripeController;
use App\Http\Controllers\Admin\SubscribersController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\User\ContactUsController;

Route::get('admin/get/blogs/category', [CourseController::class, 'getBlogsCategory']);
Route::middleware('auth', 'admin')->group(function () {
    Route::get('admin', [HomeController::class, 'index']);
    Route::get('add/course', [CourseController::class, 'index']);
    Route::get('all/admin/courses', [CourseController::class, 'getAllCourses'])->name('courses.get');
    Route::get('admin/get/course/details/{id}', [CourseController::class, 'getOneCourse']);
    Route::get('delete/admin/course/{id}', [CourseController::class, 'delete']);
    Route::get('edit/admin/course/{id}', [CourseController::class, 'edit']);
    Route::post('edit/admin/course/{id}', [CourseController::class, 'update'])->name('admin.course.update');

    // Data Export Controller

    Route::get('admin/export/data', [DataExportController::class, 'export'])->name('admin.data.export');

    Route::post('store', [CourseController::class, 'store'])->name('course.store');
    Route::get('admin/viewblogs', [BlogController::class, 'index'])->name('blog.index');
    Route::get('admin/addblog', [BlogController::class, 'create']);
    Route::post('admin/store/blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('admin/edit/blog/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('admin/update/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('admin/delete/blog/{id}', [BlogController::class, 'delete'])->name('blog.delete');

    Route::get('admin/blog/category', [BlogCategoryController::class, 'index']);
    Route::post('admin/store/blog/category', [BlogCategoryController::class, 'store'])->name('blog.category.store');
    Route::get('admin/delete/blog/category/{id}', [BlogCategoryController::class, 'destroy'])->name('blog.category.delete');

    Route::get('admin/get/all/users', [UsersController::class, 'index']);
    Route::get('admin/add/user', [UsersController::class, 'create']);
    Route::get('admin/delete/user/{id}', [UsersController::class, 'delete']);
    Route::post('admin/store/user', [UsersController::class, 'store']);
    Route::get('admin/make/admin/{id}', [UsersController::class, 'makeAdmin']);
    Route::get('admin/verify/user/{id}', [UsersController::class, 'verifyUser']);

    Route::get('admin/get/feedbacks', [FeedbackController::class, 'index'])->name('feedback.view');
    Route::get('admin/add/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('admin/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('admin/view/feedback/{id}', [FeedbackController::class, 'view'])->name('feedback.show');
    Route::get('admin/delete/feedback/{id}', [FeedbackController::class, 'delete'])->name('feedback.delete');

    Route::get('admin/subscribers', [SubscribersController::class, 'index'])->name('subscriber.get');
    Route::get('admin/delete/sub/{id}', [SubscribersController::class, 'delete'])->name('subscriber.delete');

    Route::get('admin/get/sessions', [SessionsController::class, 'index'])->name('session.index');
    Route::get('admin/add/{package}', [SessionsController::class, 'create'])->name('session.create');
    Route::post('admin/add/{name}', [SessionsController::class, 'store'])->name('session.store');
    Route::get('admin/delete/session/{id}/{source}', [SessionsController::class, 'delete'])->name('session.delete');
    Route::get('admin/edit/session/{id}/{source}', [SessionsController::class, 'edit'])->name('session.edit');
    Route::post('admin/update/session/{id}/{source}', [SessionsController::class, 'update'])->name('session.update');


    Route::prefix('settings/')->controller(GeneralSettingsController::class)->group(function () {
        Route::get('/', 'index')->name('settings');
        Route::post('store/site', 'store')->name('settings.store');
        Route::get('profile/settings', 'profileSettings')->name('profile.settings');
        Route::post('update/settings' , 'updateSetting')->name('settings.update');
    });
    Route::prefix('stripe/')->controller(StripeController::class)->group(function () {
        Route::get('/', 'index')->name('customer.index');
        Route::get('get/payments', 'getPaymentDetails')->name('get.payments');
        Route::get('delete/payment/{id}', 'delete')->name('delete.payments');
        // 
        Route::post('get/user/data', 'getUserData')->name('get.user.data');
    });
    
    Route::get('list/contact/us', [ContactUsController::class, 'index'])->name('contactus.list');
    Route::get('view/contact/{id}', [ContactUsController::class, 'view'])->name('view.contact');
    Route::get('delete/contact/{id}', [ContactUsController::class, 'delete'])->name('contact.delete');
});
Auth::routes();
