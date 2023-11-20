<?php

namespace App\Http\Controllers;

use App\Models\Airplane;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AirplaneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airplanes = Airplane::all();

        return view('airplanes.index',compact('airplanes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('airplanes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Airplane::create([
                'license_number' => $request->input('license_number'),
                'capacity' => $request->input('capacity'),
                'model' => $request->input('model'),
            ]);
            $message = "Successfully inserted";
        } catch (QueryException $e) {

            $message = "Failed to insert";
        }
        return redirect()->route('airplanes.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Airplane $airplane)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Airplane $airplane)
    {
        return view('airplanes.edit', compact('airplane'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Airplane $airplane)
    {
        try {
            $airplane->update([
                'license_number' => $request->input('license_number'),
                'capacity' => $request->input('capacity'),
                'model' => $request->input('model'),
            ]);
            $message = "Successfully Modified";
        } catch (QueryException $e) {
            $message = "An error occurred trying to edit the data";
        }
        return redirect()->route('airplanes.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airplane $airplane)
    {
        try {
            $airplane->delete();
            return redirect()->route('airplanes.index');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] === 1451) {
                return redirect()->route('airplanes.index')->with('message', 'The Airplane data is currently in use, unable to remove');
            } else {
                return redirect()->route('airplanes.index')->with('message', 'An error occurred while processing your request.');
            }
        }
    }
}
