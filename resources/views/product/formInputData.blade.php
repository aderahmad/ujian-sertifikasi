<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Form Input</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{ asset('dashboard.css') }}" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">CNPLUS</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <form action="{{ route('logout.logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-dark">Log out</button> 
      </form>
      {{-- <a class="nav-link px-3" href="">Sign out</a> --}}
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <div class="row ms-2">
              <div class="col-lg-3"><span data-feather="home"></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>  </div>
                <div class="col-lg-6">
                  {{ Auth::user()->name }} <br>
                  {{ Auth::user()->email }}
                </div>
            </div>
              
          </li>
          
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Menu Utama</span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('beranda.beranda') }}">
              <span data-feather="home"></span>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
              </svg> Home
            </a>
          </li>
          
          <li class="nav-item ms-1">
          <button class="navbar-toggler fs-6" type="button" style="color:rgb(4, 103, 189);" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
              <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
            </svg> File Master
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">

                <li class="nav-item ms-4">
                  <button class="navbar-toggler fs-6" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown1" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                     User
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavDarkDropdown1">
                    <ul class="navbar-nav" type=">">
                      <li class="nav-item dropdown ms-4">
                        <a class="nav-link active" href="{{ route('produk.addProduct') }}" >
                          Produk
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <li class="nav-item" style="margin-left: 37px;">
                    <a class="nav-link" href="" >
                      Karyawan
                    </a>
                  </li>
                </li>
            </ul>
          </div>
        </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
                <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
              </svg> File Transaksi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
                <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
              </svg> File Laporan
            </a>
          </li>
          
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Input Data</h1>
      </div>
      @if (session('error'))
      {{ session('error') }}
      @endif
      <div class="m-2 border p-2">
        <form action="{{ route('produk.process') }}" method="post">
          @csrf
          {{-- input kode produk ########################################## --}}
          <div class="row my-2 mb-4">
            <div class="col-lg-2">
                <label for="kodeProduk" class="form-label me-2">Kode Produk</label>
            </div>
            <div class="col-lg-4">

                <input type="text" name="kode_produk" id="kodeProduk" class="form-control @error('kode_produk') is-invalid @enderror" value="{{ old('kode_produk') }}">
                
                @error('kode_produk')
                <div class="invalid-feedback mb-0">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-lg-1">
              <a class="ms-2" id="a" onclick="d()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
              </a>
            </div>
          </div>
          {{-- input nama produk ########################################## --}}
          <div class="row my-2 mb-4">
            <div class="col-lg-2">
              <label for="namaProduk" class="form-label me-2">Nama Produk</label>
            </div>
            <div class="col-lg-6">
                <input type="text" name="namaProduk" id="namaProduk" class="form-control @error('namaProduk') is-invalid @enderror" value="{{ old('namaProduk') }}" >
                @error('namaProduk')
                <div class="invalid-feedback mb-0">
                    {{ $message }}
                </div>
                @enderror
              </div>
          </div>

          <div class="row my-2 mb-4">
            {{-- input harga jual --}}
            <div class="col-lg-2">
                <label for="hargaBeli" class="form-label me-2">Harga Beli</label>
            </div>
            <div class="col-lg-4">
                <input type="text" name="hargaBeli" id="hargaBeli" class="form-control @error('hargaBeli') is-invalid @enderror" value="{{ old('hargaBeli') }}" >
                @error('hargaBeli')
                <div class="invalid-feedback mb-0">
                    {{ $message }}
                </div>
                @enderror
              </div>
            {{-- input harga beli --}}
            <div class="col-lg-2">
              <label for="hargaJual" class="form-label me-2">Harga Jual</label>
            </div>
            <div class="col-lg-4">
              <input type="text" name="hargaJual" id="hargaJual" class="form-control @error('hargaJual') is-invalid @enderror" value="{{ old('hargaJual') }}" >
              @error('hargaJual')
              <div class="invalid-feedback mb-0">
                  {{ $message }}
              </div>
              @enderror
            </div>
          </div>

        {{-- input status Produk & kelompok produk ######################## --}}
        <div class="row my-2 mb-4">
          {{-- input harga jual --}}
          <div class="col-lg-2">
              <label for="statusProduk" class="form-label me-2">Status Produk</label>
          </div>
          <div class="col-lg-4">
            <select class="form-select" name="statusProduk" id="statusProduk" aria-label="Default select example">
              <option value="" selected>Open this select menu</option>
              <option value="Tunai">Tunai</option>
              <option value="kredit">Kredit</option>
              <option value="konsinyasi">Konsinyasi</option>
            </select>
              @error('statusProduk')
              <div class="invalid-feedback mb-0">
                  {{ $message }}
              </div>
              @enderror
          </div>
          {{-- input harga beli --}}
          <div class="col-lg-2">
            <label for="hargaJual" class="form-label me-2">Kelompok Produk</label>
          </div>
          <div class="col-lg-4">
            <select class="form-select" name="kelompokProduk" id="kelompokProduk" aria-label="Default select example">
              <option value="" selected>Open this select menu</option>
              <option value="Sembako">Sembako</option>
              <option value="Bangunan">Bangunan</option>
              <option value="Jasa">Jasa</option>
            </select>
              @error('kelompokProduk')
              <div class="invalid-feedback mb-0">
                {{ $message }}
              </div>
              @enderror
          </div>
        </div>

        {{-- input kelompok produk --}}

        {{-- input stok --}}
        <div class="row my-2 mb-4 justify-content-end">
         <div class="col-lg-2 align-self-end">
          <label for="stok" class="form-label me-2">Stok Produk</label>
         </div>           
          <div class="col-lg-4 align-self-end">
            <input type="text" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') }}" >
            @error('stok')
            <div class="invalid-feedback mb-0">
                {{ $message }}
            </div>
            @enderror
          </div>
        </div>

          {{-- submit --}}
              <p class="text-end"><button type="submit" class="btn btn-success f">Simpan</button></p>

        </form>
      </div>

    </main>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script>
        

        function d() {
          let kodeProduk = document.getElementById('kodeProduk').value;
        let namaProduk = document.querySelector('#namaProduk');
        let hargaBeli = document.querySelector('#hargaBeli');
        let hargaJual = document.querySelector('#hargaJual');
        let statusProduk = document.querySelector('#statusProduk');
        let kelompokProduk = document.querySelector('#kelompokProduk');
        let stok = document.querySelector('#stok');
          var app = {{ Illuminate\Support\Js::from($dataProduct) }};
          for (let i = 0; i < app.length; i++) {
            if (kodeProduk == app[i].kode_produk) {
              namaProduk.value = app[i].nama_produk;
              hargaBeli.value = app[i].harga_beli;
              hargaJual.value = app[i].harga_jual;
              statusProduk.value = app[i].status_produk;
              kelompokProduk.value = app[i].kelompok_produk;
              stok.value = app[i].stok;
            }
          }
          
        }
      </script>
  </body>
</html>
