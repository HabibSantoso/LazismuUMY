<?php

namespace App\Http\Controllers;

use App\Models\Ashnaf;
use App\Models\PenerimaManfaat;
use App\Models\Penyaluran;
use App\Models\Pilar;
use App\Models\ProgramPilar;
use App\Models\Tahun;
use Illuminate\Http\Request;

class PenyaluranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ashnafs = Ashnaf::query()->get();
        $pilars = Pilar::query()->get();
        $programPilars = ProgramPilar::query()->get();
        $tahuns = Tahun::query()->get();

        $penyalurans = Penyaluran::orderByDesc('tanggal')
            ->with('ashnaf', 'penerimaManfaat', 'tahun', 'pilar', 'programPilar')
            ->when($request->search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('uraian', 'like', '%'.$search.'%')
                        ->orWhere('tanggal', 'like', '%'.$search.'%');
                });
            })
            ->when($request->ashnaf, function ($query, $ashnaf) {
                $query->where('ashnaf_id', '=', $ashnaf);
            })
            ->when($request->pilar, function ($query, $pilar) {
                $query->where('pilar_id', '=', $pilar);
            })
            ->when($request->program_pilar, function ($query, $program_pilar) {
                $query->where('program_pilar_id', '=', $program_pilar);
            })
            ->when($request->tahun, function ($query, $tahun) {
                $query->where('tahun_id', '=', $tahun);
            })
            ->paginate(10)
            ->withQueryString();

        return view('penyaluran.index', compact('penyalurans', 'ashnafs', 'pilars', 'programPilars', 'tahuns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ashnafs = Ashnaf::query()->get();
        $penerimaManfaats = PenerimaManfaat::query()->get();
        $pilars = Pilar::query()->get();
        $programPilars = ProgramPilar::query()->get();
        $tahuns = Tahun::query()->get();

        return view('penyaluran.create', compact('ashnafs', 'penerimaManfaats', 'pilars', 'programPilars', 'tahuns'));
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
            'ashnaf_id' => 'nullable|exists:ashnafs,id',
            'penerima_manfaat_id' => 'nullable|exists:penerima_manfaats,id',
            'pilar_id' => 'nullable|exists:pilars,id',
            'program_pilar_id' => 'nullable|exists:program_pilars,id',
            'tahun_id' => 'nullable|exists:tahuns,id',

        ]);
        //dd($request);

        Penyaluran::create([
            'tanggal' => $request->tanggal,
            'uraian' => $request->uraian,
            'nominal' => $request->nominal,
            'ashnaf_id' => $request->ashnaf_id,
            'penerima_manfaat_id' => $request->penerima_manfaat_id,
            'pilar_id' => $request->pilar_id,
            'program_pilar_id' => $request->program_pilar_id,
            'tahun_id' => $request->tahun_id,

            // 'user_id' => auth()->user()->id,
            // 'title' => $request->title,
        ]);

        return redirect()->route('penyaluran.index')->with('success', 'Penyaluran created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penyaluran $penyaluran)
    {
        //$penyaluran->load('ashnaf', 'penerimaManfaat', 'pilar', 'programPilar', 'tahun');

        return view('penyaluran.view', compact('penyaluran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penyaluran $penyaluran)
    {
        $ashnafs = Ashnaf::query()->get();
        $penerimaManfaats = PenerimaManfaat::query()->get();
        $pilars = Pilar::query()->get();
        $programPilars = ProgramPilar::query()->get();
        $tahuns = Tahun::query()->get();

        //dd($penyaluran);
        return view('penyaluran.edit', compact('penyaluran', 'ashnafs', 'penerimaManfaats', 'pilars', 'programPilars', 'tahuns'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penyaluran $penyaluran)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'uraian' => 'required|max:255',
            'nominal' => 'required|numeric',
            'ashnaf_id' => 'nullable|exists:ashnafs,id',
            'penerima_manfaat_id' => 'nullable|exists:penerima_manfaats,id',
            'pilar_id' => 'nullable|exists:pilars,id',
            'program_pilar_id' => 'nullable|exists:program_pilars,id',
            'tahun_id' => 'nullable|exists:tahuns,id',

        ]);
        //dd($request);

        $penyaluran->update([
            'tanggal' => $request->tanggal,
            'uraian' => $request->uraian,
            'nominal' => $request->nominal,
            'ashnaf_id' => $request->ashnaf_id,
            'penerima_manfaat_id' => $request->penerima_manfaat_id,
            'pilar_id' => $request->pilar_id,
            'program_pilar_id' => $request->program_pilar_id,
            'tahun_id' => $request->tahun_id,

            // 'user_id' => auth()->user()->id,
            // 'title' => $request->title,
        ]);

        return redirect()->route('penyaluran.index')->with('success', 'Penyaluran edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penyaluran $penyaluran)
    {
        $penyaluran->delete();

        return redirect()
            ->route('penyaluran.index')
            ->with('success', 'Penyaluran delete successfully!');
    }
}
