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


 Route::apiResource('school', 'App\Http\Controllers\SchoolController');

Route::apiResource('campuses', 'App\Http\Controllers\CampusesController');

Route::apiResource('course', 'App\Http\Controllers\CoursesController');

Route::apiResource('courseTypes', 'App\Http\Controllers\CourseTypesController');

// Route::get('/test/mail',function(){
//     return new App\Mail\newsMail();
// });