<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Requests\DonorRequest;
use App\Models\Donation;
use App\Models\DonorDetails;
use App\Models\User;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donors = User::latest()->where('type', UserType::DONOR->value)->get();
        $donors->load('details');
        return view('collector.donors', ['data' => $donors]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DonorRequest $request)
    {
        $donor = User::find($request->input('userId'));
        $donorDetails = DonorDetails::where('user_id', $donor->id)->first();
        $singleDonorDetails = DonorDetails::find($donorDetails->id);
        $singleDonorDetails->blood_type = $request->input('editBlood');
        $singleDonorDetails->update();
        return redirect('/collector/donors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donor = User::find($id);

        if ($donor) {
            $donorDetails = DonorDetails::where('user_id', $id)->first();
            if ($donorDetails) {
                $singleDonorDetails = DonorDetails::find($donorDetails->id);
                $singleDonorDetails->delete();
            }
            $donorDonations = Donation::where('user_id', $id)->get();
            if ($donorDonations) {
                foreach ($donorDonations as $value) {
                    $value->delete();
                }
            }
            $donor->delete();
            return redirect('/collector/donors');
        } else {
            return redirect('/collector/donors')->withErrors('Donor account not found');
        }
    }

    public function verify(Request $request)
    {
        $sn = $request->input('sn');
        $donor = DonorDetails::where('sn', $sn)->first();
        if (!$donor) {
            return redirect(route('login'))->withErrors('Donor not found');
        }
        $donor->load('user.donations');
        return view('verify', ['data' => $donor]);
    }
}
