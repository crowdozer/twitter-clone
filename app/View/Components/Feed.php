<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Faker;

class Feed extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // ...
    }

    private function test_tweet()
    {
        $faker = Faker\Factory::create();

        return [
            'id'                => $faker->uuid(),
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
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.feed', [
            'posts' => [
                $this->test_tweet(),
                $this->test_tweet(),
                $this->test_tweet(),
                $this->test_tweet(),
                $this->test_tweet(),
                $this->test_tweet(),
                $this->test_tweet(),
                $this->test_tweet(),
                $this->test_tweet(),
                $this->test_tweet(),
            ]
        ]);
    }
}
