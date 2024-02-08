@extends('layouts.admin')

@section('content')
    <h1 class="fw-bold fs-3">Absensi</h1>

    <div class="w-100 p-3 bg-white rounded-3 mt-5 shadow">
        <table class="table rounded mb-0">
            <thead class="table-primary">
                <tr class="text-center">
                    <th scope="col" style="width: 10%;">#</th>
                    <th scope="col" style="width: 60%;">Nama Lengkap</th>
                    <th scope="col" style="width: 10%;">Kehadiran</th>
                    <th scope="col" style="width: 10%;">Cuti</th>
                    <th scope="col" style="width: 10%;">Tidak Hadir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row" class="text-center fw-bold">1</td>
                    <td>Jhon Doe</td>
                    <td class="text-center">10</td>
                    <td class="text-center">0</td>
                    <td class="text-center">2</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
