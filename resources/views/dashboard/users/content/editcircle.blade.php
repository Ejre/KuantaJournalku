@extends('layouts.app')

@section('content')
<form action="{{ route('dashboard.update.circle', $circle->id) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="kode" class="form-label">Kode</label>
        <input
            type="text"
            class="form-control @error('kode') is-invalid @enderror"
            name="kode"
            id="kode"
            value="{{ old('kode') ?? $circle->kode }}"
            placeholder=""
        />
        @error('kode')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <input
            type="text"
            class="form-control"
            name="role"
            id="role"
            value="{{ $circle->nama }}"
            placeholder=""
        />
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100">Update</button>
    </div>


</form>
@endsection
