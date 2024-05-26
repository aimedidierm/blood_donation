<?php

namespace App\Http\Controllers;

use App\Models\DonationApproved;
use Illuminate\Http\Request;

class DonationApprovedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donations = DonationApproved::latest()->get();
        $donations->load('user');
        return view('collector.donations_approved', ['data' => $donations]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DonationApproved $donationApproved)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DonationApproved $donationApproved)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DonationApproved $donationApproved)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DonationApproved $donationApproved)
    {
        //
    }
}
