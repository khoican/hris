<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="min-height: 100vh;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Mini HRIS</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/presensi" class="nav-link text-white" aria-current="page">
                Home
            </a>
        </li>
        <li class="nav-item">
            <a href="/" class="nav-link active" aria-current="page">
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
                    <li><a href="/divisi" class="nav-link text-white rounded">Divisi</a></li>
                    <li><a href="/jabatan" class="nav-link text-white rounded">Jabatan</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="/karyawan" class="nav-link text-white">
                Karyawan
            </a>
        </li>
        <li>
            <a href="/absensi" class="nav-link text-white">
                Absensi
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                Manajemen Gaji
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                class="rounded-circle me-2">
            <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
</div>
