<?php

namespace App\Http\Controllers;

use App\Models\AirRoute;
use App\Models\Location;
use Illuminate\Http\Request;

class AirRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airroutes = AirRoute::all();

        return view('airroutes.index',compact('airroutes'));
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
        })->pluck('id', 'name');
        return view('airroutes.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(AirRoute $airRoute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AirRoute $airRoute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AirRoute $airRoute)
    {
        //
    }
}
