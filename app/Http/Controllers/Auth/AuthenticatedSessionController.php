<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {        
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            // 'captcha' => 'required|string',
            // 'userCaptcha' => 'required|string'
        ]);

        // if ($request->captcha != $request->userCaptcha) {
        //     return redirect()->route('login')
        //         ->withErrors(['captcha' => "Captcha doesn't match"]);
        // }
        

        // Perform authentication
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // if (Auth::user()->is_admin == 1) {
            //     return redirect()->route('admin.index');
            // }

            return redirect()->route('admin.dashboard');
        }

        throw ValidationException::withMessages([
            'username' => __('auth.failed'),
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
