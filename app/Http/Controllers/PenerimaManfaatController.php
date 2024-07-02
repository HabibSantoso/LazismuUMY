<?php

namespace App\Http\Controllers;

use App\Models\PenerimaManfaat;
use Illuminate\Http\Request;

class PenerimaManfaatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penerimaManfaats = PenerimaManfaat::query()
            ->with('lokasi')
            ->paginate(10);

        return view('penerimamanfaat.index', compact('penerimaManfaats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('penerimamanfaat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lembaga' => 'nullable|numeric',
            'pria' => 'nullable|numeric',
            'wanita' => 'nullable|numeric',
        ]);

        PenerimaManfaat::create([
            'lembaga_count' => $request->lembaga,
            'male_count' => $request->pria,
            'female_count' => $request->wanita,
        ]);

        return redirect()->route('penerimamanfaat.index')->with('success', 'Penerima Manfaat created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PenerimaManfaat $penerimaManfaat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenerimaManfaat $penerimamanfaat)
    {
        return view('penerimamanfaat.edit', compact('penerimamanfaat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenerimaManfaat $penerimamanfaat)
    {
        $request->validate([
            'lembaga' => 'nullable|numeric',
            'pria' => 'nullable|numeric',
            'wanita' => 'nullable|numeric',
        ]);

        $penerimamanfaat->update([
            'lembaga_count' => $request->lembaga,
            'male_count' => $request->pria,
            'female_count' => $request->wanita,
        ]);

        return redirect()->route('penerimamanfaat.index')->with('success', 'Penerima Manfaat edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenerimaManfaat $penerimamanfaat)
    {
        $penerimamanfaat->delete();

        return redirect()
            ->route('penerimamanfaat.index')
            ->with('success', 'Penerima Manfaat deleted successfully!');
    }
}
