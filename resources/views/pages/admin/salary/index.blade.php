@extends('layouts.admin')

@section('content')
<h1 class="fw-bold fs-3">Manajemen Gaji</h1>

<div class="w-100 p-3 bg-white rounded-3 mt-5 shadow">
    <a href="/gaji/riwayat" class="btn btn-primary">Riwayat Gaji</a>

    <table class="table rounded mb-0 mt-3">
        <thead class="table-primary">
            <tr class="text-center">
                <th scope="col" style="width: 10%;">#</th>
                <th scope="col" style="width: 30%;">Nama Lengkap</th>
                <th scope="col" style="width: 25%;">Jabatan</th>
                <th scope="col" style="width: 10%;">Kehadiran</th>
                <th scope="col" style="width: 15%;">Gaji</th>
                <th scope="col" style="width: 10%;">Aksi</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            @foreach ($employees as $employee)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $employee->name }}</td>
                <td class="text-center">{{ $employee->position->division->name }} - {{ $employee->position->name }}</td>
                <td class="text-center">{{ $employee->totalAttendanceDays($employee->id) }}</td>
                <td>Rp.{{ number_format($employee->totalSalary($employee->totalAttendanceDays($employee->id))) }}</td>
                <td class="text-center">
                    <a href="gaji/{{ $employee->id }}" class="btn btn-primary">Bayar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection