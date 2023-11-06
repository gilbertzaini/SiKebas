<nav class="navigation container-fluid">
    <div class="brand-nav-navigation d-flex col-4" style="font-family: Poppins">
        <img src="{{ asset('assets/logo.png') }}" alt="" srcset="">
        <h1 class="d-none d-lg-block nav-text my-auto py-auto" style="font-size: 1rem !important">Sistem Informasi
            Keuangan
            Bank Sampah Pamulang 25</h1>
        <h1 class="d-block d-lg-none nav-text my-auto py-auto">SIKEBAS</h1>
    </div>

    <button style="opacity: 0" onclick="burger()" class="burger"></button>
    <div class="dropdowns-navigation">
        <button class="button nav-link" onclick="window.location='{{ route('admin.dashboard') }}'">
            <p>Dashboard</p>
        </button>
        <div class="dropdown-navigation ">
            <button class="button">
                <p>
                    Master</p>
            </button>
            <div class="dropdown-menu-navigation">
                <button><a href="{{ route('admin.dataSampah') }}">
                        <p>Data Sampah</p>
                        </p>
                    </a></button>
                <button><a href="{{ route('admin.kategoriSampah') }}">
                        <p>Data Kategori Sampah</p>
                    </a></button>
                <button><a href="{{ route('admin.daftarNasabah') }}">
                        <p>Data Nasabah</p>
                    </a></button>
                <button><a href="{{ route('admin.daftarPengurus') }}">
                        <p>Data Pengurus</p>
                    </a></button>
                <button><a href="{{ route('admin.daftarPelapak') }}">
                        <p>Data Pelapak</p>
                    </a></button>
            </div>
        </div>
        <div class="dropdown-navigation ">
            <button class="button">
                <p>
                    Transaksi
                </p>
            </button>
            <div class="dropdown-menu-navigation">
                <button><a href="{{ route('admin.setoranNasabah') }}">
                        <p>Setoran Sampah Nasabah</p>
                    </a></button>
                <button><a href="{{ route('admin.tabunganNasabah') }}">
                        <p>Tabungan Nasabah</p>
                    </a></button>
                <button><a href="{{ route('admin.transaksiPenjualanNasabah') }}">
                        <p>Transaksi Penjualan Sampah</p>
                    </a></button>
            </div>
        </div>
        @if (Auth::user()->jabatan != 'Pengurus')
            <div class="dropdown-navigation ">
                <button class="button">
                    <p>
                        Laporan
                    </p>
                </button>
                <div class="dropdown-menu-navigation">
                    <button class="my-2"><a href="{{ route('admin.laporanNasabah') }}">Laporan Rekap Total Sampah
                            Penimbangan Nasabah</p></a></button>
                    <button><a href="{{ route('admin.laporanArusKasNasabah') }}">
                            <p>Laporan Arus Kas Nasabah</p>
                        </a></button>
                    <button><a href="{{ route('admin.laporanPembayaranKeLapak') }}">
                            <p>Laporan Pembayaran ke
                                Lapak</p>
                        </a></button>
                    <button class="my-2"><a href="{{ route('admin.laporanDLHK') }}">
                            <p>Laporan Keuangan Bank Sampah
                                untuk DLHK</p>
                        </a></button>
                    <button><a href="{{ route('admin.laporanInternal') }}">
                            <p>Laporan Keuangan Internal</p>
                        </a></button>
                </div>
            </div>
        @endif
        <div class="d-flex justify-content-center justify-content-md-end" style="width: 100%">
            <x-form class="mx-5" action="{{ route('logout') }}">
                <button class="nav-link" style="color: #9da9a5;" onmouseover="this.style.color='red';"
                    onmouseout="this.style.color='#9da9a5';">
                    <p>Logout</p>
                </button>
            </x-form>
        </div>
    </div>
</nav>
