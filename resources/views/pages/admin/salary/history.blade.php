@extends('layouts.admin')

@section('content')
<h1 class="fw-bold fs-3">Riwayat Gaji</h1>

<div class="w-100 p-3 bg-white rounded-3 mt-5 shadow">
    <a href="{{ route('gaji.report') }}" class="btn btn-success">Laporan Gaji</a>

    <table class="table rounded mb-0 mt-3">
        <thead class="table-primary">
            <tr class="text-center">
                <th scope="col" style="width: 10%;">#</th>
                <th scope="col" style="width: 35%;">Nama Karyawan</th>
                <th scope="col" style="width: 25%;">Jabatan</th>
                <th scope="col" style="width: 20%;">Gaji</th>
                <th scope="col" style="width: 10%;">Aksi</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            @foreach ($payrolls as $payroll)

            <tr>
                <td class="text-center fw-bold">{{ $loop->iteration }}</td>
                <td>{{ $payroll->name }}</td>
                <td class="text-center">{{ $payroll->position }}</td>
                <td>Rp.{{ number_format($payroll->salary) }}</td>
                <td class="text-center">
                    <a href="{{route('gaji.generate', $payroll->id)}}" class="btn btn-primary">Cetak</a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

@endsection