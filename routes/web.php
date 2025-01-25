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

Route::get('content_titles/subheadings/create', [SubheadingController::class, 'create'])->name('subheadings.create');
Route::post('content_titles/subheadings/store', [SubheadingController::class, 'store'])->name('subheadings.store');

Route::resource('subheadings', SubheadingController::class);
use App\Http\Controllers\MenuController;

Route::get('/courses', [MenuController::class, 'showCourses'])->name('courses.index');
Route::get('/courses/{course_id}', [MenuController::class, 'showContentTitles'])->name('courses.show');
