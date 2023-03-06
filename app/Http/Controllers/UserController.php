<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register () {
        return view("auth.register");
    }

    public function store (Request $request) {
        $formFields = $request->validate([
            "name" => ["required", Rule::unique("users", "username")],
            "email" => ["required", Rule::unique("users", "email")],
            "password" => ["required|min:6|confirmed"]
        ]);

        $formFields["password"] = bcrypt($formFields["password"]);

        $user = User::create($formFields);
    }

    public function login () {
        return view("auth.login");
    }

    public function authenticate (Request $request) {
        $formFields = $request->validate([
            "name" => "required",
            "password" => "required"
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect("/")->with("message", "You are logged in!");
        }
    }
}
