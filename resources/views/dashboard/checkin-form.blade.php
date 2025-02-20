<div class="modal fade" id="checkInModal" tabindex="-1" aria-labelledby="checkInModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="padding: 20px; max-width: 500px; margin: auto;">
            <div class="modal-header" style="border-bottom: none;">
                <h5 class="modal-title" id="checkInModalLabel" style="font-weight: bold; font-size: 1.5rem;">Check In Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.checkin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="display: flex; gap: 20px;">
                        <div style="flex: 1;">
                            <div class="mb-3">
                                <label for="date" class="form-label" style="font-weight: bold;">Tanggal :</label>
                                <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" style="border-radius: 10px; background-color: #e3f2fd; padding: 10px;" required>
                            </div>
                            <div class="mb-3">
                                <label for="time" class="form-label" style="font-weight: bold;">Waktu :</label>
                                <input type="time" class="form-control" id="time" name="time" value="{{ old('time') }}" style="border-radius: 10px; background-color: #e3f2fd; padding: 10px;" required>
                            </div>
                            <div class="mb-3">
                                <label for="attendance" class="form-label" style="font-weight: bold;">Kehadiran :</label>
                                <select class="form-control" id="attendance" name="attendance" style="border-radius: 10px; background-color: #e3f2fd; padding: 10px;" required>
                                    <option value="" disabled selected>Pilih Kehadiran</option>
                                    <option value="WFO">WFO</option>
                                    <option value="WFH">WFH</option>
                                    <option value="SAKIT">SAKIT</option>
                                    <option value="IZIN">IZIN</option>
                                    <option value="CUTI">CUTI</option>
                                    <option value="DINAS">DINAS</option>
                                </select>
                            </div>
                        </div>
                        <div style="flex: 0 0 100px; display: flex; justify-content: center; align-items: center; flex-direction: column; gap: 10px;">
                            <label for="evidence" class="btn btn-warning" style="background-color: #ffeb3b; border-radius: 50%; width: 60px; height: 60px; border: none;">
                                <i class="bi bi-camera" style="font-size: 24px;"></i>
                            </label>
                            <input type="file" id="evidence" name="evidence" style="display: none;" onchange="loadFile(event)">
                            <span style="font-size: 0.9rem;">Add Photo</span>
                            <img id="output" style="max-width: 80px; max-height: 80px; display: none; border-radius: 10px;"/>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: none; justify-content: flex-end; padding-top: 20px;">
                        <button type="submit" class="btn btn-primary" style="border-radius: 10px; padding: 10px 20px;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function loadFile(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.style.display = 'block';
    }
</script>
