<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kabupatens = Kabupaten::query()
            ->paginate(10);

        return view('kabupaten.index', compact('kabupatens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kabupaten = Kabupaten::query()->get();

        return view('kabupaten.create');
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

        Kabupaten::create([
            'name' => $request->name,
        ]);

        return redirect()->route('kabupaten.index')->with('success', 'Kabupaten created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kabupaten $kabupaten)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kabupaten $kabupaten)
    {
        //dd($kabupaten);
        return view('kabupaten.edit', compact('kabupaten'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kabupaten $kabupaten)
    {
        $request->validate([
            'name' => 'required|max:40'

        ]);
        //dd($request);

        $kabupaten->update([
            'name' =>$request->name,

        ]);

        return redirect()->route('kabupaten.index')->with('success', 'Kabupaten created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kabupaten $kabupaten)
    {
        $kabupaten->delete();

        return redirect()
           ->route('kabupaten.index')
           ->with('success', 'Kabupaten deleted successfully!');
    }
}
