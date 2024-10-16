<?php

use App\Http\Controllers\AshnafController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PenerimaManfaatController;
use App\Http\Controllers\PenghimpunanController;
use App\Http\Controllers\PenyaluranController;
use App\Http\Controllers\PilarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramPilarController;
use App\Http\Controllers\ProgramSumberController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\SumberDanaController;
use App\Http\Controllers\TahunController;
use App\Imports\PenghimpunanImportExel;
use App\Models\Kabupaten;
use App\Models\Lokasi;
use App\Models\PenerimaManfaat;
use App\Models\Penghimpunan;
use App\Models\Penyaluran;
use App\Models\Pilar;
use App\Models\ProgramPilar;
use App\Models\ProgramSumber;
use App\Models\Provinsi;
use App\Models\SumberDana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('ashnaf', AshnafController::class);
    Route::resource('kabupaten', KabupatenController::class);
    Route::resource('lokasi', LokasiController::class);
    Route::resource('penerimamanfaat', PenerimaManfaatController::class);

    Route::get('penghimpunan/export', [PenghimpunanController::class, 'export'])->name('penghimpunan.export');
    // Route::get('penghimpunan/exportexel', [PenghimpunanController::class, 'exportExel'])->name('penghimpunan.exportexel');
    // Route::get('penghimpunan/exportcsv', [PenghimpunanController::class, 'exportCsv'])->name('penghimpunan.exportcsv');
    Route::get('penghimpunan/importexel', [PenghimpunanController::class, 'importExel'])->name('penghimpunan.importexel');
    Route::get('penghimpunan/importcsv', [PenghimpunanController::class, 'importCsv'])->name('penghimpunan.importcsv');
    Route::patch('penghimpunan/importfileexel', [PenghimpunanController::class, 'importFileExel'])->name('penghimpunan.importfileexel');
    Route::patch('penghimpunan/importfilecsv', [PenghimpunanController::class, 'importFileCsv'])->name('penghimpunan.importfilecsv');
    Route::resource('penghimpunan', PenghimpunanController::class);

    
    Route::patch('penyaluran/importfilecsv', [PenyaluranController::class, 'importFileCsv'])->name('penyaluran.importfilecsv');
    Route::patch('penyaluran/importfileexel', action: [PenyaluranController::class, 'importFileExel'])->name('penyaluran.importfileexel');
    Route::get('penyaluran/importcsv', [PenyaluranController::class, 'importCsv'])->name('penyaluran.importcsv');
    Route::get('penyaluran/importexel', [PenyaluranController::class, 'importExel'])->name('penyaluran.importexel');
    Route::get('penyaluran/exportcsv', [PenyaluranController::class, 'exportCsv'])->name('penyaluran.exportcsv');
    Route::get('penyaluran/export', [PenyaluranController::class, 'export'])->name('penyaluran.export');
    Route::resource('penyaluran', PenyaluranController::class);

    Route::resource('pilar', PilarController::class);
    Route::resource('programpilar', ProgramPilarController::class);
    Route::resource('programsumber', ProgramSumberController::class);
    Route::resource('provinsi', ProvinsiController::class);
    Route::resource('sumberdana', SumberDanaController::class);
    Route::resource('tahun', TahunController::class);
    Route::resource('donatur', DonaturController::class);

    Route::view('/user', 'user.index')->name('user.index');
    //Route::get('/penghimpunan/formcsv', [PenghimpunanController::class, 'formcsv'])->name('formcsv');
    // Route::get('/penghimpunan/formcsv', function () {
    //     return view('penghimpunan.formcsv');
    // })->name('formcsv');
    // Route::view('/ashnaf', 'ashnaf.index')->name('ashnaf.index');
    // Route::view('/kabupaten', 'kabupaten.index')->name('kabupaten.index');
    // Route::view('/lokasi', 'lokasi.index')->name('lokasi.index');
    // Route::view('/penerimamanfaat', 'penerimamanfaat.index')->name('penerimamanfaat.index');
    // Route::view('/penghimpunan', 'penghimpunan.index')->name('penghimpunan.index');
    // Route::view('/penyaluran', 'penyaluran.index')->name('penyaluran.index');
    // Route::view('/pilar', 'pilar.index')->name('pilar.index');
    // Route::view('/programpilar', 'programpilar.index')->name('programpilar.index');
    // Route::view('/programsumber', 'programsumber.index')->name('programsumber.index');
    // Route::view('/provinsi', 'provinsi.index')->name('provinsi.index');
    // Route::view('/sumberdana', 'sumberdana.index')->name('sumberdana.index');
    // Route::view('/tahun', 'tahun.index')->name('tahun.index');

    // Route::post('/import-penghimpunan', function (Request $request) {
    //     $file = $request->file('file');
    //     Queue::push(new PenghimpunanImportExel($file));

    //     return redirect()->back()->with('success', 'Data imported successfully!');
    // })->name('import.penghimpunan');
});

Route::view('/', 'public.home')->name('home');
Route::view('/about', 'public.about')->name('about');
Route::view('/sejarah', 'public.sejarah')->name('sejarah');
Route::view('/visimisi', 'public.visimisi')->name('visimisi');
Route::view('/program', 'public.program')->name('program');
// Route::view('/penghimpunan/formscsv', 'penghimpunan.formcsv')->name('formcsv');
// Route::get('penghimpunan/formcsv', function (Request $request) {
//     return view('penghimpunan.formcsv');
// })->name('penghimpunan.formcsv');

require __DIR__.'/auth.php';
