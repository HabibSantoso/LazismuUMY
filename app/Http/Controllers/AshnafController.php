<?php

namespace App\Http\Controllers;

use App\Models\Ashnaf;
use Illuminate\Http\Request;

class AshnafController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ashnafs = Ashnaf::query()
            ->paginate(10);

        return view('ashnaf.index', compact('ashnafs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ashnaf = Ashnaf::query()->get();

        return view('ashnaf.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ashnaf' => 'required|max:35',

        ]);
        //dd($request);

        Ashnaf::create([
            'name' => $request->ashnaf,
        ]);

        return redirect()->route('ashnaf.index')->with('success', 'Ashnaf created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ashnaf $ashnaf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ashnaf $ashnaf)
    {

        //dd($ashnaf);
        return view('ashnaf.edit', compact('ashnaf'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ashnaf $ashnaf)
    {
        $request->validate([
            'name' => 'required|max:35'

        ]);
        //dd($request);

        $ashnaf->update([
            'name' =>$request->name,

        ]);

        return redirect()->route('ashnaf.index')->with('success', 'Ashnaf edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ashnaf $ashnaf)
    {
        $ashnaf->delete();

        return redirect()
           ->route('ashnaf.index')
           ->with('success', 'Ashnaf deleted successfully!');
    }
}
