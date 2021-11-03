<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kepegawaian</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href={{ asset ('plugins/fontawesome-free/css/all.min.css') }}>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href={{ asset ('dist/css/adminlte.min.css') }}>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- my css -->
  <link rel="stylesheet" href={{ asset ('dist/css/mycss.css') }}>
  <!-- fullCalendar -->
  <!-- <link rel="stylesheet" href={{ asset ('plugins/fullcalendar/main.min.css') }} >
  <link rel="stylesheet" href={{ asset ('plugins/fullcalendar-daygrid/main.min.css') }} >
  <link rel="stylesheet" href={{ asset ('plugins/fullcalendar-timegrid/main.min.css') }} >
  <link rel="stylesheet" href={{ asset ('plugins/fullcalendar-bootstrap/main.min.css') }} > -->
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href={{route('home')}} class="nav-link">Home</a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        @if (Auth()->user()->employe_id)
          @if (Auth()->user()->employe->jabatan == 'Kepala Tata Usaha')
            <a class="nav-link" data-toggle="dropdown" href="#">
              {{Auth()->user()->employe->nama ?? ''}}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href={{route('admin')}} class="dropdown-item">
                <i class="fas fa-tachometer-alt mr-3"></i>Dashboard
              </a>
              <a href={{route('admin.pegawai.create')}} class="dropdown-item">
                <i class="fas fa-user-plus mr-3"></i>+Pegawai
              </a>
              <a href={{route('admin.guest')}} class="dropdown-item">
                <i class="fas fa-user-secret mr-3"></i>Guest
              </a>
              <div class="dropdown-divider"></div>
              <a href={{route('pegawai.profil')}} class="dropdown-item">
                <i class="fas fa-user  mr-3"></i>Profil
              </a>
              <a href={{route('pegawai.dokumen')}} class="dropdown-item">
                <i class="fas fa-file-alt  mr-3"></i>Dokumen
              </a>
          @elseif (Auth()->user()->employe->jabatan != 'Kepala Tata Usaha')
            <a class="nav-link" data-toggle="dropdown" href="#">
              {{Auth()->user()->employe->nama ?? ''}}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href={{route('pegawai')}} class="dropdown-item">
                <i class="fas fa-tachometer-alt  mr-3"></i>Dashboard
              </a>
              <a href={{route('pegawai.profil')}} class="dropdown-item">
                <i class="fas fa-user  mr-3"></i>Profil
              </a>
              <a href={{route('pegawai.dokumen')}} class="dropdown-item">
                <i class="fas fa-file-alt  mr-3"></i>Dokumen
              </a>
          @endif
        @else
            <a class="nav-link" data-toggle="dropdown" href="#">
              {{Auth()->user()->username ?? ''}}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href={{route('guest')}} class="dropdown-item">
              <i class="fas fa-tachometer-alt mr-3"></i>Dashboard
            </a>
        @endif
          <a href={{route('pengaturan')}} class="dropdown-item">
            <i class="fas fa-user-cog  mr-3"></i>Pengaturan
          </a>
          <div class="dropdown-divider"></div>
            <a href={{route('logout')}} class="dropdown-item" data-toggle="modal" data-target="#modal-logout">
              <i class="fas fa-sign-out-alt  mr-3"></i>Logout
            </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href={{route('home')}} class="brand-link">
      @if (Auth::User()->image)
      <img src="{{asset('storage/'.Auth::User()->image)}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      @else
      <img src="{{asset('storage/images/profil/default.jpg')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      @endif
      <span class="brand-text font-weight-light">
        @if (Auth()->user()->employe_id)
        {{Auth::User()->employe->nama ?? ''}}
        @else
        {{Auth()->user()->username}}
        @endif
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href={{route('home')}} class="d-block">KEPEGAWAIAN</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if (Auth()->user()->employe_id)
            @if (Auth()->user()->employe->jabatan == 'Kepala Tata Usaha')
              <li class="nav-item">
                <a href={{route('admin')}} class="nav-link @yield('dashboard' ?? '')">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-header">KEPEGAWAIAN</li>
              <li class="nav-item">
                <a href={{route('admin.pegawai.create')}} class="nav-link @yield('tambahpegawai' ?? '')">
                  <i class="nav-icon fas fa-user-plus"></i>
                  <p>+Pegawai</p>
                </a>
              </li>
              <li class="nav-item has-treeview @yield('pegawaiaktifmenu' ?? '')">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Pegawai Aktif
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href={{route('admin.pegawai.aktif')}} class="nav-link @yield('pegawaiaktifall' ?? '')">
                      <i class="fas fa-users nav-icon text-primary"></i>
                      <p>All</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href={{route('admin.pegawai.nakes')}} class="nav-link @yield('pegawaiaktifnakes' ?? '')">
                      <i class="fas fa-user-md nav-icon text-primary"></i>
                      <p>Pegawai Nakes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href={{route('admin.pegawai.nonnakes')}} class="nav-link @yield('pegawaiaktifnonnakes' ?? '')">
                      <i class="fas fa-user-tie nav-icon text-primary"></i>
                      <p>Pegawai NonNakes</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview @yield('pegawainonaktifmenu' ?? '')">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user-slash"></i>
                  <p>
                    Pegawai NonAktif
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href={{route('admin.pegawai.nonaktif')}} class="nav-link @yield('pegawainonaktifall' ?? '')">
                      <i class="fas fa-users nav-icon text-danger"></i>
                      <p>All</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href={{route('admin.pegawai.nonaktif.nakes')}} class="nav-link @yield('pegawainonaktifnakes' ?? '')">
                      <i class="fas fa-user-md nav-icon text-danger"></i>
                      <p>Pegawai Nakes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href={{route('admin.pegawai.nonaktif.nonnakes')}} class="nav-link @yield('pegawainonaktifnonnakes' ?? '')">
                      <i class="fas fa-user-tie nav-icon text-danger"></i>
                      <p>Pegawai NonNakes</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview @yield('guestmenu' ?? '')">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user-secret"></i>
                  <p>
                    Akun Guest
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href={{route('admin.guest')}} class="nav-link @yield('guest' ?? '')">
                      <i class="far fa-circle nav-icon text-warning"></i>
                      <p>Guest</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href={{route('admin.guest.hakakses')}} class="nav-link @yield('guesthakakses' ?? '')">
                      <i class="far fa-circle nav-icon text-warning"></i>
                      <p>Hak Akses</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href={{route('admin.guest.pengaturan')}} class="nav-link @yield('guestpengaturan' ?? '')">
                      <i class="far fa-circle nav-icon text-warning"></i>
                      <p>Pengaturan</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-header">AKUN SAYA</li>
              <li class="nav-item">
                <a href={{route('pegawai.profil')}} class="nav-link @yield('profil' ?? '')">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Profil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href={{route('pegawai.dokumen')}} class="nav-link @yield('dokumen' ?? '')">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>Dokumen</p>
                </a>
              </li>
            @elseif (Auth()->user()->employe->jabatan != 'Kepala Tata Usaha')
              <li class="nav-item">
                <a href={{route('pegawai')}} class="nav-link @yield('dashboard' ?? '')">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href={{route('pegawai.profil')}} class="nav-link @yield('profil' ?? '')">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Profil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href={{route('pegawai.dokumen')}} class="nav-link @yield('dokumen' ?? '')">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>Dokumen</p>
                </a>
              </li>
            @endif
          @else
          <li class="nav-item">
            <a href={{route('guest')}} class="nav-link @yield('dashboard' ?? '')">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href={{route('pengaturan')}} class="nav-link @yield('pengaturan' ?? '')">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>Pengaturan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href={{route('logout')}} class="nav-link" data-toggle="modal" data-target="#modal-logout">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('content' ?? '')

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Aplikasi Kepegawaian</b> Versi 2.0
    </div>
    <strong>Copyright &copy; <a href="https://drgagus.github.io" class="text-decoration-none" target=_blank >drg.agus</a> <?= date('Y');?>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- -----START MODAL LOGOUT----- -->
      <div class="modal fade" id="modal-logout">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">LOGOUT</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action={{route('logout')}} class="dropdown-item" method="post">
                  @csrf
                  Yakin Ingin Keluar?
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-primary">Ya</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- -----END MODAL LOGOUT----- -->



<!-- jQuery -->
<script src={{ asset ('plugins/jquery/jquery.min.js') }}></script>
<!-- Bootstrap 4 -->
<script src={{ asset ('plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
<!-- bs-custom-file-input -->
<script src={{ asset ('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}></script>
<!-- AdminLTE App -->
<script src={{ asset ('dist/js/adminlte.js') }}></script>
<!-- AdminLTE for demo purposes -->
<script src={{ asset ('dist/js/demo.js') }}></script>
<!-- jQuery UI -->
<script src={{ asset ('plugins/jquery-ui/jquery-ui.min.js') }}></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>

</body>
</html>
