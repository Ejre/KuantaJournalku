<?php

namespace App\Http\Controllers;

use App\Models\Circle;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Raw;
use Illuminate\Support\Facades\Hash;
use App\Models\UserProfile;

class UsersController extends Controller
{
    public function index()
    {

        $users = User::all();

        $circles = Circle::all();

        // dd($circles);

        // $tempRoles= [
        //     "Karyawan",
        //     "Admin",
        //     "Magang",
        //     "Reporter"
        // ];

        $roles = Role::all();

        return view('dashboard.users.index', [
            "users" => $users,
            "circles" => $circles,
            "roles" => $roles
        ]);
    }


    // Circle
    public function store(Request $request)
    {
        // dd($request->kode);
        $circle = new Circle();
        $circle->kode = $request->kode;
        $circle->nama = $request->role;
        $circle->save();

        return redirect()->back();
    }
    public function edit($id)
    {
        $circle = Circle::find($id);
        return view('dashboard.users.content.editcircle', ['circle' => $circle]);
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|max:3',
            'role' => 'required',
        ]);

        // dd($request->kode);
        $circle = Circle::find($id) ;
        $circle->kode = $request->kode;
        $circle->nama = $request->role;
        $circle->update();

        return redirect()->route('dashboard.users');
    }

    public function destroy($id)
    {
        Circle::find($id)->delete();

        return redirect()->back();
    }



    // Roles
    public function getRoles(Request $request)
    {
        $role = new Role();
        $role->nama = $request->nama;
        $role->save();

        return redirect()->back();
    }
    public function editRole($id)
    {
        $role = Role::find($id);
        return view('dashboard.users.content.editrole', ['role' => $role]);
    }
    public function updateRole($id, Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $role = Role::find($id);
        $role->nama = $request->nama;
        $role->update();

        return redirect()->route('dashboard.users');
    }
    public function destroyRole($id)
    {
        Role::find($id)->delete();

        return redirect()->back();
    }


    // User
    // Menyimpan pengguna baru
    public function addUser(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users|max:255',
            'alamat' => 'required|max:255',
            'nomor_wa' => 'required|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|min:6|confirmed',
            'roles' => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            $user = new User;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $userProfile = new UserProfile;
            $userProfile->nama_lengkap = $request->username;
            $userProfile->alamat = $request->alamat;
            $userProfile->email = $request->email;
            $userProfile->user_id = $user->id;
            $userProfile->nomor_wa = $request->nomor_wa;
            $userProfile->save();

            
            // Menyimpan role
            $user->roles()->sync($request->roles);

            // Menyimpan circle jika ada
            if ($request->circle_id) {
                DB::table('user_circles')->insert([
                    'user_id' => $user->id,
                    'circle_id' => $request->circle_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::commit();
            return redirect()->route('dashboard.users')->with('success', 'User created successfully!');
        } catch (\Exception $e) {

            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->withErrors('There was an error: ' . $e->getMessage());
        }
    }


    // Menampilkan formulir untuk mengedit pengguna
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $circle = Circle::all();
        $role = Role::all();

        return view('dashboard.users.content.edituser', compact('user', 'circle', 'role'));
    }

    // Memperbarui pengguna
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|max:255|unique:users,username,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
            'roles' => 'required|array',
            'circle_id' => 'required|exists:circles,id',
        ]);

        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Update roles
        $user->roles()->sync($request->roles);

        // Update circle
        DB::table('user_circles')->updateOrInsert(
            ['user_id' => $user->id],
            ['circle_id' => $request->circle_id]
        );

        return redirect()->route('dashboard.users')->with('success', 'User updated successfully');
    }


    // Menghapus pengguna
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard.users');
    }


    public function viewSetting()
    {
        return view('dashboard.setting');
    }
}

