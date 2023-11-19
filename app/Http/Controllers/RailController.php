<?php

namespace App\Http\Controllers;

use App\Models\Rail;
use Illuminate\Http\Request;

class RailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rails = Rail::all();

        return view('rails.index',compact('rails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Rail::create([
            'license_number' => $request->input('license_number'),
            'capacity' => $request->input('capacity'),
            'sleeper_capacity' => $request->input('sleeper_capacity'),
        ]);
        return redirect()->route('rails.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rail $rail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rail $rail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rail $rail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rail $rail)
    {
        //
    }
}
