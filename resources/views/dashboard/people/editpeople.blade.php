@extends('layouts.app')

@section('content')
<main class="p-4">
    <h4 class="mb-4">Edit People</h4>
    <div class="card p-3">
        <form action="{{ route('dashboard.people.update', $person->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="Nama" value="{{ $person->Nama }}" required>
            </div>
            <div class="mb-3">
                <label for="no_wa" class="form-label">No WA</label>
                <input type="text" class="form-control" id="no_wa" name="No_WA" value="{{ $person->No_WA }}" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="Role" required>
                    <option value="Admin" {{ $person->Role == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Karyawan" {{ $person->Role == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
                    <option value="Magang" {{ $person->Role == 'Magang' ? 'selected' : '' }}>Magang</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="circle" class="form-label">Circle</label>
                <select class="form-select" id="circle" name="Circle" required>
                    <option value="Creative Technology" {{ $person->Circle == 'Creative Technology' ? 'selected' : '' }}>Creative Technology</option>
                    <option value="School Design" {{ $person->Circle == 'School Design' ? 'selected' : '' }}>School Design</option>
                    <option value="Kuanta Institute" {{ $person->Circle == 'Kuanta Institute' ? 'selected' : '' }}>Kuanta Institute</option>
                    <option value="Internet Partnership" {{ $person->Circle == 'Internet Partnership' ? 'selected' : '' }}>Internet Partnership</option>
                    <option value="Strategic Partnership" {{ $person->Circle == 'Strategic Partnership' ? 'selected' : '' }}>Strategic Partnership</option>
                    <option value="HR Finance Operation" {{ $person->Circle == 'HR Finance Operation' ? 'selected' : '' }}>HR Finance Operation</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="Status" required>
                    <option value="Active" {{ $person->Status == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ $person->Status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('dashboard.people') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</main>
@endsection
