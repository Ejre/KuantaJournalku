@extends('layouts.app')


@section('content')
<main class="p-4" style="background-color: #EEF1F6;">
        <!-- Welcome Card -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div>
                    <h1 class="h4 mb-1">Selamat Datang</h1>
                    <p class="h5 text-primary mb-2">{{ auth()->user()->username }}</p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkInModal">Check In</button>
                </div>
                <img src="{{ asset('images/logocheckin.png') }}" class="me-3" style="width: 500px; height: auto; display: block; margin-left: auto;">
            </div>
        </div>
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

        </div>
    </main>
    @include('dashboard.checkin-form') {{-- Memanggil file form modal --}}
@endsection
