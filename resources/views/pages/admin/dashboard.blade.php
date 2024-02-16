@extends('layouts.admin')

@section('content')
<h1 class="fw-bold fs-3">Dashboard</h1>

<div class="w-full d-flex justify-content-between mt-5">
    <div class="d-flex justify-content-between align-items-center border border-primary px-4 py-3 rounded-3"
        style="width: 33%">
        <div class="d-flex flex-column gap-2">
            <p>Total Karyawan</p>
            <p class="fw-bold fs-2">{{ $totalEmployees }}</p>
        </div>
        <i class="bi bi-people-fill fs-1"></i>
    </div>
    <div class="d-flex justify-content-between align-items-center border border-warning px-4 py-3 rounded-3"
        style="width: 33%">
        <div class="d-flex flex-column gap-2">
            <p>Prosentae Absensi Harian</p>
            <p class="fw-bold fs-2">{{ $totalAttendances }} %</p>
        </div>
        <i class="bi bi-card-checklist fs-1"></i>
    </div>
    <div class="d-flex justify-content-between align-items-center border border-success px-4 py-3 rounded-3"
        style="width: 33%">
        <div class="d-flex flex-column gap-2">
            <p>Divisi</p>
            <p class="fw-bold fs-2">{{ $totalDivisions }}</p>
        </div>
        <i class="bi bi-building fs-1"></i>
    </div>
</div>

<div class="w-full mt-5 p-3 bg-white rounded">
    <h1 class="fw-bold mb-3 fs-5">Data Karyawan</h1>
    <table class="table rounded mb-0">
        <thead class="table-primary">
            <tr class="text-center">
                <th scope="col" style="width: 10%;">#</th>
                <th scope="col" style="width: 50%;">Nama Lengkap</th>
                <th scope="col" style="width: 20%;">Divisi</th>
                <th scope="col" style="width: 20%;">Jabatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $employee)
            <tr>
                <td scope="row" class="text-center fw-bold">{{ $loop->iteration }}</td>
                <td>{{ $employee->name }}</td>
                <td class="text-center">{{ $employee->position->division->name }}</td>
                <td class="text-center">{{ $employee->position->name }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection