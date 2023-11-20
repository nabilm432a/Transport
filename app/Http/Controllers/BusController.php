<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buses = Bus::all();

        return view('buses.index',compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Bus::create([
                'license_number' => $request->input('license_number'),
                'capacity' => $request->input('capacity'),
                'model' => $request->input('model'),
            ]);
            $message = "Successfully inserted";
        } catch (QueryException $e) {
            $message = "Failed to insert";
        }
        return redirect()->route('buses.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bus $bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bus $bus)
    {
        return view('buses.edit', compact('bus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bus $bus)
    {
        try {
            $bus->update([
                'license_number' => $request->input('license_number'),
                'capacity' => $request->input('capacity'),
                'model' => $request->input('model'),
            ]);
            $message = "Successfully Modified";
        } catch (QueryException $e) {
            $message = "An error occurred trying to edit the data";
        }
        return redirect()->route('buses.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bus $bus)
    {
        try {
            $bus->delete();
            return redirect()->route('buses.index');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] === 1451) {
                return redirect()->route('buses.index')->with('message', 'The Bus data is currently in use, unable to remove');
            } else {
                return redirect()->route('buses.index')->with('message', 'An error occurred while processing your request.');
            }
        }
    }
}
