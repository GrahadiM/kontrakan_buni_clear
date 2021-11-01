<?php

namespace App\Http\Controllers\Penyewa;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\Sewa;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporans = Laporan::all();
        return view('dashboard.penyewa.keluhan.index', compact('laporans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sewas = Sewa::all();
        return view('dashboard.penyewa.keluhan.create', compact('sewas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sewa_id' => 'required',
            'status' => 'required',
            'bukti_laporan' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
            'keluhan' => 'nullable',
        ]);

        // dd($request);
        if($request->hasFile('bukti_laporan')){
            // $bukti_laporan = $this->uploadGambar($request->bukti_laporan);
            $file = $request->file('bukti_laporan');
            $filenameOri = $file->getClientOriginalName();
            $bukti_laporan = time() . "-" . $filenameOri;

            $file->move('images/laporan', $bukti_laporan);

            Laporan::create([
                'sewa_id' => $request->sewa_id,
                'status' => $request->status,
                'bukti_laporan' => $bukti_laporan,
                'keluhan' => $request->keluhan,
            ]);
        }

        session()->flash('success', "Data has been Created!!");
        return redirect()->route('keluhan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laporan = Laporan::find($id);
        return view('dashboard.penyewa.keluhan.show', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laporan = Laporan::find($id);
        return view('dashboard.penyewa.keluhan.update', compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Laporan::find($id)->delete();
        return redirect()->back();
    }
}
