<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penumpang;
use App\Models\Tiket;

class PenumpangController extends Controller
{
    public function index(){
        $tikets = Tiket::get();
        return view('penumpang.index', compact('tikets'));
    }
    public function search(Request $request){
        $penumpang = Penumpang::where('nama', 'like', "%{$request->nama}")->orderBydesc('nama')->get();
        return back()->with('data', $penumpang);
    }
    public function store(Request $request){
        $tiket = Tiket::find($request->tiket_id);
        $penumpang = new Penumpang;
        $penumpang->nomor_penumpang = $request->nomor_penumpang;
        $penumpang->nama = $request->nama;

        $penumpang->tiket()->associate($tiket);
        $penumpang->save();

        return redirect()->route('penumpangs.index')->with('message', 'Berhasil');
    }
}
