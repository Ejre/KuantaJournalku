<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modalAddCircle" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content border-">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="modalTitleId">
                    <div class="section-titel d-flex align-items-center mb-2">
                        <div class="bullet-section"></div>
                        <span class="ms-3">Tambah Circle Baru</span>
                    </div>
                </h5>
            </div>
            <form action="{{ route('dashboard.add.circle') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="kode" class="form-label">Kode</label>
                                <input type="text" class="form-control" name="kode" id="kode"
                                    placeholder="Kode" required/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="roleName" class="form-label">Nama Circle</label>
                                <input type="text" class="form-control" name="role" id="roleName"
                                    placeholder="Nama Circle Baru" required/>
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
