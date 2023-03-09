<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register () {
        return view("users.register");
    }

    public function store (Request $request) {
        $formFields = $request->validate([
            "name" => "required",
            "email" => ["required", Rule::unique("users", "email")],
            "password" => "required|min:6|confirmed"
        ]);

        $formFields["password"] = bcrypt($formFields["password"]);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect("/")->with("message", "Account created successfully!");
    }

    public function login () {
        return view("users.login");
    }

    public function authenticate (Request $request) {
        $formFields = $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect("/")->with("message", "You are logged in!");
        }
    }

    public function logout (Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect("/")->with("message", "Logged out!");
    }
}
