@extends('layouts.app')

@section('content')
<main class="p-4" style="background-color:#EEF1F6;">
    <h4>Report</h4>
    <div class="report-container bg-light p-4 rounded">
        <!-- Filter dan Export Buttons -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="filters d-flex">
                <!-- Filter Role -->
                <div class="me-3">
                    <label for="roleFilter" class="d-flex align-items-center">
                        <span>Role:</span>
                        <select id="roleFilter" class="form-select d-inline-block w-auto ms-2 border-0 text-warning">
                            <option>All</option>
                            <option>Admin</option>
                            <option>Karyawan</option>
                            <option>Magang</option>
                        </select>
                    </label>
                </div>
                <!-- Filter Circle -->
                <div>
                    <label for="circleFilter" class="d-flex align-items-center">
                        <span>Circle:</span>
                        <select id="circleFilter" class="form-select d-inline-block w-auto ms-2 border-0 text-warning">
                            <option>All</option>
                            <!-- belum ada sirkel -->
                        </select>
                    </label>
                </div>
            </div>
            <!-- Filter Tanggal dan Export -->
            <div class="date-filter d-flex align-items-center">
                <select class="form-select me-2">
                    @php
                        $years = range(date('Y'), date('Y') - 10);
                    @endphp
                    @foreach($years as $year)
                        <option>{{ $year }}</option>
                    @endforeach
                </select>
                <select class="form-select me-2">
                    @php
                        $months = [
                            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                        ];
                    @endphp
                    @foreach($months as $month)
                        <option>{{ $month }}</option>
                    @endforeach
                </select>
                <button class="bi bi-filetype-pdf" style="border: none; color: red; font-size: 2em; background-color:#F8F9FA;"></button>
                <button class="bi bi-filetype-xlsx" style="border: none; color: green; font-size: 2em; background-color:#F8F9FA"></button>
            </div>
        </div>

        <!-- Tabel Data -->
        <div class="table-responsive">
            <table class="table table" id="reportTable">
                <thead>
                    <tr>
                        <th onclick="sortTable(0)">Nama <span class="sort-icon">&#9650;</span></th>
                        <th>Role</th>
                        <th onclick="sortTable(2)">Circle <span class="sort-icon">&#9650;</span></th>
                        <th>WFO/Jam</th>
                        <th>WFH</th>
                        <th>Izin atau Sakit</th>
                        <th>Total Jam</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Arya Anugrah Maulidin</td>
                        <td>Anak magang</td>
                        <td>Creative Technology</td>
                        <td>140</td>
                        <td>40</td>
                        <td>-</td>
                        <td>180</td>
                    </tr>
                    <tr>
                        <td>Muhammad Farhan Siregar</td>
                        <td>Anak magang</td>
                        <td>Creative Technology</td>
                        <td>180</td>
                        <td>10</td>
                        <td>3</td>
                        <td>190</td>
                    </tr>
                    <tr>
                        <td>Hisyam Mohammad Alam</td>
                        <td>Anak magang</td>
                        <td>Creative Technology</td>
                        <td>190</td>
                        <td>10</td>
                        <td>-</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td>Fransisco Wahyu Syahbani</td>
                        <td>Anak magang</td>
                        <td>Creative Technology</td>
                        <td>200</td>
                        <td>10</td>
                        <td>-</td>
                        <td>210</td>
                    </tr>
                    <tr>
                        <td>Raffel Firmansyah Cahyono</td>
                        <td>Anak magang</td>
                        <td>Internet Protocol</td>
                        <td>220</td>
                        <td>10</td>
                        <td>-</td>
                        <td>230</td>
                    </tr>
                    <tr>
                        <td>Muhammad Ezra Firdaus</td>
                        <td>Anak magang</td>
                        <td>Internet Protocol</td>
                        <td>210</td>
                        <td>10</td>
                        <td>-</td>
                        <td>220</td>
                    </tr>
                    <tr>
                        <td>Muhamad Arsyad</td>
                        <td>Admin dan Karyawan</td>
                        <td>Creative Technology</td>
                        <td>230</td>
                        <td>10</td>
                        <td>-</td>
                        <td>240</td>
                    </tr>
                    <tr>
                        <td>Panggih Muwaffaq</td>
                        <td>Admin dan Karyawan</td>
                        <td>Creative Technology</td>
                        <td>240</td>
                        <td>10</td>
                        <td>9</td>
                        <td>250</td>
                    </tr>
                    <tr>
                        <td>Fadhil Muhammad</td>
                        <td>Admin dan Karyawan</td>
                        <td>Creative Technology</td>
                        <td>250</td>
                        <td>10</td>
                        <td>10</td>
                        <td>260</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
                <label for="resultFilter">Result</label>
                <select id="resultFilter" class="form-select d-inline-block w-auto ms-2">
                    <option>1 - 10</option>
                    <!-- Add other result options here -->
                </select>
                <span class="ms-2">of 16</span>
            </div>
            <div>
                <nav aria-label="Page navigation example">
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
</main>

<script>
    function sortTable(columnIndex) {
        const table = document.getElementById("reportTable");
        const rows = Array.from(table.rows).slice(1); // Skip the header row
        const isAscending = table.rows[0].cells[columnIndex].querySelector(".sort-icon").textContent === "▲";
        
        rows.sort((a, b) => {
            const cellA = a.cells[columnIndex].textContent.trim();
            const cellB = b.cells[columnIndex].textContent.trim();

            if (!isNaN(cellA) && !isNaN(cellB)) {
                return isAscending ? cellA - cellB : cellB - cellA;
            }

            return isAscending ? cellA.localeCompare(cellB) : cellB.localeCompare(cellA);
        });

        rows.forEach(row => table.tBodies[0].appendChild(row));
        
        // Update the sort icon
        const sortIcon = table.rows[0].cells[columnIndex].querySelector(".sort-icon");
        sortIcon.textContent = isAscending ? "▼" : "▲";
    }
</script>
@endsection
