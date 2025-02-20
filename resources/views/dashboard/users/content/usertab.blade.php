<div class="py-1 px-4 pb-3 border-bottom border-2 d-flex justify-content-between align-items-center">
    <span class="fw-semibold">List of User</span>
    <button class="btn btn-sm btn-primary rounded-3 text-white" data-bs-toggle="modal" data-bs-target="#modalAdduser">Add User</button>
</div>
<div class="">
    <div class="filter-row d-flex w-100 px-4 py-2">
        <div class="d-flex align-items-center ">
            <label for="filterByRole" class="text-muted">Role:</label>
            <select class="form-select form-select-sm ms-1 text-warning border-0" id="filterByRole">
                <option selected value="All Role">All Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->nama }}">{{ $role->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="d-flex align-items-center ms-2">
            <label for="filterByCircle" class="text-muted">Circle:</label>
            <select class="form-select form-select-sm ms-1 text-warning border-0" id="filterByCircle">
                <option selected value="All Circle">All Circle</option>
                @foreach ($circles as $circle)
                    <option value="{{ $circle->nama }}">{{ $circle->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th class="py-2 fw-semibold ps-md-4 border-0" scope="col" style="width: 12px;">
                        <input class="form-check-input kj-input-checkbox" type="checkbox" value="" id="cbCheckAllUser" />
                    </th>
                    <th class="py-2 fw-semibold border-0" scope="col">Nama</th>
                    <th class="py-2 fw-semibold border-0" scope="col">Role</th>
                    <th class="py-2 fw-semibold border-0" scope="col">Circle</th>
                    <th class="py-2 fw-semibold border-0" scope="col"></th>
                </tr>
            </thead>
            <tbody id="userList">
                @foreach ($users as $user)
                    <tr class="user-row">
                        <td class="ps-md-4 align-middle" scope="row">
                            <input class="form-check-input cb-row-user kj-input-checkbox" name="cb-row-user" type="checkbox" value="{{ $user->email }}" />
                        </td>
                        <td class="align-middle">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle border" width="42" height="42" src="{{ Vite::asset('resources/images/dummy-avatar.png') }}" alt="avatar">
                                <div class="d-flex flex-column ms-2">
                                    <span>{{ $user->username }}</span>
                                    <small class="text-muted">{{ $user->email }}</small>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">
                            @foreach ($user->roles as $role)
                                <span class="me-1 py-1 px-3 text-white rounded-3 @if($role->nama == 'Admin') bg-primary @elseif($role->nama == 'Karyawan') kj-bg-karyawan @elseif($role->nama == 'Magang') bg-warning @else bg-secondary @endif" style="font-size: 12px;">
                                    {{ $role->nama }}
                                </span>
                            @endforeach
                        </td>
                        <td class="align-middle">
                            @foreach ($user->circles as $circle)
                                <span class="fw-medium" style="font-size: 12px;">
                                    {{ $circle->nama }}
                                </span>
                            @endforeach
                        </td>
                        <td class="align-middle">
                            <a href="{{ route('dashboard.edit.user', $user->id) }}" class="text-decoration-none">
                                <i class="bi bi-pencil-square fs-4 text-warning"></i>
                            </a>
                            <a href="{{ route('dashboard.delete.user', $user->id) }}" class="text-decoration-none ms-2" onclick="event.preventDefault(); if(confirm('Apakah anda ingin menghapusnya?')) { document.getElementById('delete-user-form-{{ $user->id }}').submit(); }">
                                <i class="bi bi-trash fs-4 text-danger"></i>
                            </a>
                            <form id="delete-user-form-{{ $user->id }}" action="{{ route('dashboard.delete.user', $user->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterByRole = document.getElementById('filterByRole');
        const filterByCircle = document.getElementById('filterByCircle');
        const userList = document.getElementById('userList');
        const userRows = document.querySelectorAll('.user-row');

        filterByRole.addEventListener('change', filterUsers);
        filterByCircle.addEventListener('change', filterUsers);

        function filterUsers() {
            const selectedRole = filterByRole.value;
            const selectedCircle = filterByCircle.value;

            userRows.forEach(row => {
                const roleSpans = row.querySelectorAll('td:nth-child(3) span');
                const circleSpans = row.querySelectorAll('td:nth-child(4) span');

                const roles = Array.from(roleSpans).map(span => span.textContent.trim());
                const circles = Array.from(circleSpans).map(span => span.textContent.trim());

                const matchesRole = (selectedRole === 'All Role') || roles.includes(selectedRole);
                const matchesCircle = (selectedCircle === 'All Circle') || circles.includes(selectedCircle);

                if (matchesRole && matchesCircle) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    });
</script>
