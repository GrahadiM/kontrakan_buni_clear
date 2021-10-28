<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostKontrakan;
use App\Models\Sewa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenantsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sewas = Sewa::all();
        return view('dashboard.admin.penyewa.index',['sewas' => $sewas]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sewa = Sewa::find($id);
        return view('dashboard.admin.penyewa.show', compact('sewa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sewa = Sewa::find($id);
        return view('dashboard.admin.penyewa.update', compact('sewa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'status1' => 'required',
            'status2' => 'required',
        ]);

        $user = User::find($request->user_id);
        $room = PostKontrakan::find($request->room_id);

        $user->status = $request->status1;
        $user->update();
        
        $room->status = $request->status2;
        $room->update();

        session()->flash('success', "Data has been updated!!");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sewa = Sewa::find($id);
        $sewa->delete();
        session()->flash('success', "Data has been deleted!!");
        return redirect()->back();
    }
}
