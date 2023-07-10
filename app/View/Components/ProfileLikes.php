<?php

namespace App\View\Components;

use App\Helpers\Functions;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProfileLikes extends Component
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
        $likes = Functions::generate_test_posts(10);

        return view('components.profile-likes', [
            'likes' => $likes
        ]);
    }
}
