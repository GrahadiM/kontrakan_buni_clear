<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sewa;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();
        return view('dashboard.admin.transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $sewas = Sewa::all();
        return view('dashboard.admin.transaksi.create', compact('sewas'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'sewa_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'status' => 'required',
            'note' => 'nullable|string|max:225',
        ]);

        Transaksi::create([
            'sewa_id' => $request->sewa_id,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'status' => $request->status,
            'note' => $request->note,
        ]);

        session()->flash('success', "Data has been created!!");
        return redirect()->route('transaksi.index');
    }

    public function show(Transaksi $transaksi)
    {
        $transaksi->find($transaksi->id);
        return view('dashboard.admin.transaksi.show', compact('transaksi'));
    }
    
    public function edit(Transaksi $transaksi)
    {
        $transaksi->find($transaksi->id);
        return view('dashboard.admin.transaksi.update', compact('transaksi'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $this->validate($request, [
            'sewa_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'status' => 'required',
            'note' => 'nullable|string|max:225',
        ]);

        
        $transaksi = Transaksi::find($transaksi->id);
        $transaksi->update([
            'sewa_id' => $request->sewa_id,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'status' => $request->status,
            'note' => $request->note,
        ]);

        session()->flash('success', "Data has been updated!!");
        return redirect()->route('transaksi.index');
    }
    
    public function destroy(Transaksi $transaksi)
    {
        $transaksi = Transaksi::find($transaksi->id);
        $transaksi->delete();
        session()->flash('success', "Data has been deleted!!");
        return redirect('/transaksi');
    }
}
