<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user(); // Obtener la instancia del usuario

    $validated = $request->validate([
        'nick' => ['required'],
        'locality' => ['max:50'],
        'province' => ['max:50'],
        'country' => ['max:30'],
        'phone' => ['regex:/^[0-9+().\/\s-]+$/', 'min:11'],
        'image' => []
    ]);

    $user->fill($validated); // Llenar los datos validados en la instancia del usuario

    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    if($request->hasFile('image'))
    {
        File::delete(public_path('storage/' . $user->image));
        $image = $request['image']->store('profiles');
    }else{
        $image = $user->image;
    }

    $user->image = $image;

    $user->save(); // Guardar el usuario

    return redirect()->route('profile.edit')
        ->with('status', 'profile-updated');
            //Es lo mismo que hacer session()->flash('status', 'profile-update')
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
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
