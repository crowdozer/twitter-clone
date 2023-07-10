<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostFeed extends Component
{
    public $posts;

    /**
     * Create a new component instance.
     */
    public function __construct(array $posts = [])
    {
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post-feed', [
            'posts' => $this->posts
        ]);
    }
}
