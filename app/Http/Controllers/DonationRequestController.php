<?php

namespace App\Http\Controllers;

use Aimedidierm\IntouchSms\SmsSimple;
use App\Http\Requests\DonationRequestRequest;
use App\Models\DonationRequest;
use App\Services\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

        return redirect('/donor/donations');
    }

    /**
     * Display the specified resource.
     */
    public function show(DonationRequest $donationRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DonationRequest $donationRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DonationRequest $donationRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DonationRequest $donationRequest)
    {
        //
    }
}
