<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // only available for guests.
    public function __construct() {
        $this->middleware('guest');
    }
    
    public function index() {
        return view('auth.login');
    }

    public function login(Request $request) {
        
        // validate
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // attempt login
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('login_invalid', 'User or Password incorrect');
        }

        return redirect()->route('home');
    }
}
