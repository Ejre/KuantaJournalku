<div class="modal fade" id="addPeopleModal" tabindex="-1" aria-labelledby="addPeopleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPeopleModalLabel">Add People</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.people.store') }}" method="POST" id="addPeopleForm">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="Nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_wa" class="form-label">No WA</label>
                        <input type="text" class="form-control" id="no_wa" name="No_WA" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="Role" required>
                            <option value="Admin">Admin</option>
                            <option value="Karyawan">Karyawan</option>
                            <option value="Magang">Magang</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="circle" class="form-label">Circle</label>
                        <select class="form-select" id="circle" name="Circle" required>
                            <option value="Creative Technology">Creative Technology</option>
                            <option value="School Design">School Design</option>
                            <option value="Kuanta Institute">Kuanta Institute</option>
                            <option value="Internet Partnership">Internet Partnership</option>
                            <option value="Strategic Partnership">Strategic Partnership</option>
                            <option value="HR Financean Operation">HR Finance Operation</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="Status" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
