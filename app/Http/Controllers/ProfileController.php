<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function show(): View
    {
        $user = auth()->user()->load('profile');
        return view('profile.show', compact('user'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user()->load('profile');
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:1024'
        ]);

        // Update user name
        $user->update(['name' => $validated['name']]);

        // Handle profile data
        $profileData = [
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'birth_date' => $validated['birth_date'],
            'gender' => $validated['gender'],
        ];

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar
            if ($user->profile && $user->profile->avatar) {
                Storage::disk('public')->delete($user->profile->avatar);
            }

            $avatar = $request->file('avatar');
            $filename = 'avatar_' . time() . '.' . $avatar->getClientOriginalExtension();
            
            $img = Image::make($avatar->getPathname());
            $img->fit(300, 300);
            $img->save(storage_path('app/public/avatars/' . $filename));
            
            $profileData['avatar'] = 'avatars/' . $filename;
        }

        // Create or update profile
        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            $profileData
        );

        return Redirect::route('profile.show')
            ->with('success', 'Profile updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}