<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\RailRoute;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RailRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $railroutes = RailRoute::all();

        return view('rail_routes.index',compact('railroutes'));
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
        return view('rail_routes.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            RailRoute::create([
                'source_id' => $request->input('source_id'),
                'destination_id' => $request->input('destination_id'),
                'fare' => $request->input('fare'),
            ]);
            $message = "Successfully inserted";
        } catch (QueryException $e) {
            $message = "Failed to insert";
        }
        return redirect()->route('rail_routes.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(RailRoute $railroute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RailRoute $railroute)
    {
        $locations = Location::select('id', 'country', 'region', 'city')->get()->map(function($location) {
            return [
                'id' => $location->id,
                'name' => "{$location->country}, {$location->region}, {$location->city}"
            ];
        })->pluck('name', 'id');
        return view('railroutes.edit', compact('railroute', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RailRoute $railroute)
    {
        try {
            $railroute->update([
                'source_id' => $request->input('source_id'),
                'destination_id' => $request->input('destination_id'),
                'fare' => $request->input('fare'),
            ]);
            $message = "Successfully Modified";
        } catch (QueryException $e) {
            $message = "An error occurred trying to edit the data";
        }
        return redirect()->route('railroutes.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RailRoute $railRoute)
    {
        //
    }
}
