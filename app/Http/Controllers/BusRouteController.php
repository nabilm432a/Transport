<?php

namespace App\Http\Controllers;

use App\Models\BusRoute;
use Illuminate\Http\Request;

class BusRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $busroutes = BusRoute::all();

        return view('busroutes.index',compact('busroutes'));
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
    public function show(BusRoute $busRoute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusRoute $busRoute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusRoute $busRoute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusRoute $busRoute)
    {
        //
    }
}
