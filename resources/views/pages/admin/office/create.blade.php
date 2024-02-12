@extends('layouts.admin')

@section('content')

<h1 class="fw-bold fs-3">Tambah Data Kantor</h1>

<div class="w-100 p-3 bg-white rounded-3 mt-5 shadow">
    <form action="{{ route('kantor.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Perusahaan</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="d-flex gap-3 w-100">
            <div class="mb-3 w-50">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" class="form-control latitude" id="latitude" name="latitude" required>
            </div>
            <div class="mb-3 w-50">
                <label for="lonitude" class="form-label">Longitude</label>
                <input type="text" class="form-control longitude" id="lonitude" name="longitude" required>
            </div>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
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