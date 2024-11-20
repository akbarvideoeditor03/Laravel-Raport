<!doctype html>
<html lang="en">
<font face="Nirmala UI Regular">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIAKAD SMA XAVERIUS 1</title>
  <link rel="stylesheet" href="{{ asset('ahmad_akbar') }}/css/styles.min.css" />
  <link rel="stylesheet" href="{{ asset('ahmad_akbar') }}/css/margin.css" />
  <link href="{{ asset('ahmad_akbar') }}/assets/images/logos/favicon.png" rel="icon">
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body style="background-color: lavender">
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="https://www.smaxaverius1jbi.sch.id/beranda" target="blank">
            <img src="{{ asset('ahmad_akbar') }}/images/logos/dark-logo.svg" width="180" alt="">
          </a>
          
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-6"></i>
          </div>
        </div>

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">

            @auth()
              <li class="sidebar-item">
                <a class="sidebar-link" href="/home" aria-expanded="false">
                  <span>
                    <i class="ti ti-home"></i>
                  </span>
                  <span class="hide-menu">Beranda</span>
                </a>
              </li>
            @endauth

            @guest()
              <li class="sidebar-item">
                <a class="sidebar-link" href="/" aria-expanded="false">
                  <span>
                    <i class="ti ti-home"></i>
                  </span>
                  <span class="hide-menu">Beranda</span>
                </a>
              </li>
            @endguest

            <hr>
            
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu"><h5><b> Data Sekolah </b></h5></span>
            </li>

            @auth()
              <li class="sidebar-item">
                <a class="sidebar-link" href="/school" aria-expanded="false">
                  <span>
                    <i class="ti ti-school"></i>
                  </span>
                  <span class="hide-menu">Data Sekolah</span>
                </a>
              </li>
            @endauth

            @guest()
              <li class="sidebar-item">
                <a class="sidebar-link" href="/schooldetail" aria-expanded="false">
                  <span>
                    <i class="ti ti-school"></i>
                  </span>
                  <span class="hide-menu">Data Sekolah</span>
                </a>
              </li>
            @endguest()

            @auth()
            <li class="sidebar-item">
              <a class="sidebar-link" href="/kepalasekolah" aria-expanded="false">
                <span>
                  <i class="ti ti-user-circle"></i>
                </span>
                <span class="hide-menu">Data Kepala Sekolah</span>
              </a>
            </li>
            @endauth

            @guest()
            <li class="sidebar-item">
              <a class="sidebar-link" href="/datakepsek" aria-expanded="false">
                <span>
                  <i class="ti ti-user-circle"></i>
                </span>
                <span class="hide-menu">Data Kepala Sekolah</span>
              </a>
            </li>
            @endguest

            <hr>

            @auth()
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu"><h5><b> Dashboard</b></h5></span>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="/dashboardkelas10" aria-expanded="false">
                  <span>
                    <i class="ti ti-dashboard"></i>
                  </span>
                  <span class="hide-menu">Kelas 10</span>
                </a>
              </li>

              @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kepsek')
                <li class="sidebar-item">
                  <a class="sidebar-link" href="/halamankosong" aria-expanded="false">
                    <span>
                      <i class="ti ti-dashboard"></i>
                    </span>
                    <span class="hide-menu">Kelas 11</span>
                  </a>
                </li>

                <li class="sidebar-item">
                  <a class="sidebar-link" href="/halamankosong1" aria-expanded="false">
                    <span>
                      <i class="ti ti-dashboard"></i>
                    </span>
                    <span class="hide-menu">Kelas 12</span>
                  </a>
                </li>
              @endif

              <hr>

              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu"><h5><b> Mata Pelajaran </b></h5></span>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="/mapelkelas10" aria-expanded="false">
                  <span>
                    <i class="ti ti-stack-2"></i>
                  </span>
                  <span class="hide-menu">Mata Pelajaran Kelas 10</span>
                </a>
              </li>

              @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kepsek')
              <li class="sidebar-item">
                <a class="sidebar-link" href="/halamankosong2" aria-expanded="false">
                  <span>
                    <i class="ti ti-stack-2"></i>
                  </span>
                  <span class="hide-menu">Mata Pelajaran Kelas 11</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="/halamankosong3" aria-expanded="false">
                  <span>
                    <i class="ti ti-stack-2"></i>
                  </span>
                  <span class="hide-menu">Mata Pelajaran Kelas 12</span>
                </a>
              </li>
              @endif

              @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kepsek' || Auth::user()->role == 'walas')
              <hr>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu"><h5><b> Nilai </b></h5></span>
              </li>
              
              <li class="sidebar-item">
                <a class="sidebar-link" href="/nilaikelas10" aria-expanded="false">
                  <span>
                    <i class="ti ti-report-analytics"></i>
                  </span>
                  <span class="hide-menu">Data Nilai Kelas 10</span>
                </a>
              </li>
              @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kepsek')
              <li class="sidebar-item">
                <a class="sidebar-link" href="/halamankosong4" aria-expanded="false">
                  <span>
                    <i class="ti ti-report-analytics"></i>
                  </span>
                  <span class="hide-menu">Data Nilai Kelas 11</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="/halamankosong5" aria-expanded="false">
                  <span>
                    <i class="ti ti-report-analytics"></i>
                  </span>
                  <span class="hide-menu">Data Nilai Kelas 12</span>
                </a>
              </li>
              @endif
              @endif
              <hr>

              @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kepsek' || Auth::user()->role == 'walas')
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu"><h5><b> Nilai </b></h5></span>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="/raportkelas10" aria-expanded="false">
                  <span>
                    <i class="ti ti-report"></i>
                  </span>
                  <span class="hide-menu">Raport Kelas 10</span>
                </a>
              </li>
              @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kepsek')
              <li class="sidebar-item">
                <a class="sidebar-link" href="/halamankosong6" aria-expanded="false">
                  <span>
                    <i class="ti ti-report"></i>
                  </span>
                  <span class="hide-menu">Raport Kelas 11</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="/halamankosong7" aria-expanded="false">
                  <span>
                    <i class="ti ti-report"></i>
                  </span>
                  <span class="hide-menu">Raport Kelas 12</span>
                </a>
              </li>
              <hr>
              @endif
            @endif
            @endauth


          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(1)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>

          </ul>
          @auth()
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <b>{{ Auth::user()->name }}</b>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="{{ asset('ahmad_akbar') }}/images/profile/user-1.jpg" alt="" width="40" height="40" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">

                    <a href="{{ url('/profil_page', [])}}" href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">Profil Saya</p>
                    </a>

                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">Akun Saya</p>
                    </a>
                    
                    <a href="{{ route('logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Keluar</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          @endauth
        </nav>
      </header>

      <body>
        <div class="container-fluid" style="margin-bottom: 5%">
          @include('flash::message')
          @yield('ahmad_akbar')
        </div>
      </body>
      
      <footer class="app-header position-fixed bottom-0">
        <div class="card" id="warna_1">
          <div class="card-footer" style="text-align: center" id="warna_1">
            <b style="font-size: 90%">Kelompok Ahmad Akbar</b>
          </div>
        </div>
      </footer>

    </div>
  </div>
  <script src="{{ asset('ahmad_akbar') }}/libs/jquery/dist/jquery.min.js"></script>
  <script src="{{ asset('ahmad_akbar') }}/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('ahmad_akbar') }}/js/sidebarmenu.js"></script>
  <script src="{{ asset('ahmad_akbar') }}/js/app.min.js"></script>
  <script src="{{ asset('ahmad_akbar') }}/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="{{ asset('ahmad_akbar') }}/libs/simplebar/dist/simplebar.js"></script>
  <script src="{{ asset('ahmad_akbar') }}/js/dashboard.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function () {
      $("#form-nilai").submit(function (e) { 
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        var cara = form.attr('method');
        var data = form.serialize();
  
        $.ajax({
          type: cara,
          url: url,
          data: data,
          success: function (response) {
            alert('Data Berhasil Disimpan');
          },
        });
      });
    });
  </script>
  

  
</body>
</font>
</html>