<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register () {
        if (!auth()->user()) {
            return view("users.register");
        }

        return redirect("/")->with("message", "You must be logged out in order to register");
    }

    public function store (Request $request) {
        if (!auth()->user()) {
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

        return redirect("/")->with("message", "You must be logged out in order to register");
    }

    public function login () {
        if (!auth()->user()) {
            return view("users.login");
        }
        return redirect("/")->with("message", "You are already logged in");
    }

    public function authenticate (Request $request) {
        if (!auth()->user()) {
            $formFields = $request->validate([
                "email" => "required",
                "password" => "required"
            ]);
    
            if (auth()->attempt($formFields)) {
                $request->session()->regenerate();
                return redirect("/")->with("message", "You are logged in!");
            }
        }

        return redirect("/")->with("message", "You are already logged in");
    }

    public function logout (Request $request) {
        if (auth()->user()) {
            auth()->logout();

            $request->session()->invalidate();
            $request->session()->regenerate();

            return redirect("/")->with("message", "Logged out!");
        }

        return redirect("/")->with("message", "You must be logged in, in order to logout!");
    }
}
