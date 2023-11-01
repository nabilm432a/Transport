<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PasswordController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $user = $request->user();

        if ($user->update([
            'password' => Hash::make($validated['password']),
        ])) {
            session()->flash('success', 'Password Updated Successfully');
            return redirect('profile');
        } else {
            session()->flash('error', 'Failed to update Password');
            return redirect('profile');
        }
    }

    public function show(): View
    {
        return view('profile.update-password');
    }

}
