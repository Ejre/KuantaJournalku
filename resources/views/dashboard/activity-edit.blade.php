@extends('layouts.app')

@section('content')
<main class="p-4" style="background-color: #EEF1F6;">
    <div class="container mt-4">
        <h1 class="mb-4" style="font-size: 1.5rem;">Edit Activity</h1>

        <form action="{{ route('dashboard.activity.update', $activity->id) }}" method="POST">
            @csrf
            {{-- @method('PUT') --}}

            <div class="mb-3">
                <label for="activityName" class="form-label">Activity Name</label>
                <input type="text" class="form-control" name="activityName" id="activityName" value="{{ old('activityName', $activity->activity) }}" required>
            </div>
            <div class="mb-3">
                <label for="activityDescription" class="form-label">Description</label>
                <textarea class="form-control" id="activityDescription" name="activityDescription" rows="3" required>{{ old('activityDescription', $activity->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="activityDate" class="form-label">Date</label>
                <input type="date" class="form-control" id="activityDate" name="activityDate" value="{{ old('activityDate', $activity->date) }}" required>
            </div>
            <div class="mb-3">
                <label for="activityWaktu_mulai" class="form-label">Waktu Mulai</label>
                <input type="time" class="form-control" id="activityWaktu_mulai" name="activityWaktu_mulai" value="{{ old('activityWaktu_mulai', $activity->waktu_mulai) }}" required>
            </div>
            <div class="mb-3">
                <label for="activityWaktu_selesai" class="form-label">Waktu Selesai</label>
                <input type="time" class="form-control" id="activityWaktu_selesai" name="activityWaktu_selesai" value="{{ old('activityWaktu_selesai', $activity->waktu_selesai) }}" required>
            </div>
            <div class="mb-3">
                <label for="activityStatus" class="form-label">Status</label>
                <select class="form-control" id="activityStatus" name="activityStatus" required>
                    <option value="">Pilih Status :</option>
                    <option value="SELESAI" {{ old('activityStatus', $activity->status) == 'SELESAI' ? 'selected' : '' }}>SELESAI</option>
                    <option value="REVISI" {{ old('activityStatus', $activity->status) == 'REVISI' ? 'selected' : '' }}>REVISI</option>
                    <option value="PROSES" {{ old('activityStatus', $activity->status) == 'PROSES' ? 'selected' : '' }}>PROSES</option>
                    <option value="BELUM DILAKUKAN" {{ old('activityStatus', $activity->status) == 'BELUM DILAKUKAN' ? 'selected' : '' }}>BELUM DILAKUKAN</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Activity</button>
        </form>
    </div>
</main>
@endsection
