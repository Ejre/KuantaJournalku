<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Circle;
use App\Models\Role;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Menampilkan form login.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan path view sesuai dengan struktur folder Anda.
    }

    /**
     * Proses autentikasi user.
     */
    public function login(Request $request): RedirectResponse
    {
        // Validasi input untuk username dan password
        $credentials = $request->validate([
            'username' => ['required'], // Gunakan 'username' sesuai dengan nama input di form
            'password' => ['required'],
        ]);

        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Cek apakah user memiliki role tertentu
            if ($user->roles->contains('nama', 'Admin')) {
                return redirect()->route('dashboard.home');
            } elseif ($user->roles->contains('nama', 'Karyawan') || $user->roles->contains('nama', 'Magang')) {
                return redirect()->route('dashboard.checkin.index');
            } else {
                // Jika user tidak memiliki role yang valid
                if ($user->roles->isEmpty()) {
                    // Tambahkan logika jika user tidak memiliki role
                    return back()->withErrors([
                        'username' => 'User tidak memiliki role yang valid. Silakan hubungi administrator.'
                    ])->withInput();
                } else {
                    // Jika ada role lain, kembali ke halaman login dengan pesan error
                    return redirect()->route('login')->withErrors([
                        'username' => 'Role user tidak dikenali.'
                    ]);
                }
            }
        }

        // Jika autentikasi gagal, kembalikan pesan error
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    /**
     * Logout user.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
