@extends('layouts.admin')

@section('content')

<div>
    <h1 class="fw-bold fs-3">Profil</h1>

    <div class="mt-5 bg-white p-3 rounded">
        <table>
            <tr>
                <td class="fw-bold" style="width: 40%">ID Karyawan</td>
                <td class="text-center" style="width: 10%">:</td>
                <td style="width: 50%">{{ $employee->id }}</td>
            </tr>
            <tr>
                <td class="fw-bold" style="width: 40%">Nama Karyawan</td>
                <td class="text-center" style="width: 10%">:</td>
                <td style="width: 50%">{{ $employee->name }}</td>
            </tr>
            <tr>
                <td class="fw-bold" style="width: 40%">Jabatan - Divisi</td>
                <td class="text-center" style="width: 10%">:</td>
                <td style="width: 50%">{{ $employee->position->name }} - {{ $employee->position->division->name }}</td>
            </tr>
            <tr>
                <td class="fw-bold" style="width: 40%">Email</td>
                <td class="text-center" style="width: 10%">:</td>
                <td style="width: 50%">{{ $employee->email }}</td>
            </tr>
            <tr>
                <td class="fw-bold" style="width: 40%">No. Telepon</td>
                <td class="text-center" style="width: 10%">:</td>
                <td style="width: 50%">{{ $employee->phone }}</td>
            </tr>
            <tr>
                <td class="fw-bold" style="width: 40%">Alamat</td>
                <td class="text-center" style="width: 10%">:</td>
                <td style="width: 50">{{ $employee->address }}</td>
            </tr>
        </table>
    </div>
</div>

@endsection