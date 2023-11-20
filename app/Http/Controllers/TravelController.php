<?php

namespace App\Http\Controllers;

use App\Models\Airplane;
use App\Models\Bus;
use App\Models\Rail;
use App\Models\Travel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travels = Travel::all();
        return view('travels.index', compact('travels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('travels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = [
                'departure_time' => $request->input('departure_time'),
                'arrival_time' => $request->input('arrival_time'),
                'transport_mode' => $request->input('transport_mode'),
            ];

            switch ($request->input('transport_mode')) {
                case 'bus':
                    $bus = Bus::findOrFail($request->input('bus_id'));
                    $data['bus_route_id'] = $request->input('bus_route_id');
                    $data['departure_bus_stop_id'] = $request->input('departure_bus_stop_id');
                    $data['arrival_bus_stop_id'] = $request->input('arrival_bus_stop_id');
                    $data['bus_id'] = $bus->id;
                    $data['available_seats'] = $bus->capacity;
                    break;
                case 'airplane':
                    $airplane = Airplane::findOrFail($request->input('airplane_id'));
                    $data['air_route_id'] = $request->input('air_route_id');
                    $data['departure_airport_id'] = $request->input('departure_airport_id');
                    $data['arrival_airport_id'] = $request->input('arrival_airport_id');
                    $data['airplane_id'] = $airplane->id;
                    $data['available_seats'] = $airplane->capacity;
                    break;
                case 'rail':
                    $rail = Rail::findOrFail($request->input('rail_id'));
                    $data['rail_route_id'] = $request->input('rail_route_id');
                    $data['departure_railstation_id'] = $request->input('departure_railstation_id');
                    $data['arrival_railstation_id'] = $request->input('arrival_railstation_id');
                    $data['rail_id'] = $rail->id;
                    $data['available_seats'] = $rail->capacity;
                    break;

                default:

                    break;
            }
            Travel::create($data);
            return redirect()->route('travels.index')->with('message', 'A travel option has been created');
        } catch (QueryException $e) {
            return redirect()->route('travels.create')->with('message', 'Failed to create');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $travel)
    {
        return view('travels.edit', compact('travel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Travel $travel)
    {
        $travel->update([
            'departure_time' => $request->input('departure_time'),
            'arrival_time' => $request->input('arrival_time'),
        ]);

        return redirect()->route('travels.index')->with('message', 'Travel option has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel)
    {
        try {
            $travel->delete();
            return redirect()->route('travels.index');
        } catch (QueryException $e) {
            return redirect()->route('travels.index')->with('message', 'An error occurred while processing your request.');
            }
    }
}
