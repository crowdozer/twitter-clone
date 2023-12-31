<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Carbon;

class Post extends Component
{
    public $post;

    /**
     * Create a new component instance.
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post', [
            'scope'             => "post-{$this->post['id']}",
            'id'                => $this->post['id'],
            'author_id'         => $this->post['author_id'],
            'author_verified'   => $this->post['author_verified'],
            'author'            => $this->post['author'],
            'content'           => $this->post['content'],
            'likes'             => $this->post['likes'],
            'liked'             => $this->post['user_liked'],
            'shares'            => $this->post['shares'],
            'shared'            => $this->post['user_shared'],
            'comments'          => $this->post['comments'],
            'commented'         => $this->post['user_commented'],
            'views'             => $this->post['views'],
            'posted_on'         => (new Carbon($this->post['posted_on']))->diffForHumans(),
            'hashtags'          => $this->post['hashtags'],
            'show_tags'         => true,
            'show_views'        => true,
            'is_bot'            => $this->post['is_bot'],
            'has_image'         => $this->post['has_image'],
            '_img_id'           => $this->post['_img_id'],
        ]);
    }
}
