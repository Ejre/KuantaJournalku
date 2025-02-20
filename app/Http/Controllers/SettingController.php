<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('dashboard.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'deskripsi' => 'required|string|max:255',
        ]);

        $setting = Setting::first();
        $setting->update($request->all());

        return redirect()->route('dashboard.settings.index')->with('success', 'Profil berhasil diperbarui');
    }

    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $setting = Setting::first();

        // Hapus gambar lama jika ada
        if ($setting->gambar) {
            Storage::delete($setting->gambar);
        }

        // Simpan gambar baru
        $path = $request->file('photo')->store('profile_photos', 'public');

        // Update path gambar di database
        $setting->gambar = $path;
        $setting->save();

        return redirect()->back()->with('success', 'Foto profil berhasil diubah.');
    }
}
