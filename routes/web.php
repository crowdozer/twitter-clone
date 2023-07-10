<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

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
    return view('scenes.homepage');
});

Route::get('/post/{id}', function (Request $request, string $id) {
    $faker = \Faker\Factory::create();

    $post = [
        'id'                => $id,
        'author_id'         => $faker->userName(),
        'author'            => $faker->name(),
        'author_verified'   => $faker->boolean(),
        'content'           => $faker->text(),
        'likes'             => $faker->numberBetween(0, 200),
        'user_liked'        => $faker->boolean(),
        'shares'            => $faker->numberBetween(0, 500),
        'user_shared'       => $faker->boolean(),
        'comments'          => $faker->numberBetween(0, 2000),
        'user_commented'    => $faker->boolean(),
        'views'             => $faker->numberBetween(0, 200000),
        'posted_on'         => $faker->dateTimeThisYear('now'),
        'hashtags'          => $faker->words(),
    ];

    return view('scenes.post', [
        'post' => $post
    ]);
});

Route::get('/topic/{topic}', function (Request $request, string $topic) {
    return view('scenes.topic', [
        'topic' => $topic
    ]);
});
