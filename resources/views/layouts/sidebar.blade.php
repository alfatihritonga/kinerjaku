<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Home</span>
            </a>
        </li>
        @if (Auth::user()->role == 'admin')
            <li class="nav-item nav-category">Master Data</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('divisi.index') }}">
                    <i class="mdi mdi-domain menu-icon"></i>
                    <span class="menu-title">Divisi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('jabatan.index') }}">
                    <i class="mdi mdi-account-tie menu-icon"></i>
                    <span class="menu-title">Jabatan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('unit-kerja.index') }}">
                    <i class="mdi mdi-briefcase menu-icon"></i>
                    <span class="menu-title">Unit Kerja</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pegawai.index') }}">
                    <i class="mdi mdi-account-group menu-icon"></i>
                    <span class="menu-title">Pegawai</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pengguna.index') }}">
                    <i class="mdi mdi-account menu-icon"></i>
                    <span class="menu-title">Pengguna</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#kpi" aria-expanded="false" aria-controls="kpi">
                    <i class="menu-icon mdi mdi-list-box"></i>
                    <span class="menu-title">KPI</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="kpi">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('kriteria.index') }}">Kriteria</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('subkriteria.index') }}">Sub
                                Kriteria</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#penilaian" aria-expanded="false"
                    aria-controls="penilaian">
                    <i class="menu-icon mdi mdi-rename-box"></i>
                    <span class="menu-title">Penilaian</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="penilaian">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('periode.index') }}">Periode</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('nilai.kedisiplinan.index') }}">Nilai
                                Kedisiplinan</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('hasil.index') }}">Hasil</a>
                        </li>
                    </ul>
                </div>
            </li>
        @else
            <li class="nav-item nav-category">Menu</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#penilaian" aria-expanded="false"
                    aria-controls="penilaian">
                    <i class="menu-icon mdi mdi-rename-box"></i>
                    <span class="menu-title">Penilaian</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="penilaian">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('penilaian.periode') }}">Hasil</a></li>
                    </ul>
                </div>
            </li>
        @endif
    </ul>
</nav>
