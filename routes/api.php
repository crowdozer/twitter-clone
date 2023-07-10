<?php

use App\Helpers\Functions;
use Illuminate\Http\Request;
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
 * viewing posts for general feed
 */
Route::get('/posts', function (Request $request) {
    return view('components.post-feed', [
        'posts' => Functions::generate_test_posts(10),
        'infinitescrollurl' => '/api/posts'
    ]);
});

/**
 * viewing posts for a profile
 */
Route::get('/posts/user/{id}', function (Request $request, string $id) {
    $tweets = Functions::generate_test_posts(10);

    foreach ($tweets as $key => $tweet) {
        $tweets[$key]['author_id'] = $id;
        $tweets[$key]['author'] = "oops";
    }

    usort($tweets, function ($a, $b) {
        return $b['posted_on'] <=> $a['posted_on'];
    });

    return view('components.post-feed', [
        'posts' => $tweets,
        'infinitescrollurl' => "/api/posts/user/$id"
    ]);
});

/**
 * viewing posts for a profile's likes
 */
Route::get('/posts/user/{id}/likes', function (Request $request, string $id) {
    return view('components.post-feed', [
        'posts' => Functions::generate_test_posts(10),
        'infinitescrollurl' => "/api/posts/user/$id/likes"
    ]);
});

/**
 * viewing replies to a post
 */
Route::get('/posts/{id}', function (Request $request, string $id) {
    return view('components.post-feed', [
        'posts' => Functions::generate_test_posts(10, false),
        'infinitescrollurl' => "/api/posts/$id"
    ]);
});

/**
 * viewing posts related to a topic
 */
Route::get('/posts/topic/{topic}', function (Request $request, string $topic) {
    return view('components.post-feed', [
        'posts' => Functions::generate_test_posts(10),
        'infinitescrollurl' => "/api/posts/topic/$topic"
    ]);
});
