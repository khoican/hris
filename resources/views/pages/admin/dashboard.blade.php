@extends('layouts.admin')

@section('content')
    <h1 class="fw-bold fs-3">Dashboard</h1>

    <div class="w-full d-flex justify-content-between mt-5">
        <div class="d-flex justify-content-between align-items-center border border-primary px-4 py-3 rounded-3"
            style="width: 33%">
            <div class="d-flex flex-column gap-2">
                <p>Total Karyawan</p>
                <p class="fw-bold fs-2">100</p>
            </div>
            <i class="bi bi-people-fill fs-1"></i>
        </div>
        <div class="d-flex justify-content-between align-items-center border border-warning px-4 py-3 rounded-3"
            style="width: 33%">
            <div class="d-flex flex-column gap-2">
                <p>Prosentae Absensi Harian</p>
                <p class="fw-bold fs-2">100%</p>
            </div>
            <i class="bi bi-card-checklist fs-1"></i>
        </div>
        <div class="d-flex justify-content-between align-items-center border border-success px-4 py-3 rounded-3"
            style="width: 33%">
            <div class="d-flex flex-column gap-2">
                <p>Jabatan</p>
                <p class="fw-bold fs-2">100</p>
            </div>
            <i class="bi bi-building fs-1"></i>
        </div>
    </div>
@endsection
