<?php

namespace App\View\Components;

use App\Helpers\Functions;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProfileTweets extends Component
{
    public string $id;
    public string $name;

    /**
     * Create a new component instance.
     */
    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $tweets = Functions::generate_test_posts(12);

        foreach ($tweets as $key => $tweet) {
            $tweets[$key]['author_id'] = $this->id;
            $tweets[$key]['author'] = $this->name;
        }

        usort($tweets, function ($a, $b) {
            return $b['posted_on'] <=> $a['posted_on'];
        });

        return view('components.profile-tweets', [
            'tweets' => $tweets
        ]);
    }
}
