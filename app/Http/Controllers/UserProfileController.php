<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        // $userProfile = UserProfile::first();
        $userProfile = UserProfile::where('email', auth()->user()->email)->first();
        // dd($userProfile);
        return view('dashboard.user_profiles.index', compact('userProfile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_wa' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        // dd($user->id);
        $userProfile = UserProfile::where('user_id', $user->id)->first();
        // dd($userProfile->all());
        $userProfile->nama_lengkap = $request->nama_lengkap;
        $userProfile->alamat = $request->alamat;
        $userProfile->nomor_wa = $request->nomor_wa;
        $userProfile->email = $request->email;
        // dd("checkpoint");
        $userProfile->deskripsi = $request->deskripsi;
        // dd("deskripsi lolos");
        $userProfile->update();

        return redirect()->route('dashboard.user_profiles.index')->with('success', 'Profil berhasil diperbarui.');
    }

    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        $userProfile = UserProfile::where('user_id', $user->id)->first();

        // Hapus gambar lama jika ada
        if ($userProfile->gambar) {
            Storage::delete($userProfile->gambar);
        }

        // Simpan gambar baru
        $path = $request->file('photo')->store('profile_photos', 'public');

        // Update path gambar di database
        $userProfile->gambar = $path;
        $userProfile->save();

        return redirect()->back()->with('success', 'Foto profil berhasil diubah.');
    }
}