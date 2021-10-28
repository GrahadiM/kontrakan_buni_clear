<?php

namespace App\Http\Controllers\Penyewa;

use App\Http\Controllers\Controller;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::all();
        return view('dashboard.penyewa.transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi, $id)
    {
        $transaksi = Transaksi::find($id);
        return view('dashboard.penyewa.transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi, $id)
    {
        $transaksi = Transaksi::find($id);
        return view('dashboard.penyewa.transaksi.update', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nominal' => 'required',
            'bukti_pembayaran' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
            'note' => 'nullable|string|max:225',
        ]);

        
        if($request->hasFile('bukti_pembayaran')){
            // $bukti_pembayaran = $this->uploadGambar($request->bukti_pembayaran);
            $file = $request->file('bukti_pembayaran');
            $filenameOri = $file->getClientOriginalName();
            $bukti_pembayaran = time() . "-" . $filenameOri;

            $file->move('images/transaksi', $bukti_pembayaran);

            $transaksi = Transaksi::find($id);
            $transaksi->update([
                'nominal' => $request->nominal,
                'bukti_pembayaran' => $bukti_pembayaran,
                'note' => $request->note,
            ]);
        }

        session()->flash('success', "Data has been updated!!");
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
