<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


use App\Http\Controllers\ApiController;

Route::get('/courses', [ApiController::class, 'getCourses']);
Route::get('/courses/{id}/content', [ApiController::class, 'getCourseContent']);