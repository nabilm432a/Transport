<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;


class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notices = Notice::all();

        return view('Notices.index',compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Notices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Notice::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('Notices.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notice $notice)
    {
        return view('Notices.show', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice)
    {
        return view('Notices.edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notice $notice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $Notice)
    {
        try {
            $Notice->delete();
            return redirect()->route('Notices.index');
        } catch(QueryException) {
            return redirect()->route('Notices.index')->with('error', 'An error occurred while processing your request.');
        }
    }
}
