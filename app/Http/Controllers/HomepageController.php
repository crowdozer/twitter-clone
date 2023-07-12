<?php

namespace App\Http\Controllers;

use App\Helpers\Functions;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomepageController extends Controller
{
    public function render(Request $request): View | RedirectResponse
    {
        if (!Auth::check()) {
            return redirect('/walled-garden');
        }

        return view('scenes.homepage', [
            'posts' => Functions::generate_test_posts(10)
        ]);
    }

    public function render_more(Request $request): View
    {
        return view('components.post-feed', [
            'posts' => Functions::generate_test_posts(10),
            'infinitescrollurl' => '/api/posts'
        ]);
    }
}
