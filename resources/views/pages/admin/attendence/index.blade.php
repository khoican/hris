@extends('layouts.admin')

@section('content')
    <h1 class="fw-bold fs-3">Absensi</h1>

    <div class="w-100 p-3 bg-white rounded-3 mt-5 shadow">
        <table class="table rounded mb-0">
            <thead class="table-primary">
                <tr class="text-center">
                    <th scope="col" style="width: 10%;">#</th>
                    <th scope="col" style="width: 60%;">Nama Lengkap</th>
                    <th scope="col" style="width: 15%;">Kehadiran</th>
                    <th scope="col" style="width: 15%;">Tidak Hadir</th>
                </tr>
            </thead>
            <tbody>
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
@endsection
