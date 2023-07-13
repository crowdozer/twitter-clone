<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class SignUpController extends Controller
{
    /**
     * Handles form submission
     */
    public function post_sign_up(Request $request)
    {
        /**
         * First, get and validate form data
         */
        $validatedData = [];
        try {
            $validatedData = $request->validate([
                'name' => 'required|min:4',
                'username' => 'required|max:24|unique:users,username',
                'email' => 'required|email|min:4|unique:users,email',
                'password' => 'required|min:4',
                'not-a-trouble-maker' => 'accepted',
            ]);
        } catch (\Illuminate\Validation\ValidationException $error) {
            return $this->render_form(
                $request->all(),
                $error->errors()
            );
        }

        /**
         * Second, create the user & immediately set as authed
         */
        try {
            $user = \App\Models\User::create([
                'name' => $validatedData['name'],
                'username' => $validatedData['username'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            Auth::login($user);
        } catch (\Throwable $e) {
            return $this->render_form(
                $request->all(),
                [
                    'misc' => 'server error :('
                ]
            );
        }

        /**
         * Finally, return a redirect
         */
         return Functions::htmx_redirect('/');
    }

    /**
     * Renders the signup page
     */
    public function render(): View
    {
        return view('scenes.auth.sign-up', [
            'username' => '',
            'name' => '',
            'email' => '',
            'password' => '',
            'errors' => []
        ]);
    }

    /**
     * Rerenders only the login form
     */
    private function render_form(array $data, array $errors): View
    {
        return view('components.scenes.sign-up.form', [
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'errors' => $errors
        ]);
    }
}
