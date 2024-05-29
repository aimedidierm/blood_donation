<?php

namespace App\Http\Controllers;

use Aimedidierm\IntouchSms\SmsSimple;
use App\Http\Requests\DonationRequestApproveRequest;
use App\Http\Requests\DonationRequestRequest;
use App\Models\DonationApproved;
use App\Models\DonationRequest;
use App\Models\Province;
use App\Models\User;
use App\Services\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $query = DonationRequest::query();

        if ($request->filled('province')) {
            $query->where('province', $request->province);
        }
        if ($request->filled('district')) {
            $query->where('district', $request->district);
        }
        if ($request->filled('sector')) {
            $query->where('sector', $request->sector);
        }
        if ($request->filled('cell')) {
            $query->where('cell', $request->cell);
        }

        $data = $query->with('user.details')->get();
        $data = $query->get();

        $address = Province::get();
        $address->load('districts.sectors.cells');

        return view('collector.donations_request', compact('data', 'address'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DonationRequestRequest $request)
    {
        $donationRequest = new DonationRequest();
        $donationRequest->province = $request->input('province');
        $donationRequest->district = $request->input('district');
        $donationRequest->sector = $request->input('sector');
        $donationRequest->cell = $request->input('cell');
        $donationRequest->user_id = Auth::id();
        $donationRequest->save();

        $names = Auth::user()->name;
        $message = "Hello $names, Your blood donation request send in $donationRequest->province Province, $donationRequest->district District, $donationRequest->sector Sector, $donationRequest->cell Cell, you can wait to be approved and get appointment.";
        $sms = new Sms();
        $sms->recipients(Auth::user()->phone)
            ->message($message)
            ->sender(env('SMS_SENDERID'))
            ->username(env('SMS_USERNAME'))
            ->password(env('SMS_PASSWORD'))
            ->apiUrl("www.intouchsms.co.rw/api/sendsms/.json")
            ->callBackUrl("");
        $sms->send();

        session()->flash('success', 'Your blood donation request has been submitted successfully.');
        return redirect('/donor/donations');
    }

    public function approve(DonationRequestApproveRequest $request)
    {
        foreach ($request->donations as $donation) {
            $donation;
            $user = User::find($donation['user_id']);
            $donationApproved = new DonationApproved();
            $donationApproved->date = $request->input('date');
            $donationApproved->user_id = $donation['user_id'];
            $donationApproved->province = $donation['province'];
            $donationApproved->district = $donation['district'];
            $donationApproved->sector = $donation['sector'];
            $donationApproved->cell = $donation['cell'];
            $donationApproved->save();

            $request = DonationRequest::find($donation['id']);
            $request->delete();
            $message = "Hello $user->name, Your blood donation request approved in $donationApproved->province Province, $donationApproved->district District, $donationApproved->sector Sector, $donationApproved->cell Cell, you must be there on $request->input('date').";
            $sms = new Sms();
            $sms->recipients($donation['user_phone'])
                ->message($message)
                ->sender(env('SMS_SENDERID'))
                ->username(env('SMS_USERNAME'))
                ->password(env('SMS_PASSWORD'))
                ->apiUrl("www.intouchsms.co.rw/api/sendsms/.json")
                ->callBackUrl("");
            $sms->send();
        }

        session()->flash('success', 'A Donor blood donation request had been approved.');
        return redirect('/collector/donations-approved');
    }

    public function donor()
    {
        $donations = DonationRequest::latest()->where('user_id', Auth::id())->get();
        return view('donor.donation_requests', ['data' => $donations]);
    }

    public function destroy(string $id)
    {
        $donation = DonationRequest::find($id);
        if ($donation) {
            $donation->delete();
            session()->flash('success', 'Your donation request had been deleted.');
            return redirect('/donor/donations-requests');
        } else {
            return redirect('/donor/donations-requests')->withErrors('Donation not found');
        }
    }
}
