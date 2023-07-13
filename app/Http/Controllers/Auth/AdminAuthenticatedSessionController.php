<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminAuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Perform custom admin authentication here
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password) || ! $user->is_admin) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        // User is an admin, proceed with login
        auth()->guard('admin')->login($user);

        $request->session()->regenerate();

        return redirect()->route('admin.index');
    }
}
