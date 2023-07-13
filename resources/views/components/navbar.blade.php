<nav class="navbar navbar-expand-lg navbar-dark" id="nav-pengurus">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="{{route('admin.dashboard')}}"><img src="../assets/iPhone_14_Pro_Max_-_1-removebg-preview.png" width="30" height="" class="d-inline-block" alt=""> SIKEBAS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="{{route('admin.index')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{route('admin.dashboard')}}">Dasboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{route('admin.daftarTransaksi')}}">Laporan Transaksi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{route('admin.kategoriSampah')}}">Kategori Sampah</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Lainnya
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{route('admin.daftarNasabah')}}">Daftar Nasabah</a></li>
              <li><a class="dropdown-item" href="{{route('admin.daftarPengurus')}}">Daftar Pengurus</a></li>
            </ul>
          </li>
          <x-form action="{{route('logout')}}" class="nav-item">
            <button class="nav-link text-white">Logout</button>
          </x-form>
        </ul>
      </div>
    </div>
  </nav>