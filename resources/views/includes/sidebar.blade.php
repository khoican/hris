<div class="d-flex flex-column justify-content-between flex-shrink-0 p-3 text-white bg-dark"
    style="min-height: 100vh; height: 100%;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Mini HRIS</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <button class="nav-link text-white" data-bs-toggle="collapse" data-bs-target="#dashboard-home"
                aria-expanded="false">
                home
            </button>
            <div class="collapse" id="dashboard-home" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal ps-3">
                    <li><a href="/kantor" class="nav-link text-white rounded">Profil Karyawan</a></li>
                    <li><a href="/presensi" class="nav-link text-white rounded">Presensi</a></li>
                    <li><a href="/jabatan" class="nav-link text-white rounded">Riwayat Gaji</a></li>
                </ul>
            </div>
        </li>

        @if(Auth::user()->role == 'admin')
        <li class="nav-item">
            <a href="/admin" class="nav-link active" aria-current="page">
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <button class="nav-link text-white" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse"
                aria-expanded="false">
                Master Data
            </button>
            <div class="collapse" id="dashboard-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal ps-3">
                    <li><a href="{{ route('kantor')}}" class="nav-link text-white rounded">Profil Kantor</a></li>
                    <li><a href="{{ route('divisi')}}" class="nav-link text-white rounded">Divisi</a></li>
                    <li><a href="{{ route('jabatan')}}" class="nav-link text-white rounded">Jabatan</a></li>
                    <li><a href="{{ route('asuransi')}}" class="nav-link text-white rounded">Asuransi</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="{{ route('karyawan.index')}}" class="nav-link text-white">
                Karyawan
            </a>
        </li>
        <li>
            <a href="{{ route('absen.show')}}" class="nav-link text-white">
                Absensi
            </a>
        </li>
        <li>
            <a href="{{ route('gaji') }}" class="nav-link text-white">
                Manajemen Gaji
            </a>
        </li>
    </ul>
    @endif
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>{{ Auth::user()->employee->name }}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a href="{{ route('user.logout') }}" class="dropdown-item" href="#">Logout</a></li>
        </ul>
    </div>
</div>