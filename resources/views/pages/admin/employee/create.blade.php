@extends('layouts.admin')

@section('content')
    <h1 class="fw-bold fs-3">Tambah Karyawan</h1>

    <div class="w-100 p-4 bg-white rounded-3 mt-5 shadow">
        <form action="{{ route('karyawan.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Jabatan</label>
                <select class="form-select" aria-label="Default select example" id="position" name="position_id">
                    <option selected>Pilih Jabatan</option>
                    @foreach ($positions as $position)
                        <option value="{{ $position->id }}">{{ $position->division->name }} - {{ $position->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control" id=address" name="address" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
