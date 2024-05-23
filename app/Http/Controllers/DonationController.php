<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Requests\DonationRequest;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->type == UserType::COLLECTOR->value) {
            $donations = Donation::latest()
                ->get();
            $donations->load('user.details');
            $donors = User::where('type', UserType::DONOR->value)->get();
            return view('collector.donations', ['data' => $donations, 'donors' => $donors]);
        } else {
            $donations = Donation::latest()
                ->where('user_id', Auth::id())
                ->get();
            return view('donor.donations', ['data' => $donations]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DonationRequest $request)
    {
        $donation = new Donation();
        $donation->ml = $request->input('ml');
        $donation->user_id = $request->input('donor');
        $donation->save();
        return redirect('/collector/donations');
    }
}
