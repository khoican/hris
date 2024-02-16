@extends('layouts.admin')

@section('content')

<h1 class="fw-bold fs-3">Riwayat Gaji</h1>

<div class="mt-5 w-100 p-3 bg-white rounded-3">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Bulan</th>
                <th scope="col">Gaji Pokok</th>
                <th scope="col">Tunjangan</th>
                <th scope="col">Total Gaji</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($payrolls as $payroll)
            <tr>
                <td>{{ $payroll->created_at->format('F Y') }}</td>
                <td>Rp.{{ number_format($payroll->basic_salary) }}</td>
                <td>Rp.{{ number_format($payroll->tunjangan) }}</td>
                <td>Rp.{{ number_format($payroll->total) }}</td>
                <td>
                    <a href="{{ route('gaji.slip', $payroll->id) }}" class="btn btn-sm btn-primary">Slip gaji</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection