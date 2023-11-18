<?php

namespace App\Http\Controllers;

use App\Models\Airplane;
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
        Airplane::create([
           'license_number' => $request->input('license_number'),
           'capacity' => $request->input('capacity'),
           'model' => $request->input('model'),
        ]);
        return redirect()->route('airplanes.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Airplane $airplane)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airplane $airplane)
    {
        //
    }
}
