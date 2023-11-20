<?php

namespace App\Http\Controllers;

use App\Models\BusStop;
use App\Models\Location;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BusstopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bus_stops = BusStop::all();

        return view('bus_stops.index',compact('bus_stops'));
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
        return view('bus_stops.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            BusStop::create([
                'location_id' => $request->input('location'),
                'name' => $request->input('name'),
            ]);
            $message = "Successfully inserted";
        } catch (QueryException $e) {
            $message = "Failed to insert";
        }
        return redirect()->route('bus_stops.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(BusStop $busstop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusStop $bus_stop)
    {
        return view('bus_stops.edit', compact('bus_stop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusStop $bus_stop)
    {
        try {
            $bus_stop->update([
                'location_id' => $request->input('location'),
                'name' => $request->input('name'),
            ]);
            $message = "Successfully Modified";
        } catch (QueryException $e) {
            $message = "An error occurred trying to edit the data";
        }
        return redirect()->route('bus_stops.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusStop $bus_stop)
    {
        try {
            $bus_stop->delete();
            return redirect()->route('bus_stops.index');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] === 1451) {
                return redirect()->route('bus_stops.index')->with('message', 'The Bus Stop data is currently in use, unable to remove');
            } else {
                return redirect()->route('bus_stops.index')->with('message', 'An error occurred while processing your request.');
            }
        }
    }
}
