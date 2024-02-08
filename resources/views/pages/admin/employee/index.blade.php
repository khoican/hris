@extends('layouts.admin')

@section('content')
    <h1 class="fw-bold fs-3">Karyawan</h1>

    <div class="mt-5">
        <a href="{{ route('karyawan.create') }}" class="btn btn-primary">Tambah Karyawan</a>
    </div>

    <div class="w-100 p-3 bg-white rounded-3 mt-3 shadow">
        <table class="table rounded mb-0">
            <thead class="table-primary">
                <tr class="text-center">
                    <th scope="col" style="width: 10%;">#</th>
                    <th scope="col" style="width: 40%;">Nama Lengkap</th>
                    <th scope="col" style="width: 20%;">Divisi</th>
                    <th scope="col" style="width: 20%;">Jabatan</th>
                    <th scope="col" style="width: 10%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td scope="row" class="text-center fw-bold">{{ $loop->iteration }}</td>
                        <td>{{ $employee->name }}</td>
                        <td class="text-center">{{ $employee->position->division->name }}</td>
                        <td class="text-center">{{ $employee->position->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('karyawan.edit', $employee->id) }}" class="btn btn-primary btn-sm">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
