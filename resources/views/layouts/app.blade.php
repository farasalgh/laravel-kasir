<!DOCTYPE html>
<html lang="en">

<head>
  <!-- HEAD -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>@yield('title', 'Kasir App')</title>

  <!-- Fonts and icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" />

  <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.2.0') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">

  <!-- =========================
       SIDEBAR
  ========================== -->
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href="#">
        <span class="ms-1 text-sm text-dark">Kasir App</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          @if(auth()->user()->role === 'admin')
          <a class="nav-link text-dark {{ request()->routeIs('admin.dashboard') ? 'active bg-gradient-dark text-white' : '' }}"
            href="{{ route('admin.dashboard') }}">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
          @elseif(auth()->user()->role === 'kasir')
          <a class="nav-link text-dark{{ request()->routeIs('kasir.dashboard') ? 'active bg-gradient-dark text-white' : '' }}"
            href="{{ route('kasir.dashboard') }}">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
          @endif
        </li>

        <!-- ... menu lainnya ... -->
        @if (Auth::user() && Auth::user()->role === 'admin')
        <li class="nav-item mt-1">
          <a class="nav-link {{ request()->routeIs('admin.users.index') ? 'active bg-gradient-dark text-white' : '' }} text-dark" href="{{ route('admin.users.index') }}">
            <i class="material-symbols-rounded opacity-5">group</i>
            <span class="nav-link-text ms-1">Kelola User</span>
          </a>
        </li>
        @endif

        <li class="nav-item">
          <a class="nav-link text-dark {{ request()->routeIs('produk.*') ? 'active bg-gradient-dark text-white' : '' }}"
            href="{{ route('produk.index') }}">
            <i class="material-symbols-rounded opacity-5">shopping_bag</i>
            <span class="nav-link-text ms-1">Produk</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-dark {{ request()->routeIs('transaksi.*') ? 'active bg-gradient-dark text-white' : '' }}"
            href="{{ route('transaksi.index') }}">
            <i class="material-symbols-rounded opacity-5">point_of_sale</i>
            <span class="nav-link-text ms-1">Transaksi</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0">
      <div class="mx-3">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn bg-gradient-danger w-100 mt-4 text-white">
            <i class="material-symbols-rounded me-2">logout</i>
            Logout
          </button>
        </form>
      </div>
    </div>

  </aside>
  <!-- END SIDEBAR -->

  <!-- =========================
       MAIN CONTENT
  ========================== -->
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

    <!-- =========================
         NAVBAR
    ========================== -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="#">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <!-- ... isi navbar kanan ... -->
        </div>
      </div>
    </nav>
    <!-- END NAVBAR -->

    <!-- =========================
         PAGE CONTENT (custom content di sini)
    ========================== -->
    <div class="container-fluid py-4">
      @yield('content')

    </div>


  </main>
  <!-- END MAIN CONTENT -->

  <!-- =========================
       SCRIPTS
  ========================== -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <script src="{{ asset('assets/js/material-dashboard.min.js?v=3.2.0') }}"></script>
</body>

</html>