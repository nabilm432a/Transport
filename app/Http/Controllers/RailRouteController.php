<?php

namespace App\Http\Controllers;

use App\Models\RailRoute;
use Illuminate\Http\Request;

class RailRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $railroutes = RailRoute::all();

        return view('railroutes.index',compact('railroutes'));
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
    public function show(RailRoute $railRoute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RailRoute $railRoute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RailRoute $railRoute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RailRoute $railRoute)
    {
        //
    }
}
