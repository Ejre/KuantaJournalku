@extends('layouts.app')

@section('content')
<main class="p-4">
    <h4 class="mb-4">List of People</h4>
    <div class="card p-3">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <select class="form-select form-select-sm d-inline-block" style="width: auto;">
                    <option selected>Role: All</option>
                </select>
                <select class="form-select form-select-sm d-inline-block" style="width: auto;">
                    <option selected>Circle: All</option>
                </select>
            </div>
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPeopleModal">Add People</a>
        </div>
        <table class="table table-hover table-striped">
            <thead class="table-light">
                <tr>
                    <th><input type="checkbox"></th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Circle</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($people as $person)
                <tr>
                    <td><input type="checkbox"></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="https://w7.pngwing.com/pngs/782/115/png-transparent-avatar-boy-man-avatar-vol-1-icon-thumbnail.png" class="avatar rounded-circle me-2" alt="Avatar">
                            <div>
                                {{ $person->Nama }}<br>
                                <small class="text-muted">{{ $person->No_WA }}</small>
                            </div>
                        </div>
                    </td>
                    <td>
                        @php
                            $roleClass = strtolower($person->Role);
                        @endphp
                        <span class="badge {{ $roleClass }}">{{ $person->Role }}</span>
                    </td>
                    <td>{{ $person->Circle }}</td>
                    <td><span class="badge bg-success">{{ $person->Status }}</span></td>
                    <td class="action-buttons">
                        @php
                        $wa_number = $person->No_WA;
                        if (substr($wa_number, 0, 2) == '08') {
                            $wa_number = '+62' . substr($wa_number, 1);
                        }
                        @endphp
                        <a href="https://wa.me/{{ $wa_number }}" class="btn btn-link text-success" target="_blank">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <a href="{{ route('dashboard.people.show', $person->id) }}" class="btn btn-link text-primary">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('dashboard.people.edit', $person->id) }}" class="btn btn-link text-warning"><i class="bi bi-pencil"></i></a>

                        <form action="{{ route('dashboard.people.destroy', $person->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Are you sure you want to delete this person?');">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-between mt-3">
            <div>Result: {{ $people->count() }}</div>
        </div>
    </div>

    <!-- Include the add modal here -->
    @include('dashboard.people.addpeople')

</main>

@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
@endsection

<style>
    .avatar {
        width: 30px;
        height: 30px;
    }
    .action-buttons .btn-link {
        padding: 0.25rem;
    }
    .admin {
        background-color: #007bff;
        color: white;
    }
    .karyawan {
        background-color: #17a2b8;
        color: white;
    }
    .magang {
        background-color: #ffc107;
        color: black;
    }
</style>
