<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcement = Announcement::latest()->first();
        return view('collector.announcement', ["data" => $announcement]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnouncementRequest $request)
    {
        $announcement = Announcement::find($request->input('id'));
        if ($announcement) {
            $announcement->message = $request->input('description');
            $announcement->update();
            session()->flash('success', 'Announcement had been updated successfully.');
            return redirect('/collector/announcement');
        } else {
            return redirect('/collector/announcement')->withErrors('Announcement not found');
        }
    }
}
