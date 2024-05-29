<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Requests\DonorRequest;
use App\Models\Donation;
use App\Models\DonorDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
        session()->flash('success', 'Donor account has been updated successfully.');
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
            session()->flash('success', 'Donor account has been deleted successfully.');
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
            return redirect('/verify')->withErrors('Donor not found');
        }
        $donor->load('user.donations');
        return view('verify', ['data' => $donor]);
    }

    public function report(Request $request)
    {
        $query = Donation::query();

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->input('end_date'));
        }

        if ($request->filled('province')) {
            $query->whereHas('user.details', function ($q) use ($request) {
                $q->where('province', $request->input('province'));
            });
        }

        if ($request->filled('district')) {
            $query->whereHas('user.details', function ($q) use ($request) {
                $q->where('district', $request->input('district'));
            });
        }

        if ($request->filled('sector')) {
            $query->whereHas('user.details', function ($q) use ($request) {
                $q->where('sector', $request->input('sector'));
            });
        }

        if ($request->filled('cell')) {
            $query->whereHas('user.details', function ($q) use ($request) {
                $q->where('cell', $request->input('cell'));
            });
        }

        $donations = $query->get();
        $donations->load('user.details');

        $pdf = Pdf::loadView('collector.donation_report', [
            'data' => $donations,
            'filters' => $request->only(['start_date', 'end_date', 'province', 'district', 'sector', 'cell'])
        ]);

        return $pdf->download('report.pdf');
    }
}
