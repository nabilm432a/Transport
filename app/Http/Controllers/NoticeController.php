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

        return view('notices.index',compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notices.create');
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
        return redirect()->route('notices.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notice $notice)
    {
        return view('notices.show', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice)
    {
        return view('notices.edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notice $notice)
    {
        try {
            $notice->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);
            $message = "Successfully Modified";
        } catch (QueryException $e) {
            $message = "An error occurred trying to edit the notice";
        }
        return redirect()->route('notices.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $Notice)
    {
        try {
            $Notice->delete();
            return redirect()->route('notices.index');
        } catch(QueryException) {
            return redirect()->route('notices.index')->with('error', 'An error occurred while processing your request.');
        }
    }
}
