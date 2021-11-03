@extends('layouts.app')

@section('pegawaiaktifmenu')
menu-open
@endsection

@section('pegawaiaktifnakes')
active
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href={{route('admin.pegawai')}}>Home</a></li>
              <li class="breadcrumb-item active">Active Medic</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h1 class="">Daftar Pegawai</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead >
                    <tr>
                      <th class="text-center" scope="col" rowspan="2">No<br>DUK</th>
                      <th class="text-center" scope="col" rowspan="2">Nama</th>
                      <th class="text-center" scope="col" rowspan="2">NIP/NRPT</th>
                      <th class="text-center" scope="col" colspan="2">Pangkat</th>
                      <th class="text-center" scope="col" rowspan="2">Jenis Kelamin</th>
                      <th class="text-center" scope="col" colspan="3">Jabatan TMT</th>
                      <th class="text-center" scope="col" rowspan="2">Unit<br>Kerja</th>
                      <th class="text-center" scope="col" colspan="3">Pendidikan</th>
                      <th class="text-center" scope="col" rowspan="2">Tempat, Tanggal<br>Lahir</th>
                    </tr>
                    <tr>
                        
                        
                        
                      <th class="text-center" scope="col" >GOL/RUANG</th>
                      <th class="text-center" scope="col" >TMT</th>
                        
                      <th class="text-center" scope="col" >Jabatan</th>
                      <th class="text-center" scope="col" >Status<br>Kepegawaian</th>
                      <th class="text-center" scope="col" >Tahun</th>
                        
                      <th class="text-center" scope="col" >Perguruan Tinggi</th>
                      <th class="text-center" scope="col" >Jurusan</th>
                      <th class="text-center" scope="col" >Tahun<br>Lulus</th>
                        
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($employes as $employe)
                      <tr>
                        <td>{{$employe->noduk}}</td>
                        <td><a href={{route('admin.pegawai.show', ['id' => $employe->id])}} class="text-weight-bold text-dark">{{$employe->nama}}</a></td>
                        <td>{{$employe->nip ?? '-'}}</td>
                        <td>{{$employe->golongan ?? '-'}}</td>
                        <td>@if($employe->tmtgolongan) {{date('d-m-Y', strtotime($employe->tmtgolongan))}} @else @endif</td>
                        <td>{{$employe->jeniskelamin ?? '-'}}</td>
                        <td>{{$employe->jabatan ?? '-'}}</td>
                        <td>{{$employe->statuskepegawaian ?? '-'}}</td>
                        <td>@if($employe->tmtjabatan) {{date('d-m-Y', strtotime($employe->tmtjabatan))}} @else @endif</td>
                        <td>{{$employe->unitkerja ?? '-'}}</td>
                        <td>{{$employe->universitas ?? '-'}}</td>
                        <td>{{$employe->jurusan ?? '-'}}</td>
                        <td>@if($employe->tahunlulus) {{date('Y', strtotime($employe->tahunlulus))}} @else @endif</td>
                        <td>{{$employe->tempatlahir ?? '-'}}, @if($employe->tanggallahir) {{date('d-m-Y', strtotime($employe->tanggallahir))}} @else @endif</td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
