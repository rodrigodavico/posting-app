<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        // and save updated model.
        $user->save();
    }
}
