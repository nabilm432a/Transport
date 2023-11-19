<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Railstation;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RailstationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $railstations = Railstation::all();

        return view('railstations.index',compact('railstations'));
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
        return view('railstations.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Railstation::create([
                'location_id' => $request->input('location'),
                'name' => $request->input('name'),
                'contact' => $request->input('contact'),
            ]);
            $message = "Successfully inserted";
        } catch (QueryException $e) {
            $message = "Failed to insert";
        }
        return redirect()->route('railstations.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Railstation $railstation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Railstation $railstation)
    {
        return view('railstations.edit', compact('railstation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Railstation $railstation)
    {
        try {
            $railstation->update([
                'location_id' => $request->input('location'),
                'name' => $request->input('name'),
                'contact' => $request->input('contact'),
            ]);
            $message = "Successfully Modified";
        } catch (QueryException $e) {
            $message = "An error occurred trying to edit the data";
        }
        return redirect()->route('railstaions.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Railstation $railstation)
    {
        //
    }
}
