<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function collectorDashboard()
    {
        return view('collector.dashboard');
    }

    public function donorDashboard()
    {
        return view('donor.dashboard');
    }
}
