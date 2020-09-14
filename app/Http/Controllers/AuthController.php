<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function getProfile() {
        $user = Auth::user();

        return view('main', [
            'user' => $user
        ]);
    }

    public function signin(AuthRequest $req) {
        if(!Auth::attempt($req->only(['email', 'password']))) {
            return redirect()->back();
        } else {
            return redirect()->route('main');
        }
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('main');
    }
}
