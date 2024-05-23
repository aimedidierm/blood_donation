<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoryRequest;
use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stories = Story::latest()->get();
        return view('collector.explore', ['data' => $stories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoryRequest $request)
    {
        $showName = false;

        if ($request->input('shownames') == 'yes') {
            $showName = true;
        }

        $story = new Story();
        $story->name = $request->input('names');
        $story->message = $request->input('description');
        $story->show_name = $showName;
        $story->save();
        return redirect('/collector/explore');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $story = Story::find($id);

        if ($story) {
            $story->delete();
            return redirect('/collector/explore');
        } else {
            return redirect('/collector/explore')->withErrors('Story not found');
        }
    }
}
