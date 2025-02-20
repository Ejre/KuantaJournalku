@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

@section('content')
<main class="p-4">
    <h4>Pengaturan</h4>
    <div class="flex flex-row space-x-4">
        <!-- Bagian Foto Profil -->
        <div class="w-1 p-4 bg-white shadow rounded-lg flex flex-col items-center">
            <div class="profile-photo-container mb-4">
                <img src="{{ asset('images/poto.png') }}" alt="Foto Profil" class="profile-photo">
            </div>
            <button class="ubah-foto-btn">Ubah Foto</button>
            <h2 class="mt-4 text-xl font-bold">{{ $setting->nama_lengkap }}</h2>
            <p class="text-gray-500">180 Total Jam</p>
        </div>

        <!-- Bagian Detail Profil -->
        <div class="w-2 p-4 bg-white shadow rounded-lg">
            <ul class="nav nav-underline">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" id="profileTab">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="editProfileTab">Edit Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">App Settings</a>
                </li>
            </ul>
            <div class="container mt-5" id="profileContent">
                <div class="row align-items-center mt-2">
                    <div class="col-md-2 font-weight-bold">Nama</div>
                    <div class="col-md-1 text-center">:</div>
                    <div class="col-md-9">{{ $setting->nama_lengkap }}</div>
                </div>
                <div class="row align-items-center mt-2">
                    <div class="col-md-2 font-weight-bold">Alamat</div>
                    <div class="col-md-1 text-center">:</div>
                    <div class="col-md-9">{{ $setting->alamat }}</div>
                </div>
                <div class="row align-items-center mt-2">
                    <div class="col-md-2 font-weight-bold">Nomor Hp</div>
                    <div class="col-md-1 text-center">:</div>
                    <div class="col-md-9">{{ $setting->no_hp }}</div>
                </div>
                <div class="row align-items-center mt-2">
                    <div class="col-md-2 font-weight-bold">Email</div>
                    <div class="col-md-1 text-center">:</div>
                    <div class="col-md-9">{{ $setting->email }}</div>
                </div>
                <div class="row align-items-center mt-2">
                    <div class="col-md-2 font-weight-bold">Deskripsi</div>
                    <div class="col-md-1 text-center">:</div>
                    <div class="col-md-9">{{ $setting->deskripsi }}</div>
                </div>
            </div>

            <form class="container mt-5 d-none" id="editProfileContent" action="{{ route('dashboard.settings.update') }}" method="POST">
                @csrf
                <div class="row align-items-center mt-2">
                    <div class="col-md-2 font-weight-bold">Nama</div>
                    <div class="col-md-1 text-center">:</div>
                    <div class="col-md-9"><input type="text" name="nama_lengkap" value="{{ $setting->nama_lengkap }}" class="form-control"></div>
                </div>
                <div class="row align-items-center mt-2">
                    <div class="col-md-2 font-weight-bold">Alamat</div>
                    <div class="col-md-1 text-center">:</div>
                    <div class="col-md-9"><input type="text" name="alamat" value="{{ $setting->alamat }}" class="form-control"></div>
                </div>
                <div class="row align-items-center mt-2">
                    <div class="col-md-2 font-weight-bold">Nomor Hp</div>
                    <div class="col-md-1 text-center">:</div>
                    <div class="col-md-9"><input type="text" name="no_hp" value="{{ $setting->no_hp }}" class="form-control"></div>
                </div>
                <div class="row align-items-center mt-2">
                    <div class="col-md-2 font-weight-bold">Email</div>
                    <div class="col-md-1 text-center">:</div>
                    <div class="col-md-9"><input type="email" name="email" value="{{ $setting->email }}" class="form-control"></div>
                </div>
                <div class="row align-items-center mt-2">
                    <div class="col-md-2 font-weight-bold">Deskripsi</div>
                    <div class="col-md-1 text-center">:</div>
                    <div class="col-md-9"><input type="text" name="deskripsi" value="{{ $setting->deskripsi }}" class="form-control"></div>
                </div>
                <div class="row align-items-center mt-4">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    document.getElementById('profileTab').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('profileContent').classList.remove('d-none');
        document.getElementById('editProfileContent').classList.add('d-none');
        this.classList.add('active');
        document.getElementById('editProfileTab').classList.remove('active');
    });

    document.getElementById('editProfileTab').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('profileContent').classList.add('d-none');
        document.getElementById('editProfileContent').classList.remove('d-none');
        this.classList.add('active');
        document.getElementById('profileTab').classList.remove('active');
    });
</script>
@endsection
