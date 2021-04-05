<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function show() {
        return view('profile.show');
    }

    public function update(Request $request) {
        //dd(request()->input('username'));
        // validate
        $this->validate($request, [
            'username' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|confirmed',
            'password_confirmation' => 'nullable',
        ]);

        // set new values.
        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        isset($request->password) ? $user->password = Hash::make($request->password) : null;

        if(request()->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('avatars');
            // if user avatar exists delete it
            if(Storage::disk('public')->exists($user->avatar)) {
                Storage::delete($user->avatar);
            }
            // and update it.
            $user->avatar = $avatar;
        }

        // save updated model.
        $user->save();

        // redirect
        return redirect()->route('profile');
    }
}
