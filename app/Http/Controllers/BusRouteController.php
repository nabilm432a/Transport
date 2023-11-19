<?php

namespace App\Http\Controllers;

use App\Models\BusRoute;
use App\Models\Location;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BusRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $busroutes = BusRoute::all();

        return view('bus_routes.index',compact('busroutes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::select('id', 'country', 'region', 'city')->get()->map(function($location) {
            return [
                'id' => $location->id,
                'name' => "{$location->country}, {$location->region}, {$location->city}"
            ];
        })->pluck('name', 'id');
        return view('bus_routes.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            BusRoute::create([
                'source_id' => $request->input('source_id'),
                'destination_id' => $request->input('destination_id'),
                'fare' => $request->input('fare'),
            ]);
            $message = "Successfully inserted";
        } catch (QueryException $e) {
            $message = "Failed to insert";
        }
        return redirect()->route('bus_routes.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(BusRoute $busRoute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusRoute $busroute)
    {
        $locations = Location::select('id', 'country', 'region', 'city')->get()->map(function($location) {
            return [
                'id' => $location->id,
                'name' => "{$location->country}, {$location->region}, {$location->city}"
            ];
        })->pluck('name', 'id');
        return view('busroutes.edit', compact('busroute', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusRoute $busroute)
    {
        try {
            $busroute->update([
                'source_id' => $request->input('source_id'),
                'destination_id' => $request->input('destination_id'),
                'fare' => $request->input('fare'),
            ]);
            $message = "Successfully Modified";
        } catch (QueryException $e) {
            $message = "An error occurred trying to edit the data";
        }
        return redirect()->route('busroutes.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusRoute $busRoute)
    {
        //
    }
}
