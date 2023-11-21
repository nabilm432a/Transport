<?php

namespace App\Http\Controllers;

use App\Models\BusRoute;
use App\Models\BusStop;
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
        $bus_routes = BusRoute::all();

        return view('bus_routes.index',compact('bus_routes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bus_stops = BusStop::all();
        return view('bus_routes.create', compact('bus_stops'));
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
    public function edit(BusRoute $bus_route)
    {
        $locations = Location::select('id', 'country', 'region', 'city')->get()->map(function($location) {
            return [
                'id' => $location->id,
                'name' => "{$location->country}, {$location->region}, {$location->city}"
            ];
        })->pluck('name', 'id');
        return view('bus_routes.edit', compact('bus_route', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusRoute $bus_route)
    {
        try {
            $bus_route->update([
                'source_id' => $request->input('source_id'),
                'destination_id' => $request->input('destination_id'),
                'fare' => $request->input('fare'),
            ]);
            $message = "Successfully Modified";
        } catch (QueryException $e) {
            $message = "An error occurred trying to edit the data";
        }
        return redirect()->route('bus_routes.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusRoute $bus_route)
    {
        try {
            $bus_route->delete();
            return redirect()->route('bus_routes.index');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] === 1451) {
                return redirect()->route('bus_routes.index')->with('message', 'The Route is currently required elsewhere, unable to remove');
            } else {
                return redirect()->route('bus_routes.index')->with('message', 'An error occurred while processing your request.');
            }
        }
    }
}
