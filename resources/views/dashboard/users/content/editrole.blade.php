@extends('layouts.app')

@section('content')
<form action="{{ route('dashboard.update.role', $role->id) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="kode" class="form-label">Kode</label>
        <input
            type="text"
            class="form-control @error('kode') is-invalid @enderror"
            name="nama"
            id="nama"
            value="{{ old('nama', $role->nama) }}"
            placeholder=""
        />
        @error('role')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100">Update</button>
    </div>


</form>
@endsection
