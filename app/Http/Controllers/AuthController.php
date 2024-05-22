<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();
        if ($user != null) {
            $passwordMatch = Hash::check($password, $user->password);
            if ($passwordMatch) {

                Auth::login($user);
                if ($user->type == UserType::COLLECTOR->value) {
                    return redirect("/collector");
                } elseif ($user->role == UserType::DONOR->value) {
                    return redirect("/donor");
                } else {
                    return redirect('/')->withErrors(['msg' => 'Invalid user type']);
                }
            } else {
                return redirect("/")->withErrors(['msg' => 'Incorect password']);
            }
        } else {
            return redirect('/')->withErrors(['msg' => 'Incorect email and password']);
        }
    }

    //TODO: test well the working of logout()
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect(route("login"));
        } else {
            return back();
        }
    }
}
