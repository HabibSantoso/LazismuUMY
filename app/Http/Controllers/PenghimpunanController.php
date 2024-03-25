<?php

namespace App\Http\Controllers;

use App\Models\Penghimpunan;
use App\Models\ProgramSumber;
use App\Models\SumberDana;
use App\Models\Tahun;
use Illuminate\Http\Request;

class PenghimpunanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penghimpunans = Penghimpunan::query()
            ->with('sumberDana', 'programSumber', 'tahun')
            ->paginate(10);

        return view('penghimpunan.index', compact('penghimpunans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sumberDanas = SumberDana::query()->get();
        $programSumbers = ProgramSumber::query()->get();
        $tahuns = Tahun::query()->get();

        return view('penghimpunan.create', compact('sumberDanas', 'programSumbers', 'tahuns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'uraian' => 'required|max:255',
            'nominal' => 'required|numeric',
            'sumber_dana_id' => 'nullable|exists:sumber_danas,id',
            'program_sumber_id' => 'nullable|exists:program_sumbers,id',
            'tahun_id' => 'nullable|exists:tahuns,id',

        ]);
        //dd($request);

        Penghimpunan::create([
            'tanggal' => $request->tanggal,
            'uraian' => $request->uraian,
            'nominal' => $request->nominal,
            'sumber_dana_id' => $request->sumber_dana_id,
            'program_sumber_id' => $request->program_sumber_id,
            'tahun_id' => $request->tahun_id,

            // 'user_id' => auth()->user()->id,
            // 'title' => $request->title,
        ]);

        return redirect()->route('penghimpunan.index')->with('success', 'Penghimpunan created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penghimpunan $penghimpunan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penghimpunan $penghimpunan)
    {
        $sumberDanas = SumberDana::query()->get();
        $programSumbers = ProgramSumber::query()->get();
        $tahuns = Tahun::query()->get();

        //dd($penghimpunan);
        return view('penghimpunan.edit', compact('penghimpunan', 'sumberDanas', 'programSumbers', 'tahuns'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penghimpunan $penghimpunan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'uraian' => 'required|max:255',
            'nominal' => 'required|numeric',
            'sumber_dana_id' => 'nullable|exists:sumber_danas,id',
            'program_sumber_id' => 'nullable|exists:program_sumbers,id',
            'tahun_id' => 'nullable|exists:tahuns,id',

        ]);
        //dd($request);

        $penghimpunan->update([
            'tanggal' => $request->tanggal,
            'uraian' => $request->uraian,
            'nominal' => $request->nominal,
            'sumber_dana_id' => $request->sumber_dana_id,
            'program_sumber_id' => $request->program_sumber_id,
            'tahun_id' => $request->tahun_id,

            // 'user_id' => auth()->user()->id,
            // 'title' => $request->title,
        ]);

        return redirect()->route('penghimpunan.index')->with('success', 'Penghimpunan created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penghimpunan $penghimpunan)
    {
        //
    }
}
