<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Location;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airports = Airport::all();

        return view('airports.index',compact('airports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::select('id', 'country', 'region', 'city')->get()->map(function($location) {
            return [
                'id' => $location->id,
                'name' => "{$location->city}, {$location->region}, {$location->country}"
            ];
        })->pluck('name', 'id');
        return view('airports.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Airport::create([
                'location_id' => $request->input('location'),
                'name' => $request->input('name'),
                'contact' => $request->input('contact'),
            ]);
            $message = "Successfully inserted";
        } catch (QueryException $e) {
            $message = "Failed to insert";
        }
        return redirect()->route('airports.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Airport $airport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Airport $airport)
    {
        return view('airports.edit', compact('airport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Airport $airport)
    {
        try {
            $airport->update([
                'location_id' => $request->input('location'),
                'name' => $request->input('name'),
                'contact' => $request->input('contact'),
            ]);
            $message = "Successfully Modified";
        } catch (QueryException $e) {
            $message = "An error occurred trying to edit the data";
        }
        return redirect()->route('airports.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airport $airport)
    {
        try {
            $airport->delete();
            return redirect()->route('airports.index');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] === 1451) {
                return redirect()->route('airports.index')->with('message', 'The Airport data is currently in use, unable to remove');
            } else {
                return redirect()->route('airports.index')->with('message', 'An error occurred while processing your request.');
            }
        }
    }
}
