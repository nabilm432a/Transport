<?php

namespace App\Http\Controllers;

use App\Models\Railstation;
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
        //
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
    public function show(Railstation $railstation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Railstation $railstation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Railstation $railstation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Railstation $railstation)
    {
        //
    }
}
