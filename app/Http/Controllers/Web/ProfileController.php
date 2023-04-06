<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        $user->load('roles');

        return view('profile')->with('user', $user);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'username' => ['required', 'without_spaces', 'unique:users,username,' . $user->id],
        ]);

        $user->update($request->all());

        return back()->with('success', 'Profile updated successfully.');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = $request->user();

        $oldPassword = $request->input('old_password');
        $newPassword = $request->input('new_password');

        if (Hash::check($oldPassword, $user->password)) {

            $user->update([
                'password' => Hash::make($newPassword),
            ]);

            return back()->with('success', 'Successfully updated password.');
        }

        return back()->withErrors([
            'old_password' => 'Old password is wrong.',
        ]);
    }

    public function changeAvatar(Request $request)
    {
        $request->validate(['avatar' => ['required', 'file', 'mimes:jpg,jpeg,png,webp,gif,svg']]);

        $avatar = $request->file('avatar');
        $user = $request->user();

        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {

            Storage::disk('public')->delete($user->avatar);
        }

        if ($avatar) {

            $hashName = $avatar->hashName();
            $extension = $avatar->getClientOriginalExtension();

            $avatar = $avatar->storeAs('avatars', $hashName . '.' . $extension, 'public');

            $user->update(['avatar' => $avatar]);
        }

        return back()->with('success', 'Avatar image updated successfully.');
    }

    public function destroy(Request $request)
    {
        $request->validate(['email_confirmation' => ['required', 'email']]);

        $user = $request->user();

        if ($user->email === $request->input('email_confirmation')) {

            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {

                Storage::disk('public')->delete($user->avatar);
            }

            $user->delete();

            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('auth.signin')->with('success', 'Your account has been successfully deleted.');
        }

        return back()->withErrors([
            'email_confirmation' => 'Incorrect email confirmation.'
        ]);
    }
}
