@extends('layouts.app')

@section('content')
<form action="{{ route('dashboard.update.user', $user->id) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input
            type="text"
            class="form-control @error('username') is-invalid @enderror"
            name="username"
            id="username"
            value="{{ old('username') ?? $user->username }}"
            placeholder="Masukkan Username"
        />
        @error('username')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input
            type="email"
            class="form-control @error('email') is-invalid @enderror"
            name="email"
            id="email"
            value="{{ old('email') ?? $user->email }}"
            placeholder="Masukkan Email"
        />
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input
            type="password"
            class="form-control @error('password') is-invalid @enderror"
            name="password"
            id="password"
            placeholder="Masukkan Password (Biarkan kosong jika tidak ingin mengubah)"
        />
        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
        <input
            type="password"
            class="form-control @error('password_confirmation') is-invalid @enderror"
            name="password_confirmation"
            id="password_confirmation"
            placeholder="Masukkan Konfirmasi Password"
        />
        @error('password_confirmation')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="roles" class="form-label">Roles</label>
        <select class="form-select @error('roles') is-invalid @enderror" name="roles[]" id="roles" multiple>
            @foreach ($role as $role)
                <option value="{{ $role->id }}"
                    @if($user->roles->pluck('id')->contains($role->id)) selected @endif>
                    {{ $role->nama }}
                </option>
            @endforeach
        </select>
        @error('roles')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="circle_id" class="form-label">Circle</label>
        <select class="form-select @error('circle_id') is-invalid @enderror" name="circle_id" id="circle_id">
            @foreach ($circle as $circle)
                <option value="{{ $circle->id }}"
                    @if($user->circles->pluck('id')->contains($circle->id)) selected @endif>
                    {{ $circle->nama }}
                </option>
            @endforeach
        </select>
        @error('circle_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100">Update</button>
    </div>
</form>
@endsection
