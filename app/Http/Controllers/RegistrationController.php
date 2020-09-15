<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Services\UserService;

class RegistrationController extends Controller {
    public function submit(RegistrationRequest $req) {
        $userService = new UserService();
        $userService->addUser($req);
        return redirect()->route('auth');
    }
}
