<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modalAdduser" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content border-">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="modalTitleId">
                    <div class="section-titel d-flex align-items-center mb-2">
                        <div class="bullet-section"></div>
                        <span class="ms-3">Tambah Pengguna Baru</span>
                    </div>
                </h5>
            </div>
            <form action="{{ route('dashboard.add.user') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="username" id="username"
                            placeholder="Masukan Nama Lengkap" required />
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat"
                            placeholder="Masukan Alamat" required />
                    </div>
                    <div class="mb-3">
                        <label for="nomor_wa" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" name="nomor_wa" id="nomor_wa"
                            placeholder="Masukan Nomor HP" required />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Masukan Email" required />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Masukan Password" required />
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                            placeholder="Konfirmasi Password" required />
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="circle" class="form-label">Circle</label>
                                <select class="form-select" name="circle_id" id="circle">
                                    <option selected disabled>Select one</option>
                                    @foreach ($circles as $circle)
                                        <option value="{{ $circle->id }}">{{ $circle->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-select" name="roles[]" id="role" multiple>
                                    <option selected disabled>Select one</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn text-danger" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary text-white">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
