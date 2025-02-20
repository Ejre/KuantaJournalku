@extends('layouts.app')

@section('content')
<main class="p-4">
    <h4 class="mb-4">Detail of {{ $person->Nama }}</h4>
    <div class="card p-3">
        <form>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="Nama" value="{{ $person->Nama }}" readonly>
            </div>
            <div class="mb-3">
                <label for="no_wa" class="form-label">No WA</label>
                <input type="text" class="form-control" id="no_wa" name="No_WA" value="{{ $person->No_WA }}" readonly>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" class="form-control" id="role" name="Role" value="{{ $person->Role }}" readonly>
            </div>
            <div class="mb-3">
                <label for="circle" class="form-label">Circle</label>
                <input type="text" class="form-control" id="circle" name="Circle" value="{{ $person->Circle }}" readonly>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" name="Status" value="{{ $person->Status }}" readonly>
            </div>
            <a href="{{ route('dashboard.people') }}" class="btn btn-secondary w-100">Back</a>
        </form>
    </div>
</main>
@endsection
