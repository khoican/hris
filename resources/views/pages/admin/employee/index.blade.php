@extends('layouts.admin')

@section('content')

@if (session()->has('success'))

<div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 w-100" role="alert">
    <strong>Berhasil</strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@elseif (session()->has('error'))

<div class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0 w-100" role="alert">
    <strong>Gagal</strong> {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

<h1 class="fw-bold fs-3">Karyawan</h1>

<div class="mt-5">
    <a href="{{ route('karyawan.create') }}" class="btn btn-primary">Tambah Karyawan</a>
</div>

<div class="w-100 p-3 bg-white rounded-3 mt-3 shadow">
    <table class="table rounded mb-0">
        <thead class="table-primary">
            <tr class="text-center">
                <th scope="col" style="width: 10%;">#</th>
                <th scope="col" style="width: 30%;">Nama Lengkap</th>
                <th scope="col" style="width: 20%;">Divisi</th>
                <th scope="col" style="width: 20%;">Jabatan</th>
                <th scope="col" style="width: 20%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td scope="row" class="text-center fw-bold">{{ $loop->iteration }}</td>
                <td>{{ $employee->name }}</td>
                <td class="text-center">{{ $employee->position->division->name }}</td>
                <td class="text-center">{{ $employee->position->name }}</td>
                <td class="text-center d-flex gap-2 justify-content-center">
                    @if(!$employee->user)
                    <form action="{{ route('user.store', $employee->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">Tambah User</button>
                    </form>
                    @endif
                    <a href="{{ route('karyawan.edit', $employee->id) }}" class="btn btn-primary btn-sm">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection