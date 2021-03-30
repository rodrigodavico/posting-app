<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function show() {
        return view('profile.show');
    }
}
