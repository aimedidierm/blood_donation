<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\DonorDetails;
use App\Models\User;
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
                    return redirect("/collector/settings");
                } elseif ($user->type == UserType::DONOR->value) {
                    return redirect("/");
                } else {
                    return redirect(route('login'))->withErrors(['msg' => 'Invalid user type']);
                }
            } else {
                return redirect(route('login'))->withErrors(['msg' => 'Incorect password']);
            }
        } else {
            return redirect(route('login'))->withErrors(['msg' => 'Incorect email and password']);
        }
    }

    //TODO: test well the working of logout()
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect('/');
        } else {
            return back();
        }
    }

    public function register(RegisterRequest $request)
    {
        $donor = new User();
        $donor->name = $request->input('name');
        $donor->phone = $request->input('phone');
        $donor->email = $request->input('email');
        $donor->type = UserType::DONOR->value;
        $donor->password = bcrypt($request->input('password'));
        $donor->save();

        $randomCode = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $exists = DonorDetails::where('sn', $randomCode)->exists();
        while ($exists) {
            $randomCode = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $exists = DonorDetails::where('sn', $randomCode)->exists();
        }

        $donorDetails = new DonorDetails();
        $donorDetails->dob = $request->input('dob');
        $donorDetails->sn = $randomCode;
        $donorDetails->sex = $request->input('gender');
        $donorDetails->kg = $request->input('kg');
        $donorDetails->times = $request->input('times');
        $donorDetails->health = $request->input('health');
        $donorDetails->province = $request->input('province');
        $donorDetails->district = $request->input('district');
        $donorDetails->sector = $request->input('sector');
        $donorDetails->cell = $request->input('cell');
        $donorDetails->user_id = $donor->id;
        $donorDetails->save();

        return redirect('/');
    }

    public function profile(ProfileRequest $request)
    {
        $user = User::find(Auth::id());
        $user->phone = $request->input('phone');
        $user->password = bcrypt($request->input('password'));
        $user->update();

        if (Auth::user()->type == UserType::COLLECTOR->value) {
            return redirect('/collector/donations-request');
        } else {
            return redirect('/donations');
        }
    }
}
