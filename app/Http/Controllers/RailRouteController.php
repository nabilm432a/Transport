<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\RailRoute;
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
        RailRoute::create([
            'source_id' => $request->input('source_id'),
            'destination_id' => $request->input('destination_id'),
            'fare' => $request->input('fare'),
        ]);
        return redirect()->route('rail_routes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(RailRoute $railRoute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RailRoute $railRoute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RailRoute $railRoute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RailRoute $railRoute)
    {
        //
    }
}
