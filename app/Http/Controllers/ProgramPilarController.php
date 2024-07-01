<?php

namespace App\Http\Controllers;

use App\Models\Pilar;
use App\Models\ProgramPilar;
use Illuminate\Http\Request;

class ProgramPilarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pilars = Pilar::query()->get();
        $programPilars = ProgramPilar::query()
            ->when($request->pilar, function ($query, $pilar) {
                $query->where('pilar_id', '=', $pilar);
            })
            ->paginate(10);

        return view('programpilar.index', compact('programPilars', 'pilars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pilars = Pilar::query()->get();

        return view('programpilar.create', compact('pilars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:35',
            'pilar_id' => 'required|exists:pilars,id'
        ]);
        //dd($request);

        ProgramPilar::create([
            'name' => $request->name,
            'pilar_id' =>$request->pilar_id,
        ]);

        return redirect()->route('programpilar.index')->with('success', 'Program pilar created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgramPilar $programPilar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgramPilar $programpilar)
    {
        $pilars = Pilar::query()->get();

        //dd($programPilar);
        return view('programpilar.edit', compact('programpilar', 'pilars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgramPilar $programpilar)
    {
        $request->validate([
            'name' => 'required|max:35',
            'pilar_id' => 'required|exists:pilars,id'

        ]);
        //dd($request);

        $programpilar->update([
            'name' =>$request->name,
            'pilar_id' =>$request->pilar_id,

        ]);

        return redirect()->route('programpilar.index')->with('success', 'Program Pilar created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramPilar $programpilar)
    {
        $programpilar->delete();

        return redirect()
           ->route('programpilar.index')
           ->with('success', 'Program Pilar deleted successfully!');
    }
}
