<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignInRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function __invoke(SignInRequest $request)
    {
        if (Auth::guard('web')->attempt($request->getCredentials(), $request->input('remember'))) {

            $request->session()->regenerate();

            $request->user()->update(['is_online' => true]);

            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email_or_username' => 'The provided credentials do not match our records.',
        ])->onlyInput('email_or_username');
    }
}
