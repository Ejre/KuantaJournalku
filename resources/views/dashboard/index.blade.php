@extends('layouts.app')


@section('content')
    <main class="p-4" style="background-color: #EEF1F6;">
        <h4 class="mb-5">Dashboard</h4>
        <div class="col">
            {{-- Card Jumlah --}}
            <div class="row row justify-content-between">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-center shadow-sm py-1" id="wfo">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <div><i class="bi bi-building-fill" style="color: #0DBB7E; font-size: 52px;"></i></div>
                                <!-- Icon pesawat -->
                                <div class="text-start ms-2">
                                    <span class="card-title fw-bold">WFO</span><br>
                                    <span class="card-text fw-semibold" style="color: #0DBB7E;">30 Orang</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-center shadow-sm py-1" id="wfh">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <div><i class="bi bi-house-fill " style="color: #4E77F5; font-size: 52px;"></i></div> <!-- Icon rumah -->
                                <div class="text-start ms-2">
                                    <span class="card-title fw-bold" style="backround-color: ">WFH</span><br>
                                    <span class="card-text fw-semibold" style="color: #4E77F5;">20 Orang</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-center shadow-sm py-1" id="dinas-luar">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <div><i class="bi bi-airplane-fill " style="color: #F98660; font-size: 52px;"></i></div>
                                <!-- Icon pesawat -->
                                <div class="text-start ms-2">
                                    <span class="card-title fw-bold">Dinas Luar</span><br>
                                    <span class="card-text fw-semibold" style="color: #F98660;">10 Orang</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-center shadow-sm py-1" id="izin-sakit">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <div><i class="bi bi-person-fill-x" style="color: #AC24D9; font-size: 52px;"></i></div>
                                <!-- Icon orang dengan tanda silang -->
                                <div class="text-start ms-2">
                                    <span class="card-title fw-bold">Izin atau Sakit</span><br>
                                    <span class="card-text fw-semibold" style="color: #AC24D9;">5 Orang</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card Detail Presensi --}}
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm py-1 border-0">
                        <div class="p-3">
                            <span class="fw-bold">WFO</span>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-person-circle fs-3 me-2"></i> Arya Anugrah
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-person-circle fs-3 me-2"></i> Farhan Sekarang
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-person-circle fs-3 me-2"></i> Raffel Firmansyah
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-person-circle fs-3 me-2"></i> Ezra Firdaus
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-person-circle fs-3 me-2"></i> Farhan Dulu
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm py-1 border-0">
                        <div class="p-3">
                            <span>WFH</span>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-person-circle fs-3 me-2"></i> Arya Anugrah
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-person-circle fs-3 me-2"></i> Raffel Firmansyah
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-person-circle fs-3 me-2"></i> Farhan Sekarang
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-person-circle fs-3 me-2"></i> Farhan Dulu
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm py-1 border-0">
                        <div class="p-3">
                            <span>Dinas Luar</span>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-person-circle fs-3 me-2"></i> Arya Anugrah
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm py-1 border-0">
                        <div class="p-3">
                            <span>Izin atau Sakit</span>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-person-circle fs-3 me-2"></i> Arya Anugrah
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-person-circle fs-3 me-2"></i> Raffel Firmansyah
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Log Kehadiran --}}
            <div class="card shadow-sm rounded-4">
                <div class="p-3 d-flex justify-content-between align-items-center">
                    <span class="mb-0 fw-bold">Logs Kehadiran</span>
                    <div class="d-flex align-items-center">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <select class="form-select d-inline w-auto">
                                    <option selected>2027</option>
                                    <option selected>2026</option>
                                    <option selected>2025</option>
                                    <option selected>2024</option>
                                    <option selected>2023</option>
                                    <option selected>2022</option>
                                    <option selected>2021</option>
                                    <option selected>2020</option>
                                </select>
                                <select class="form-select d-inline w-auto">
                                    <option selected>Desember</option>
                                    <option selected>November</option>
                                    <option selected>October</option>
                                    <option selected>September</option>
                                    <option selected>Agustus</option>
                                    <option selected>Juli</option>
                                    <option selected>Juni</option>
                                    <option selected>Mei</option>
                                    <option selected>April</option>
                                    <option selected>Maret</option>
                                    <option selected>Februari</option>
                                    <option selected>Januari</option>
                                </select>
                                <select class="form-select d-inline w-auto">
                                    <option selected>08</option>
                                    <option selected>09</option>
                                    <option selected>10</option>
                                    <option selected>11</option>
                                    <option selected>12</option>

                                </select>
                            </div>
                        </div>
                        <span class="mx-3"> | </span>
                        <button class="btn btn-outline-danger"><i class="bi bi-file-earmark-pdf"></i> PDF</button>
                        <button class="btn btn-outline-success"><i class="bi bi-file-earmark-excel"></i> XLSX</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table responsive table-hover">
                        <thead class="table-header">
                            <tr class="table-warning">
                                <th>Nama <i class="bi bi-chevron-expand"></i></th>
                                <th>Tanggal</th>
                                <th>Waktu Mulai <i class="bi bi-chevron-expand"></i></th>
                                <th>Waktu Selesai<i class="bi bi-chevron-expand"></i></th>
                                <th>Durasi Kerja<i class="bi bi-chevron-expand"></i></th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Arya Anugrah</td>
                                <td>Senin, 08 Juli 2024</td>
                                <td>08:00:12 AM</td>
                                <td>16:01:28 PM</td>
                                <td>08:01:40</td>
                                <td><span class="badge text-bg-success">On Time</span></td>
                            </tr>
                            <tr>
                                <td>Arya Anugrah</td>
                                <td>Senin, 08 Juli 2024</td>
                                <td>08:00:12 AM</td>
                                <td>16:01:28 PM</td>
                                <td>08:01:40</td>
                                <td><span class="badge text-bg-warning">Late</span></td>
                            </tr>
                            <tr>
                                <td>Arya Anugrah</td>
                                <td>Senin, 08 Juli 2024</td>
                                <td>08:00:12 AM</td>
                                <td>16:01:28 PM</td>
                                <td>08:01:40</td>
                                <td><span class="badge text-bg-danger">Absent</span></td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            Result <select class="form-select d-inline w-auto">
                                <option selected>1-10</option>
                                <!-- Add more options as needed -->
                            </select> of 16
                        </div>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>


        </div>
    </main>
@endsection
