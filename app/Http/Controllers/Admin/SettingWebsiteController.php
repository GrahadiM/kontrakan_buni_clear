<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\SettingWebsite;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SettingWebsiteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $setting = SettingWebsite::get()->first();
        return view('dashboard.admin.setting-website.update',['setting' => $setting]);
    }

    public function update(Request $request, SettingWebsite $setting)
    {
        $this->validate($request, [
            'app_name' => 'required|string|max:25',
            'footer_left' => 'required|string|max:100',
            'footer_right' => 'required|string|max:50',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
            'favicon' => 'nullable|mimes:jpg,png,jpeg,ico|max:1000',            
        ]);

        $data = $request->only(['app_name', 'footer_left', 'footer_right']);

        if($request->hasFile('logo')){
            // $logo = $request->logo->store('logo');
            $logo = $this->uploadGambar($request->logo);

            if($setting->logo !== "logo_default.jpg"){
                File::delete('images/setting'.$setting->logo);
            }

            $data['logo'] = $logo;
        }

        if($request->hasFile('favicon')){
            $favicon = $this->uploadGambar($request->favicon);

            if($setting->favicon !== "favicon_default.ico"){
                File::delete('images/setting'.$setting->favicon);
            }

            $data['favicon'] = $favicon;
        }
        
        // dd($data);
        $setting = SettingWebsite::get()->first();
        $setting->update($data);

        session()->flash('success', "Data has been updated!!");

        //redirect user
        return redirect()->back();
    }

    public function uploadGambar($gambar)
    {

        $gambar->move(public_path('images/setting'), $gambar->getClientOriginalName());

        return $gambar->getClientOriginalName();
    }
}
