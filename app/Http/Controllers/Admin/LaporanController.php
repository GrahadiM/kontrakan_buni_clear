<?php

namespace App\Http\Controllers\Admin;

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
        return view('dashboard.admin.laporan.index', compact('laporans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sewas = Sewa::all();
        return view('dashboard.admin.laporan.create', compact('sewas'));
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
        return redirect()->route('laporan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laporan = Laporan::find($id);
        return view('dashboard.admin.laporan.show', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laporan = Laporan::find($id);
        return view('dashboard.admin.laporan.update', compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
            'keluhan' => 'nullable|string|max:225',
        ]);

        
        $laporan = Laporan::find($id);
        $laporan->update([
            'status' => $request->status,
            'keluhan' => $request->keluhan,
        ]);

        session()->flash('success', "Data has been Updated!!");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
