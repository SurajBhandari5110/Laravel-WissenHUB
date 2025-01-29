<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
use App\Http\Controllers\ContentTitleController;

Route::resource('content_titles', ContentTitleController::class);
use App\Http\Controllers\SubheadingController;


// Route to list all subheadings
Route::get('subheadings/', [SubheadingController::class, 'index'])->name('subheadings.index');

// Route to show the create subheading form
Route::get('subheadings/create', [SubheadingController::class, 'create'])->name('subheadings.create');

// Route to store a new subheading
Route::post('subheadings/store', [SubheadingController::class, 'store'])->name('subheadings.store');

// Route to show a specific subheading
Route::get('subheadings/{id}', [SubheadingController::class, 'show'])->name('subheadings.show');

// Route to show the edit form for a subheading
Route::get('subheadings/{id}/edit', [SubheadingController::class, 'edit'])->name('subheadings.edit');


// Route to update a subheading
Route::put('subheadings/{id}', [SubheadingController::class, 'update'])->name('subheadings.update');

// Route to delete a subheading
Route::delete('subheadings/{id}', [SubheadingController::class, 'destroy'])->name('subheadings.destroy');



use App\Http\Controllers\MenuController;

use App\Http\Controllers\CourseCategoryController;
Route::get('/', [MenuController::class, 'showCourses'])->name('courses-frontend.index');
Route::get('/courses/{course_id}', [MenuController::class, 'showContentTitles'])->name('courses-frontend.show');



Route::get('/subheadings/content-titles/{courseId}', [SubheadingController::class, 'getContentTitlesByCourse'])->name('subheadings.getContentTitlesByCourse');





Route::resource('course_categories', CourseCategoryController::class);
