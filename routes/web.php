<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are  loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// HOMEPAGE
Route::get('/', [\App\Http\Controllers\HomepageController::class, 'render']);

// SEARCH PAGE
Route::get('/search', [\App\Http\Controllers\SearchController::class, 'render']);

// REPLY TO POST PAGE
Route::get('/post/{id}', [\App\Http\Controllers\PostController::class, 'render']);

// TOPIC POSTFEED
Route::get('/topic/{topic}', [\App\Http\Controllers\TopicController::class, 'render']);

// USER PROFILE
Route::get('/u/{id}/{mode?}', [\App\Http\Controllers\ProfileController::class, 'render_profile']);

// AUTH ROUTES
Route::get('/walled-garden/sign-up', [\App\Http\Controllers\Auth\SignUpController::class, 'render']);
Route::get('/walled-garden', [\App\Http\Controllers\Auth\LogInController::class, 'render']);
