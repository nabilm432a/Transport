<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function info_update(Request $request): View
    {
        return view('profile.update-info', [
            'user' => $request->user(),
        ]);
    }
    public function edit(Request $request): View
    {
        return view('auth.profile', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    public function showUpdateContactForm() {
        return view('profile.update-contact');
    }

    public function UpdateContact(Request $request): RedirectResponse
    {

        $user_id = auth()->id();
        $newcontact = $request->input('contact');
        $existing = User::where('id',$user_id)->first();
        $existing->update(['contact'=>$newcontact]);
        session()->flash('success', 'Contact Updated successfully');
        return redirect::to('profile');
    }

    public function showUpdatePassportForm() {
        return view('profile.update-passport');
    }

    public function UpdatePassport(Request $request): RedirectResponse
    {
        $user_id = auth()->id();
        $newpassport = $request->input('passport');
        $existing = User::where('id',$user_id)->first();
        $existing->update(['passport'=>$newpassport]);
        session()->flash('success', 'Passport Updated successfully');
        return redirect::to('profile');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
