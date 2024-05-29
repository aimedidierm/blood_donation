<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Requests\DonationRequest;
use App\Models\Donation;
use App\Models\Province;
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
            $address = Province::get();
            $address->load('districts.sectors.cells');
            return view('collector.donations', ['data' => $donations, 'donors' => $donors, 'address' => $address]);
        } else {
            $donations = Donation::latest()
                ->where('user_id', Auth::id())
                ->get();
            $address = Province::get();
            $address->load('districts.sectors.cells');
            return view('donor.donations', ['data' => $donations, 'address'  => $address]);
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
        session()->flash('success', 'The blood donation has been registered successfully.');
        return redirect('/collector/donations');
    }

    public function destroy(string $id)
    {
        $donation = Donation::find($id);

        if ($donation) {
            $donation->delete();
            session()->flash('success', 'The blood donation has been deleted successfully.');
            return redirect('/collector/donations');
        } else {
            return redirect('/collector/donations')->withErrors('Donation not found');
        }
    }
}
