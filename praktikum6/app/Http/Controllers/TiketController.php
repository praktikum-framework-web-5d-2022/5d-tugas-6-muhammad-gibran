<?php

namespace App\Http\Controllers;

use App\Models\Penumpang;
use Illuminate\Http\Request;
use App\Models\Tiket;

class TiketController extends Controller
{
    public function index()
    {
        $bisnis_find = Tiket::find(1);
        $ekonomi_find = Tiket::find(2);
        $all_tiket = Tiket::withCount('penumpangs')->get();
        return view(
            'tiket.index',
            compact(
                'bisnis_find',
                'ekonomi_find',
                'all_tiket'
            )
        );
    }

    public function create(Tiket $tiket)
    {
        return view('tiket.create', compact('tiket'));
    }

    public function store(Request $request, Tiket $tiket)
    {
        $tiket->penumpangs()->create([
            'nomor_penumpang' => $request->nomor_penumpang,
            'nama' => $request->nama
        ]);
        return redirect()->route('tikets.index')->with('message', 'Berhasil');
    }

    public function move()
    {
        $tikets = Tiket::get();
        return view('tiket.move', compact('tikets'));
    }

    public function moveUpdate(Request $request)
    {
        $from = Tiket::find($request->from);
        $to = Tiket::find($request->to);

        $from->penumpangs()->update([
            'tiket_id' => $to->id
        ]);
        return redirect()->route('tikets.index')->with('message', 'Semua Penumpang Berhasil');
    }

    public function destroy(Tiket $tiket)
    {
        Penumpang::where('tiket_id', $tiket->id)->delete();
        return redirect()->route('tikets.index')->with('message', "Penumpang dari {$tiket->nama} dihapus semuannya");
    }
}
