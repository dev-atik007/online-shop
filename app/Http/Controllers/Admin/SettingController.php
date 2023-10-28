<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.setting.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'string|required',
            'email'       => 'string|required',
            'phone'       => 'required|string|digits:11',
            'image'       => 'nullable',
            'logo'        => 'nullable',
            'tel_number'  => 'required',
            'address'     => 'string|required',
        ]);

        $settingImage = null;
        if($request->hasFile('image')){
            $settingImage = uniqid('setting' . strtotime(date('ymhsis')), true) . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('/uploads/settings/', $settingImage);
        }

        $settingLogo = null;
        if($request->hasFile('logo')){
            $settingLogo = uniqid('logo'. strtotime(date('ymhsis')), true) . '_' .$request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('/uploads/logo/', $settingLogo);
        }

        $settings = Setting::create([
            'description' => $request->description,
            'image'       => $settingImage,
            'logo'        => $settingLogo,
            'phone'       => $request->phone,
            'email'       => $request->email,
            'tel_number'  => $request->tel_number,
            'address'     => $request->address
        ]);
        
        return redirect()->route('admin.setting.detail');
    }

    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);
        $request->validate([
            'description' => 'string|required',
            'email'       => 'string|required',
            'phone'       => 'required|string|digits:11',
            'image'       => 'nullable',
            'logo'        => 'nullable',
            'tel_number'  => 'required',
            'address'     => 'string|required',
        ]);

        $settingImage = null;
        if($request->hasFile('image')){
            $settingImage = uniqid('setting' . strtotime(date('ymhsis')), true) . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('/uploads/settings/', $settingImage);
        }

        $settingLogo = null;
        if($request->hasFile('logo')){
            $settingLogo = uniqid('logo'. strtotime(date('ymhsis')), true) . '_' .$request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('/uploads/logo/', $settingLogo);
        }

        $settings = Setting::create([
            'description' => $request->description,
            'image'       => $settingImage,
            'logo'        => $settingLogo,
            'phone'       => $request->phone,
            'email'       => $request->email,
            'tel_number'  => $request->tel_number,
            'address'     => $request->address
        ]);

        return redirect()->route('admin.setting.detail');
    }
}
