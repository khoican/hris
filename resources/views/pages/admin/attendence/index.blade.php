@extends('layouts.admin')

@section('content')
<h1 class="fw-bold fs-3">Absensi</h1>

<div class="w-100 p-3 bg-white rounded-3 mt-5 shadow">
    <div class="d-flex justify-content-between">
        <a href="" class="btn btn-success">Laporan</a>

        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Filter
            </button>
            <ul class="dropdown-menu p-3 bg-white">
                <div class="mb-3">
                    <label for="year">Tahun</label>
                    <select id="year" name="year" class="form-select bg-white">
                        @php
                        $currentYear = date("Y");
                        $startYear = 2020;
                        @endphp
                        @for ($year = $currentYear; $year >= $startYear; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
                <div class="mb-3">
                    <label for="month">Tahun</label>
                    <select id="month" name="month" class="form-select bg-white">
                        @php
                        $monthArray = ['Pilih Bulan', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                        'Agustus', 'September', 'Oktober', 'Nobermber', 'Desember']
                        @endphp
                        @for ($month = 0; $month < count($monthArray); $month++) <option value="{{ $month }}">{{
                            $monthArray[$month] }}</option>
                            @endfor
                    </select>
                </div>
            </ul>
        </div>
    </div>

    <table class="table rounded mb-0 mt-3">
        <thead class="table-primary">
            <tr class="text-center">
                <th scope="col" style="width: 10%;">#</th>
                <th scope="col" style="width: 60%;">Nama Lengkap</th>
                <th scope="col" style="width: 15%;">Kehadiran</th>
                <th scope="col" style="width: 15%;">Tidak Hadir</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            @foreach ($attendanceSumary as $attendance)
            <tr>
                <td scope="row" class="text-center fw-bold">{{ $loop->iteration }}</td>
                <td>{{ $attendance['employee'] }}</td>
                <td class="text-center">{{ $attendance['totalAttendanceDays'] }}</td>
                <td class="text-center">{{ $attendance['totalAbsenceDays'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    let year = document.getElementById('year');
        let month = document.getElementById('month');

        year.addEventListener('change', filterTable);
        month.addEventListener('change', filterTable);

        function filterTable() {
            const selectedYear = year.value
            const selectedMonth = month.value

            console.log(selectedYear)
            console.log(selectedMonth)

            fetch(`/absen/filter?year=${selectedYear}&month=${selectedMonth}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('tableBody').innerHTML = generateTableRows(data);
                    console.log(data)
                })
                .catch(error => console.log(error))
        }

        function generateTableRows(data) {
            let rows = ''

            data.forEach((item, index) => {
            rows += `<tr>
                        <td scope="row" class="text-center fw-bold">${index+1}</td>
                        <td>${ item.employee }</td>
                        <td class="text-center">${ item.totalAttendanceDays }</td>
                        <td class="text-center">${ item.totalAbsenceDays }</td>
                    </tr>`;
            });
            return rows;
        }
</script>
@endsection