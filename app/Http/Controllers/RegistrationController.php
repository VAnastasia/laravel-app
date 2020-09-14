<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;

class RegistrationController extends Controller {
    public function submit(RegistrationRequest $req) {
        $user = new User();
        $user->name = $req->input('login');
        $user->email = $req->input('email');
        $user->password = bcrypt($req->input('password'));
        $user->avatar = $req->file('image')->store('uploads', 'public');

        $user->save();
        return redirect()->route('auth');
    }
}
