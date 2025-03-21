<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//API to create SPA



Route::get('/', [MenuController::class, 'showCourses'])->name('courses-frontend.index');
Route::get('/courses/{course_id}', [MenuController::class, 'showContentTitles'])->name('courses-frontend.show');
use App\Http\Controllers\ApiController;

Route::get('/courses', [ApiController::class, 'getCourses']);
Route::get('/getcategory', [ApiController::class, 'getcategory']);
Route::get('course/content-titles/{courseId}', [ApiController::class, 'getContentTitlesByCourse']);
Route::get('/subheadings/{contentId}', [ApiController::class, 'getSubheadingsByContentTitle']);
Route::get('/subheading-content/{subheadingId}', [ApiController::class, 'getSubheadingContent']);
Route::get('/getcategories/{courseId}', [ApiController::class, 'getcategories']);

Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/feedback/store', [FeedbackController::class, 'store']);
Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');

// Public routes
Route::post('/register', [UserController::class, 'studentRegister']);
Route::post('/login', [UserController::class, 'userLogin']);
Route::get('/verification/{id}', [UserController::class, 'verification']);
Route::post('/verify-otp', [UserController::class, 'verifiedOtp']);
Route::post('/resend-otp', [UserController::class, 'resendOtp']);

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard', [UserController::class, 'loadDashboard']);
});