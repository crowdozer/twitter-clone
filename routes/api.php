<?php

use App\Helpers\Functions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/**
 * AUTH ENDPOINTS
 */

Route::post('auth/log-in', [\App\Http\Controllers\Auth\LogInController::class, 'post_log_in']);
Route::post('auth/sign-up', [\App\Http\Controllers\Auth\SignUpController::class, 'post_sign_up']);
Route::get('auth/log-out', function () {
    Auth::logout();

    return Functions::htmx_redirect('/walled-garden');
});

/**
 * POST INFINITESCROLL ENDPOINTS
 */

// PROFILE LIKES
Route::get('/posts/user/{id}/likes', [\App\Http\Controllers\PostController::class, 'render_likes']);

// PROFILE TWEETS
Route::get('/posts/user/{id}/{name}', [\App\Http\Controllers\ProfileController::class, 'render_tweets']);

// TOPIC
Route::get('/posts/topic/{topic}', [\App\Http\Controllers\TopicController::class, 'render_more']);

// POST REPLIES
Route::get('/posts/{id}', [\App\Http\Controllers\PostController::class, 'render_more']);

// GENERIC FEED
Route::get('/posts', [\App\Http\Controllers\HomepageController::class, 'render_more']);
