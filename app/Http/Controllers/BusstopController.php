<?php

namespace App\Http\Controllers;

use App\Models\Busstop;
use App\Models\Location;
use Illuminate\Http\Request;

class BusstopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $busstops = Busstop::all();

        return view('bus_stops.index',compact('busstops'));
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
        Busstop::create([
            'location_id' => $request->input('location'),
            'name' => $request->input('name'),
        ]);
        return redirect()->route('bus_stops.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Busstop $busstop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Busstop $busstop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Busstop $busstop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Busstop $busstop)
    {
        //
    }
}
