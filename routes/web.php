<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Helpers\Functions;

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

/**
 * Homepage
 */
Route::get('/', function () {
    return view('scenes.homepage', [
        'posts' => Functions::generate_test_posts(10)
    ]);
});

/**
 * Viewing a post/replying
 */
Route::get('/post/{id}', function (Request $request, string $id) {
    $post = Functions::generate_test_posts(1)[0];
    $post['id'] = $id;

    $replies = Functions::generate_test_posts(10, false);

    return view('scenes.post', [
        'post' => $post,
        'replies' => $replies
    ]);
});

/**
 * Viewing a topic
 */
Route::get('/topic/{topic}', function (Request $request, string $topic) {
    return view('scenes.topic', [
        'topic' => $topic,
        'catchphrase' => Functions::topics_catchphrase(),
        'posts' => Functions::generate_test_posts(10)
    ]);
});

/**
 * Viewing a profile
 */
Route::get('/u/{id}/{mode?}', function (Request $request, string $id, $mode = 'tweets') {
    // initialize page-data with a profile
    $data = Functions::generate_test_profile();

    // add the id to the generated profile
    $data['id'] = $id;

    // add the feed render mode to page data
    switch($mode) {
        case 'replies':
            $data['mode'] = 'replies';
            break;
        case 'likes':
            $data['mode'] = 'likes';
            break;
        case 'tweets': // fall-through
        default:
            $data['mode'] = 'tweets';
            break;
    }

    return view('scenes.profile', $data);
});
