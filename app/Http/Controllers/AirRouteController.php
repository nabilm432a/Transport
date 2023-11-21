<?php

namespace App\Http\Controllers;

use App\Models\Airport;
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
        $air_routes = AirRoute::all();

        return view('air_routes.index',compact('air_routes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $airports = Airport::all();
        return view('air_routes.create', compact('airports'));
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
            $message = "Failed to insert, Error: " . $e->getMessage();
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
    public function edit(AirRoute $air_route)
    {
        $locations = Location::select('id', 'country', 'region', 'city')->get()->map(function($location) {
            return [
                'id' => $location->id,
                'name' => "{$location->country}, {$location->region}, {$location->city}"
            ];
        })->pluck('name', 'id');
        return view('air_routes.edit', compact('air_route', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AirRoute $air_route)
    {
        try {
            $air_route->update([
                'source_id' => $request->input('source_id'),
                'destination_id' => $request->input('destination_id'),
                'fare' => $request->input('fare'),
            ]);
            $message = "Successfully Modified";
        } catch (QueryException $e) {
            $message = "An error occurred trying to edit the data";
        }
        return redirect()->route('air_routes.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AirRoute $air_route)
    {
        try {
            $air_route->delete();
            return redirect()->route('air_routes.index');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] === 1451) {
                return redirect()->route('air_routes.index')->with('message', 'The Route is currently required elsewhere, unable to remove');
            } else {
                return redirect()->route('air_routes.index')->with('message', 'An error occurred while processing your request.');
            }
        }
    }
}
