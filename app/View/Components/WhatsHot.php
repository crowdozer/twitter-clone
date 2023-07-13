<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WhatsHot extends Component
{
    public string $topic;
    public string $activity;
    public string $href;

    /**
     * Create a new component instance.
     */
    public function __construct(string $topic, string $activity, string $href)
    {
        $this->topic = $topic;
        $this->activity = $activity;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.whats-hot');
    }
}
