<nav class="navigation">
  <div class="brand-nav-navigation">
    <img src="{{asset('assets/iPhone_14_Pro_Max_-_1-removebg-preview.png')}}" alt="" srcset="">
    <h1 class="nav-text my-auto py-auto">SIKEBAS</h1>
    <button onclick="burger()" class="burger"></button>
    <div class="dropdowns-navigation">
      <button class="button nav-link" onclick="window.location='{{route('admin.dashboard')}}'">Dashboard</button>
      <div class="dropdown-navigation">
        <button class="button">
          Master
        </button>
        <div class="dropdown-menu-navigation">
          <button><a href="{{route('admin.dataSampah')}}">Data Sampah</a></button>
          <button><a href="{{route('admin.kategoriSampah')}}">Data Kategori Sampah</a></button>
          <button><a href="{{route('admin.daftarNasabah')}}">Data Nasabah</a></button>
          <button><a href="{{route('admin.daftarPengurus')}}">Data Pengurus</a></button>
          <button><a href="{{route('admin.daftarPelapak')}}">Data Pelapak</a></button>
        </div>
      </div>
      <div class="dropdown-navigation">
        <button class="button">
          Transaksi
        </button>
        <div class="dropdown-menu-navigation">
          <button><a href="{{route('admin.setoranNasabah')}}">Setoran Sampah Nasabah</a></button>
          <button><a href="{{route('admin.tabunganNasabah')}}">Tabungan Nasabah</a></button>
          <button><a href="{{route('admin.transaksiPenjualanNasabah')}}">Transaksi Penjualan Sampah</a></button>
        </div>
      </div>
      <div class="dropdown-navigation">
        <button class="button">
          Laporan
        </button>
        <div class="dropdown-menu-navigation">
          <button><a href="{{route('admin.laporanArusKasNasabah')}}">Laporan Arus Kas Nasabah</a></button>
          <button><a href="{{route('admin.laporanPembayaranKeLapak')}}">Laporan Pembayaran ke Lapak</a></button>
          <button class="mb-2"><a href="{{route('admin.laporanNasabah')}}">Laporan Rekap Total Sampah Penimbangan Nasabah</a></button>
        </div>
      </div>
    </div>
    <x-form action="{{route('logout')}}" class="nav-item my-auto py-auto justify-self-end" style="margin-left: 55rem;">
      <button class="nav-link" style="color: #9da9a5;" onmouseover="this.style.color='red';" onmouseout="this.style.color='#9da9a5';">Logout</button>
    </x-form>
  </div>
</nav>