<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogPresensi;

class CheckInController extends Controller
{
    // Menampilkan halaman check-in
    public function index()
    {
        return view('dashboard.checkin'); // Pastikan view ini ada
    }

    // Menyimpan data check-in
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'attendance' => 'required',
            'evidence' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file
        ]);

        $logPresensi = new LogPresensi();
        $logPresensi->user_id = auth()->id();
        $logPresensi->check_in = $request->input('date') . ' ' . $request->input('time');
        $logPresensi->evidence = $request->hasFile('evidence') ? $request->file('evidence')->store('public/evidence') : null;
        $logPresensi->is_active = true;
        $logPresensi->status = 'hadir'; // Default value, sesuaikan jika diperlukan
        $logPresensi->tipe_kehadiran = $request->input('attendance');
        $logPresensi->save();

        return redirect()->back()->with('success', 'Check-in berhasil');
    }
}
