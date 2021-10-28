<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Sewa;
use App\Models\Transaksi;
use App\Models\PostKontrakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $r = PostKontrakan::all();
            $rc = PostKontrakan::where('status', 'isi')->get();
            $t = Transaksi::all();
            $p = User::where('role', 'penyewa')->get();
            $sb = Transaksi::where('status', 'SB')->sum('nominal');
            $bb = Transaksi::where('status', 'BB')->sum('nominal');

            $sewas = Sewa::all();

            // $items = Transaksi::groupBy('sewa_id')->get(['sewa_id']);
            // $tp = [];
            // foreach ($items as $key => $value) {
            //     $tp['daily'][$value] = Transaksi::where('sewa_id',$value)->whereDate('created_at',date('Y-m-d'))->sum('nominal');
            //     $tp['weekly'][$value] = Transaksi::where('sewa_id',$value)->whereBetween('date', [
            //         Carbon::parse('last monday')->startOfDay(),
            //         Carbon::parse('next friday')->endOfDay(),
            //     ])->sum('nominal');
            //     $tp['monthly'][$value] = Transaksi::where('sewa_id',$value)->whereMonth('created_at',date('m'))->sum('nominal');
            //     $tp['yearly'][$value] = Transaksi::where('sewa_id',$value)->whereYear('created_at',date('Y'))->sum('nominal');
            // }

            // var_dump($tp);
            return view('dashboard', compact('r', 'rc', 't', 'p', 'sb', 'bb', 'sewas'));
        }
        if (Auth::user()->role == 'penyewa') {
            if (Auth::user()->status == 'active') {
                $transaksis = Transaksi::all();

                return view('dashboard', compact('transaksis'));
            }
            return redirect()->route('index');
        }
        return redirect()->route('index');
    }
}
