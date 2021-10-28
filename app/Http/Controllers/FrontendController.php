<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SendMail;
use App\Mail\KontrakanBuniEmail;
use App\Models\Sewa;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{

    public function index()
    {
        $limit = 150;
        $posts = DB::table('post_kontrakans')
        ->where('status', 'kosong')
        ->orderBy('created_at', 'asc')
        ->limit(6)
        ->get();
        
        // dd($posts);
        foreach ($posts as $post) {
            $expire_date_string = $post->created_at;
            $carbonated_date = Carbon::parse($expire_date_string);
            $diff_date = $carbonated_date->diffForHumans(Carbon::now());
            $diff_date;
        }
        // return view('compro.index', compact('posts', 'limit', 'diff_date'));
        return view('frontend.index', compact('posts', 'limit', 'diff_date'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        // Mail::to("kontrakanbuni@gmail.com")->send(new KontrakanBuniEmail());

        // return view('compro.contact');
        return view('frontend.contact');
    }
    
    public function sendemail(Request $request, SendMail $send)
    {
        // SendMail::created([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'subject' => $request->subject,
        //     'message' => $request->message,
        //     'website' => 'https://www.kontrakanbuni.com/',
        // ]);

        $send = new \App\Models\SendMail;
        $send->name = $request->name;
        $send->email = $request->email;
        $send->subject = $request->subject;
        $send->message = $request->message;
        $send->website = 'https://www.kontrakanbuni.com/';
        $send->save();

        $request->request->add(['send_id' => $send->id]);
        // $send = \App\Models\SendMail::create($request->all());
        
        \Mail::raw('Pesan dari pengunjung website '.$send->name, function ($message) use($send) {
            $message->from($send->email, $send->name);
            $message->to('abdurrahmangrahadimaulana@gmail.com', 'Hadoy');
            $message->subject($send->subject);
        });

        // Mail::to("kontrakanbuni@gmail.com")->send(new KontrakanBuniEmail());

        // return Mail::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'message' => $request->message,
        // ]);
        return redirect()->route('contact-us');
    }

    public function list()
    {
        $limit = 150;
        $posts = DB::table('post_kontrakans')
        // ->where('status', 'kosong')
        ->orderBy('created_at', 'asc')
        ->paginate(6);
        // ->get();
        foreach ($posts as $post) {
            $expire_date_string = $post->created_at;
            $carbonated_date = Carbon::parse($expire_date_string);
            $diff_date = $carbonated_date->diffForHumans(Carbon::now());
            $diff_date;
        }
        // return view('compro.list', compact('posts', 'limit', 'diff_date'));
        return view('frontend.list', compact('posts', 'limit', 'diff_date'));
    }

    public function search(Request $request)
    {
        $limit = 150;

        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $posts = DB::table('post_kontrakans')
        ->where('title','like',"%".$cari."%")
        ->orderBy('created_at', 'desc')
        ->paginate(6);
        foreach ($posts as $post) {
            $expire_date_string = $post->created_at;
            $carbonated_date = Carbon::parse($expire_date_string);
            $diff_date = $carbonated_date->diffForHumans(Carbon::now());
            $diff_date;
        }
        return view('compro.list',compact('posts', 'limit', 'diff_date'));
    }

    public function detail($id)
    {
        $post = DB::table('post_kontrakans')->find($id);
        $expire_date_string = $post->created_at;
        $carbonated_date = Carbon::parse($expire_date_string);
        $diff_date = $carbonated_date->diffForHumans(Carbon::now());
        $diff_date;
        // return view('compro.detail', compact('post', 'diff_date'));
        return view('frontend.detail', compact('post', 'diff_date'));
    }

    public function order(Request $request)
    {
        $this->validate($request, [
            'nik'          => 'required|max:225',
            'total_family' => 'required',
        ]);

        // $user = User::find($request->user_id);
        // $user->update([
        //     "status" => $request->status,
        // ]);

        $post = new Sewa();
        $user = User::find(auth()->user()->id);
        
        // dd($user);
        // $user->status = $request->status;
        $user->status = 'pending';
        $user->update();

        $post->nik = $request->nik;
        $post->total_family = $request->total_family;
        $post->room_id = $request->room_id;
        $post->rental_date = date("Y-m-d H:i:s");
        $post->user_id = auth()->user()->id;
        // dd($post);
        $post->save();

        session()->flash('success', "Data has been created!!");
        return redirect()->back();
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

}
