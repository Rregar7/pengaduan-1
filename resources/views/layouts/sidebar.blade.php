<li class="nav-item @yield('PetugasActive')">
    <a href="{{ route('admin.petugas.index') }}">
        <i class="fas fa-user"></i>
        <p>Petugas</p>
    </a>
</li>

<li class="nav-item @yield('LaporanActive')">
    <a href="{{ route('admin.laporan.index') }}">
        <i class="fas fa-clipboard"></i>
        <p>Laporan</p>
    </a>
</li>

<li class="nav-item @yield('CetakLaporanActive')">
    <a href="{{ route('admin.cetak.index') }}">
        <i class="fas fa-print"></i>
        <p>Cetak Laporan</p>
    </a>
</li>
