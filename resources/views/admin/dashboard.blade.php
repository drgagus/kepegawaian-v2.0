@extends('layouts.app')


@section('dashboard')
active
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href={{route('home')}}>Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
              <div class="col-lg-12">
                  @if (session('status'))
                      <div class="alert alert-info">
                          {{ session('status') }}
                      </div>
                  @endif
              </div>
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-12">
                <!-- small box -->
                <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$activeall}}</h3>

                    <p>Pegawai Aktif</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href={{route('admin.pegawai.aktif')}} class="small-box-footer">detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-12">
                <!-- small box -->
                <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$activemedic}}</h3>

                    <p>Pegawai Aktif Medis</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href={{route('admin.pegawai.nakes')}} class="small-box-footer">detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-12">
                <!-- small box -->
                <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$activenonmedic}}</h3>

                    <p>Pegawai Aktif NonMedis</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href={{route('admin.pegawai.nonnakes')}} class="small-box-footer">detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <!-- small box -->
                <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$nonactiveall}}</h3>

                    <p>Pegawai NonAktif</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href={{route('admin.pegawai.nonaktif')}} class="small-box-footer">detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <!-- small box -->
                <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$nonactivemedic}}</h3>

                    <p>Pegawai NonAktif Medis</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href={{route('admin.pegawai.nonaktif')}} class="small-box-footer">detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <!-- small box -->
                <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$nonactivenonmedic}}</h3>

                    <p>Pegawai NonAktif NonMedis</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href={{route('admin.pegawai.nonaktif')}} class="small-box-footer">detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Akun Saya</h1>
          </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-4 col-12">
                <!-- small box -->
                <div class="small-box bg-primary">
                <div class="inner">
                    <h3></h3>

                    <p>Data Kepegawaian</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href={{route('pegawai.datapegawai')}} class="small-box-footer">edit <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-12">
                <!-- small box -->
                <div class="small-box bg-warning">
                <div class="inner">
                    <h3></h3>

                    <p>Data Kependudukan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href={{route('pegawai.datapenduduk')}} class="small-box-footer">edit <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-12">
                <!-- small box -->
                <div class="small-box bg-info">
                <div class="inner">
                    <h3></h3>

                    <p>Data Pribadi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href={{route('pegawai.datapribadi')}} class="small-box-footer">edit <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-lg-4 col-12">
                <!-- small box -->
                <div class="small-box bg-dark">
                <div class="inner">
                    <h3></h3>

                    <p>Data Pendidikan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href={{route('pegawai.datapendidikan')}} class="small-box-footer">edit <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-12">
                <!-- small box -->
                <div class="small-box bg-success">
                <div class="inner">
                    <h3></h3>

                    <p>Data STR&SIP</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href={{route('pegawai.datastr')}} class="small-box-footer">edit <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-12">
                <!-- small box -->
                <div class="small-box bg-secondary">
                <div class="inner">
                    <h3></h3>

                    <p>Data Pelatihan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href={{route('pegawai.datapelatihan')}} class="small-box-footer">edit <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
