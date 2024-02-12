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

<h1 class="fw-bold fs-3">Presensi</h1>

<div class="mt-5 text-center">
    <p>Silahkan melakukan presensi</p>
    <p>Pastikan anda berada pada jarak maksimal 50 meter dengan perusahaan</p>

    <div class="d-flex gap-3 justify-content-center">
        <form action="{{ route('checkin') }}" class="mt-3" method="POST">
            @csrf
            <input type="hidden" class="latitude" name="latitude">
            <input type="hidden" class="longitude" name="longitude">

            <button class="btn btn-primary">Check In</button>
        </form>
        <form action="{{ route('checkout') }}" class="mt-3" method="POST">
            @csrf
            <input type="hidden" class="latitude" name="latitude">
            <input type="hidden" class="longitude" name="longitude">
            <button class="btn btn-warning">Check Out</button>
        </form>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        function successCallback(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                var accuracy = position.coords.accuracy;

                let latValue = document.querySelectorAll('.latitude');
                let longValue = document.querySelectorAll('.longitude');

                for (let i = 0; i < latValue.length; i++) {
                    latValue[i].value = latitude;
                    longValue[i].value = longitude;
                }
            }

            function errorCallback(error) {
                console.error('Error getting location:', error.message);
            }

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    successCallback,
                    errorCallback, {
                        enableHighAccuracy: true,
                        timeout: 5000,
                        maximumAge: 0
                    }
                );
            } else {
                console.error('Geolocation API is not supported in your browser.');
            }
    })
</script>
@endsection