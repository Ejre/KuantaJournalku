@extends('layouts.app')

@section('content')
<main class="p-4" style="background-color: #EEF1F6;">
    <div class="container mt-4">
        <h1 class="mb-4" style="font-size: 1.5rem;">Activity</h1>

        <!-- Tabel Aktivitas -->
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#activitiesModal">
                    <i class="bi bi-table"></i> Add Activity
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="activitiesTable1">
                        <thead>
                            <tr>
                                <th scope="col">Activity</th>
                                <th scope="col">Date</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">End Time</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($activities as $activity)
                                <tr>
                                    <td>{{ $activity->activity }}</td>
                                    <td>{{ $activity->date }}</td>
                                    <td>{{ $activity->waktu_mulai }}</td>
                                    <td>{{ $activity->waktu_selesai }}</td>
                                    <td>{{ $activity->description }}</td>
                                    <td>{{ $activity->status }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.activity.edit', $activity->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('dashboard.activity.delete', $activity->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No activities found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal Add Activity -->
    <form id="activitiesForm" action="{{ route('dashboard.activity.add') }}" method="POST">
        @csrf
        <div class="modal fade" id="activitiesModal" tabindex="-1" aria-labelledby="activitiesModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="activitiesModalLabel">Add New Activity</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="activityName" class="form-label">Activity Name</label>
                            <input type="text" class="form-control" name="activityName" id="activityName" required>
                        </div>
                        <div class="mb-3">
                            <label for="activityDate" class="form-label">Date</label>
                            <input type="date" class="form-control" id="activityDate" name="activityDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="activityWaktu_mulai" class="form-label">Start Time</label>
                            <input type="time" class="form-control" id="activityWaktu_mulai" name="activityWaktu_mulai" required>
                        </div>
                        <div class="mb-3">
                            <label for="activityWaktu_selesai" class="form-label">End Time</label>
                            <input type="time" class="form-control" id="activityWaktu_selesai" name="activityWaktu_selesai" required>
                        </div>
                        <div class="mb-3">
                            <label for="activityDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="activityDescription" name="activityDescription" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="activityStatus" class="form-label">Status</label>
                            <select class="form-control" id="activityStatus" name="activityStatus" required>
                                <option value="">Select Status:</option>
                                <option value="SELESAI">SELESAI</option>
                                <option value="REVISI">REVISI</option>
                                <option value="PROSES">PROSES</option>
                                <option value="BELUM DILAKUKAN">BELUM DILAKUKAN</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Activity</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
@endsection
