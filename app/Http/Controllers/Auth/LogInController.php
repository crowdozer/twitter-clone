<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LogInController extends Controller
{
    public function post_log_in(Request $request): View|Response
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return Functions::htmx_redirect('/');
        }

        return view('components.scenes.log-in.error');
    }

    public function render(): View
    {
        return view('scenes.auth.log-in');
    }
}
