@extends('layouts.admin')

@section('content')
    <h1 class="fw-bold fs-3">Tambah Karyawan</h1>

    <div class="w-100 p-4 bg-white rounded-3 mt-5 shadow">
        <form action="{{ route('karyawan.update', $employee->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $employee->name) }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', $employee->email) }}">
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Jabatan</label>
                <select class="form-select" aria-label="Default select example" id="position" name="position_id">
                    <option selected>Pilih Jabatan</option>
                    @foreach ($positions as $position)
                        <option value="{{ $position->id }}"
                            {{ old('position_id', $employee->position_id) == $position->id ? 'selected' : '' }}>
                            {{ $position->division->name }} - {{ $position->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    value="{{ old('phone', $employee->phone) }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control" id=address" name="address" rows="3">{{ old('address', $employee->address) }}</textarea>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div class="mt-4 w-full p-3 border border-danger rounded text-end">
            <h5>Hapus</h5>
            <p>Pastikan anda yakin ingin menghapus data ini</p>

            <form action="{{ route('karyawan.destroy', $employee->id) }}" method="post" class="mt-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
@endsection
