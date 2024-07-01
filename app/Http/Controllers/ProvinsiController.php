<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinsis = Provinsi::query()
            ->paginate(10);

        return view('provinsi.index', compact('provinsis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinsi = Provinsi::query()->get();

        return view('provinsi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:40',

        ]);
        //dd($request);

        Provinsi::create([
            'name' => $request->name,
        ]);

        return redirect()->route('provinsi.index')->with('success', 'Provinsi created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Provinsi $provinsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provinsi $provinsi)
    {
        //dd($provinsi);
        return view('provinsi.edit', compact('provinsi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provinsi $provinsi)
    {
        $request->validate([
            'name' => 'required|max:40'

        ]);
        //dd($request);

        $provinsi->update([
            'name' =>$request->name,

        ]);

        return redirect()->route('provinsi.index')->with('success', 'Provinsi created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provinsi $provinsi)
    {
        $provinsi->delete();

        return redirect()
           ->route('provinsi.index')
           ->with('success', 'Provinsi deleted successfully!');
    }
}
