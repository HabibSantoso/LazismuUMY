<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahuns = Tahun::query()
            ->paginate(10);

        return view('tahun.index', compact('tahuns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahun = Tahun::query()->get();

        return view('tahun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|max:4',

        ]);
        //dd($request);

        Tahun::create([
            'name' => $request->tahun,
        ]);

        return redirect()->route('tahun.index')->with('success', 'Tahun created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tahun $tahun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tahun $tahun)
    {
        //dd($tahun);
        return view('tahun.edit', compact('tahun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tahun $tahun)
    {
        $request->validate([
            'name' => 'required|max:4'

        ]);
        //dd($request);

        $tahun->update([
            'name' =>$request->name,

        ]);

        return redirect()->route('tahun.index')->with('success', 'Tahun edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tahun $tahun)
    {
        $tahun->delete();

        return redirect()
           ->route('tahun.index')
           ->with('success', 'Tahun deleted successfully!');
    }
}
