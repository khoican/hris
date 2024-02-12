@extends('layouts.admin')

@section('content')

<h1 class="fw-bold fs-3">Profil Kantor</h1>

<div class="w-100 p-3 bg-white rounded-3 mt-5 shadow">
    <a href="/kantor/create" class="btn btn-primary">Tambah Data</a>

    <table class="table rounded mb-0 mt-3">
        <thead class="table-primary">
            <tr class="text-center">
                <th style="width: 20%">Perusahaan</th>
                <th style="width: 30%">Alamat</th>
                <th style="width: 15%">Latitude</th>
                <th style="width: 15%">Longitude</th>
                <th style="width: 10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($office)
            <tr>
                <td class="text-center fw-bold">{{$office->name}}</td>
                <td>{{$office->address}}</td>
                <td class="text-center">{{$office->latitude}}</td>
                <td class="text-center">{{$office->longitude}}</td>
                <td class="text-center">
                    <a href="{{route('kantor.edit', $office->id)}}" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            @else
            <tr>
                <td colspan="5" class="text-center">Belum ada data</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

@endsection