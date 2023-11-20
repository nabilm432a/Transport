<?php

namespace App\Http\Controllers;

use App\Models\Rail;
use Illuminate\Database\QueryException;
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
        try {
            Rail::create([
                'license_number' => $request->input('license_number'),
                'capacity' => $request->input('capacity'),
                'sleeper_capacity' => $request->input('sleeper_capacity'),
            ]);
            $message = "Successfully inserted";
        } catch (QueryException $e) {
            $message = "Failed to insert";
        }
        return redirect()->route('rails.index')->with('message', $message);
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
        return view('rails.edit', compact('rail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rail $rail)
    {
        try {
            $rail->update([
                'license_number' => $request->input('license_number'),
                'capacity' => $request->input('capacity'),
                'sleeper_capacity' => $request->input('sleeper_capacity'),
            ]);
            $message = "Successfully Modified";
        } catch (QueryException $e) {
            $message = "An error occurred trying to edit the data";
        }
        return redirect()->route('rails.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rail $rail)
    {
        try {
            $rail->delete();
            return redirect()->route('rails.index');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] === 1451) {
                return redirect()->route('rails.index')->with('message', 'The Train data is currently in use, unable to remove');
            } else {
                return redirect()->route('rails.index')->with('message', 'An error occurred while processing your request.');
            }
        }
    }
}
