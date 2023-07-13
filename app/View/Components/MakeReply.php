<?php

namespace App\View\Components;

use App\Helpers\Functions;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class MakeReply extends Component
{
    public $post;

    /**
     * Create a new component instance.
     */
    public function __construct($post = null)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.make-reply', [
            'post' => $this->post,
            'quote' => Functions::quote(),
        ]);
    }
}
