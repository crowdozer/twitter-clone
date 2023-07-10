<?php

namespace App\View\Components;

use App\Helpers\Functions;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MakeReply extends Component
{
    public string|null $to_id;

    /**
     * Create a new component instance.
     */
    public function __construct($post = null)
    {
        if ($post) {
            $this->to_id = $post['id'];
        } else {
            $this->to_id = null;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.make-reply', [
            'id' => $this->to_id,
            'quote' => Functions::quote(),
        ]);
    }
}
