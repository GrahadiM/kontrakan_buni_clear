<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PostKontrakan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $posts = DB::table('post_kontrakans')
        ->where("user_id", "=", $user->id)
        ->orderBy('created_at', 'ASC')
        ->get();
        // dd($posts);
        return view('dashboard.admin.post-kontrakan.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.post-kontrakan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PostKontrakan $post)
    {
        $this->validate($request, [
            'title' => 'required|string|max:225',
            'price' => 'required|string|max:225',
            'content' => 'required|max:225',
            'thumbnail' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
        ]);
        
        // dd($request);
        
        if($request->hasFile('thumbnail')){
            // $thumbnail = $this->uploadGambar($request->thumbnail);
            $file = $request->file('thumbnail');
            $filenameOri = $file->getClientOriginalName();
            $thumbnail = time() . "-" . $filenameOri;

            $file->move('images/thumbnail', $thumbnail);

            PostKontrakan::create([
                'title'     => $request->title,
                // 'url'       => Str::slug($request->title),
                'address'   => $request->address,
                'price'     => $request->price,
                'content'   => $request->content,
                'thumbnail' => $thumbnail,
                'status'    => 'kosong',
                'user_id'   => auth()->user()->id,
            ]);
        }

        // PostKontrakan::create([
        //     'title'     => $request->title,
        //     'url'       => Str::slug($request->title),
        //     'address'   => $request->address,
        //     'price'     => $request->price,
        //     'content'   => $request->content,
        //     'thumbnail' => 'produk_default.jpeg',
        //     'status'    => 'kosong',
        //     'user_id'   => auth()->user()->id,
        // ]);

        session()->flash('success', "Data has been created!!");
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PostKontrakan $post)
    {
        $post = DB::table('post_kontrakans')->find($post->id);
        return view('dashboard.admin.post-kontrakan.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PostKontrakan $post)
    {
        $post = DB::table('post_kontrakans')->find($post->id);
        return view('dashboard.admin.post-kontrakan.update', ['post' => $post]);
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
        $this->validate($request, [
            'title' => 'required|string|max:225',
            'price' => 'required|max:225',
            'content' => 'required|max:225',
            'thumbnail' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
        ]);

        if($request->hasFile("thumbnail")){
            // $thumbnail = $this->uploadGambar($request->thumbnail);
            $file = $request->file("thumbnail");
            $filenameOri = $file->getClientOriginalName();
            $thumbnail = time() . "-" . $filenameOri;

            $file->move('images/thumbnail', $thumbnail);

            $post = PostKontrakan::find($id);
            $post->update([
                "title"     => $request->title,
                "price"      => $request->price,
                "content"   => $request->content,
                "thumbnail"   => $thumbnail,
                "status"    => $request->status,
                "user_id"   => auth()->user()->id,
            ]);
            
        }

        $post = PostKontrakan::find($id);
        $post->update([
            "title"     => $request->title,
            "price"      => $request->price,
            "content"   => $request->content,
            "status"    => $request->status,
            "user_id"   => auth()->user()->id,
        ]);

        session()->flash('success', "Data has been updated!!");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostKontrakan $post)
    {
        $post = PostKontrakan::find($post->id);
        $post->delete();
        session()->flash('success', "Data has been deleted!!");
        return redirect()->back();
    }

    // public function uploadGambar($gambar)
    // {
    //     $gambar->move(public_path('images/thumbnail'), $gambar->getClientOriginalName());
    //     return $gambar->getClientOriginalName();
    // }
}
