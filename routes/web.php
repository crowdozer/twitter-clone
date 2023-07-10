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

Route::get('/', function () {
    return view('scenes.homepage', [
        'posts' => Functions::generate_test_posts(12)
    ]);
});

Route::get('/post/{id}', function (Request $request, string $id) {
    $post = Functions::generate_test_posts(1)[0];
    $post['id'] = $id;

    return view('scenes.post', [
        'post' => $post
    ]);
});

Route::get('/topic/{topic}', function (Request $request, string $topic) {
    return view('scenes.topic', [
        'topic' => $topic,
        'catchphrase' => Functions::topics_catchphrase(),
        'posts' => Functions::generate_test_posts(12)
    ]);
});
