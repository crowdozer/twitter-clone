<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostFeed extends Component
{
    public $posts;
    public string $infinite_scroll_url;

    /**
     * Create a new component instance.
     */
    public function __construct(string $infinitescrollurl, array $posts = [])
    {
        $this->posts = $posts;
        $this->infinite_scroll_url = $infinitescrollurl;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post-feed', [
            'posts' => $this->posts,
            'infinitescrollurl' => $this->infinite_scroll_url,
        ]);
    }
}
