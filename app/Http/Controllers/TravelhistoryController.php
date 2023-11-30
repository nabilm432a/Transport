<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use App\Models\Travelhistory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TravelhistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travels = Travelhistory::where('user_id', auth()->id())->get();
        return view('travel_histories.index', compact('travels'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $transport_mode = $request->input('transport_mode');

        $travels = Travel::where('transport_mode', $transport_mode)->get();

        return view('travelhistories.create', compact('travels','transport_mode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $u_id = auth()->id();
        $transport_mode = $request->input('transport_mode');
        $t_id = $request->input('travel_id');
        $travel = Travel::where('id', $t_id)->first();
        $price = 0;
        if($transport_mode == 'bus') {
            $price = $travel->busRoute->fare;
        }
        elseif($transport_mode == 'airplane') {
            $price = $travel->airRoute->fare;
        }
        elseif($transport_mode == 'rail') {
            $price = $travel->railRoute->fare;
        }
        try {
            Travelhistory::create([
                'user_id' => $u_id,
                'travel_id' => $t_id,
                'final_price' => $price,
                ]);
            $travel->increment('booked_seats');

            $travel->save();
        } catch(QueryException $e) {
            $message = 'Unable to book';
        }

        return redirect()->to('dashboard');


    }
    public function showForm()
    {
        return view('travelhistories.mode');
    }

    /**
     * Display the specified resource.
     */
    public function show(Travelhistory $travelhistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travelhistory $travelhistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Travelhistory $travelhistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travelhistory $travelhistory)
    {
        //
    }
}
