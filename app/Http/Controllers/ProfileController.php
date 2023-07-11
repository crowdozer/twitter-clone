<?php

namespace App\Http\Controllers;

use App\Helpers\Functions;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function render_profile(Request $request, string $id, string $mode = 'tweets'): View
    {
        $data = Functions::generate_test_profile();

        // add the id to the generated profile
        $data['id'] = $id;
        $data['username'] = $id;
        $data['mode'] = $mode;
        $data['_banner_img'] = fake()->numberBetween(1, 500);

        return view('scenes.profile', $data);
    }

    public function render_likes(Request $request, string $id): View
    {
        $tweets = Functions::generate_test_posts(10);

        return view('components.post-feed', [
            'posts' => $tweets,
            'infinitescrollurl' => "/api/posts/user/$id/tweets"
        ]);
    }

    public function render_tweets(Request $request, string $id, string $_name): View
    {
        $tweets = Functions::generate_test_posts(10);

        foreach ($tweets as $key => $tweet) {
            $tweets[$key]['author_id'] = $id;

            // this is a big hack, since profiles arent real
            $tweets[$key]['author'] = $_name;
        }

        usort($tweets, function ($a, $b) {
            return $b['posted_on'] <=> $a['posted_on'];
        });

        return view('components.post-feed', [
            'posts' => $tweets,
            'infinitescrollurl' => "/api/posts/user/$id/$_name"
        ]);
    }
}
