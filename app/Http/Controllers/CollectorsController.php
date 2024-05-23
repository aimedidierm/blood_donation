<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Requests\CollectorRequest;
use App\Models\User;

class CollectorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collectors = User::latest()->where('type', UserType::COLLECTOR->value)->get();
        return view('collector.collectors', ['data' => $collectors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CollectorRequest $request)
    {
        $collector = new User();
        $collector->name = $request->input('names');
        $collector->email = $request->input('email');
        $collector->phone = $request->input('phone');
        $collector->type = UserType::COLLECTOR->value;
        $collector->password = bcrypt('password');
        $collector->save();
        return redirect('/collector/collectors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $collector = User::find($id);

        if ($collector) {
            $collector->delete();
            return redirect('/collector/collectors');
        } else {
            return redirect('/collector/collectors')->withErrors('Collector account not found');
        }
    }
}
