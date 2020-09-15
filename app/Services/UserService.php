<?php

namespace App\Services;
use App\Models\User;

class UserService {
    public function addUser ($req) {
        $user = new User();
        $user->name = $req->input('login');
        $user->email = $req->input('email');
        $user->password = bcrypt($req->input('password'));
        $user->avatar = $req->file('image')->store('uploads', 'public');

        $user->save();
    }
}
