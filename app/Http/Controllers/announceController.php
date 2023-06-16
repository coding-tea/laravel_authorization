<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use Illuminate\Http\Request;

class announceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announces = Announce::all();
        return view('announce.index', compact('announces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('announce.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'description' => 'required|string',
            'ville' => 'required|string',
            'superficie' => 'required|numeric|min:0',
            'prix' => 'required|numeric|min:0',
            'neuf' => 'required|numeric|min:0',
        ]);

        $image_name = null;
        if($request->image)
        {
            $image_name = time() . '.' . $request->image->extension();
            $request->image->storeAs('image', $image_name);
        }

        Announce::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'ville' => $request->ville,
            'type' => $request->type,
            'superficie' => $request->superficie,
            'prix' => $request->prix,
            'neuf' => $request->neuf,
            'image' => $image_name
        ]);

        return redirect()->route('announces.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Announce $announce)
    {
        return view('announce.show', compact($announce));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announce $announce)
    {
        return view('announce.edit', compact('announce'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announce $announce)
    {
        $request->validate([
            'titre' => 'required|alpha',
            'description' => 'required|alpha',
            'ville' => 'required|alpha',
            'type' => 'required|alpha',
            'superficie' => 'required|numeric|min:0',
            'prix' => 'required|numeric|min:0',
            'neuf' => 'required|numeric|min:0',
            'image' => 'image'
        ]);
        $announce->update($request->all());
        return redirect()->route('announces.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announce $announce)
    {
        $announce->delete();
        return redirect()->route('announces.index');
    }
}
