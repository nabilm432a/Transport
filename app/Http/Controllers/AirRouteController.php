<?php

namespace App\Http\Controllers;

use App\Models\AirRoute;
use App\Models\Location;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AirRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airroutes = AirRoute::all();

        return view('air_routes.index',compact('airroutes'));
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
        return view('air_routes.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            AirRoute::create([
                'source_id' => $request->input('source_id'),
                'destination_id' => $request->input('destination_id'),
                'fare' => $request->input('fare'),
            ]);
            $message = "Successfully inserted";
        } catch (QueryException $e) {
            $message = "Failed to insert";
        }

        return redirect()->route('air_routes.index')->with('message',$message);
    }

    /**
     * Display the specified resource.
     */
    public function show(AirRoute $airRoute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AirRoute $airroute)
    {
        $locations = Location::select('id', 'country', 'region', 'city')->get()->map(function($location) {
            return [
                'id' => $location->id,
                'name' => "{$location->country}, {$location->region}, {$location->city}"
            ];
        })->pluck('name', 'id');
        return view('airroutes.edit', compact('airroute', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AirRoute $airroute)
    {
        try {
            $airroute->update([
                'source_id' => $request->input('source_id'),
                'destination_id' => $request->input('destination_id'),
                'fare' => $request->input('fare'),
            ]);
            $message = "Successfully Modified";
        } catch (QueryException $e) {
            $message = "An error occurred trying to edit the data";
        }
        return redirect()->route('airroutes.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AirRoute $airRoute)
    {
        //
    }
}
