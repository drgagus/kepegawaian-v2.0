@extends('layouts.app')

@section('profil')
active
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      <div class="row">
          <div class="col-sm-12">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-3 text-center">
                                        @if($employe->user->image)
                                            <img src="{{asset('storage/'.$employe->user->image)}}" alt="" class="img-fluid">
                                        @else
                                            <img src="{{asset('storage/images/profil/default.jpg')}}" alt="" class="img-fluid">
                                        @endif
                                </div>
                                <div class="col-9">
                                <h2 class="lead"><b><a href={{route('pegawai.profil')}} class="text-dark font-weight-bold">{{$employe->nama}}</a></b></h2>
                                <h2 class="lead"><b>{{$employe->jabatan}}</b></h2>
                                <table class="">
                                        <tr class="">
                                            <td class="">Portal</td>
                                            <td class="">:</td>
                                            @if($employe->portal == 1) 
                                            <td class="text-primary font-weight-bold">
                                                    OPEN<!-- <button type="submit" class="btn btn-sm btn-outline-primary font-weight-bold">Open</button> -->
                                            </td>
                                            @else
                                            <td class="text-danger font-weight-bold">
                                                    CLOSE<!-- <button type="submit" class="btn btn-sm btn-outline-danger font-weight-bold">Close</button> -->
                                                </td>
                                            @endif
                                        </tr>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12">
                @if (session('status'))
                    <div class="alert alert-info">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
                <div class="col-lg-6">
                    <div class="card card-primary border border-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Kepegawaian</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <table class="table table-hover text-wrap">
                                        <tbody>
                                            <tr>
                                                <th class="">No DUK</th>
                                                <td class="">:</td>
                                                <td class="">{{$employe->noduk ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">Nama</th>
                                                <td class="">:</td>
                                                <td class="">{{$employe->nama ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">Jenis Kelamin</th>
                                                <td class="">:</td>
                                                <td class="">{{$employe->jeniskelamin ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">NIP/NRPT</th>
                                                <td class="">:</td>
                                                <td class="">{{$employe->nip ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">Golongan</th>
                                                <td class=""></td>
                                                <td class=""></td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">Golongan Ruang</td>
                                                <td class="">:</td>
                                                <td class="">{{$employe->golongan ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">TMT Golongan Ruang</td>
                                                <td class="">:</td>
                                                <td class="">@if($employe->tmtgolongan) {{date('d-m-Y', strtotime($employe->tmtgolongan))}} @else @endif</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <table class="table table-hover text-wrap">
                                        <tbody>
                                            <tr>
                                                <th class="">Jabatan</th>
                                                <td class=""></td>
                                                <td class=""></td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">Jabatan</td>
                                                <td class="">:</td>
                                                <td class="">{{$employe->jabatan ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">Status</td>
                                                <td class="">:</td>
                                                <td class="">{{$employe->statuskepegawaian ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">TMT Jabatan</td>
                                                <td class="">:</td>
                                                <td class="">@if($employe->tmtjabatan) {{date('d-m-Y', strtotime($employe->tmtjabatan))}} @else @endif</td>
                                            </tr>
                                            <tr>
                                                <th class="">Unit Kerja</th>
                                                <td class="">:</td>
                                                <td class="">{{$employe->unitkerja ?? ''}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right p-0">
                            <a href={{route('pegawai.datapegawai')}} class="btn d-block btn-primary">EDIT</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-warning border border-warning">
                        <div class="card-header">
                            <h3 class="card-title">Data Kependudukan</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <table class="table table-hover text-wrap">
                                        <tbody>
                                            <tr>
                                                <th class="">NIK</th>
                                                <td class="">:</td>
                                                <td class="">{{$employe->nik ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">Nomor Kartu Keluarga</th>
                                                <td class="">:</td>
                                                <td class="">{{$employe->nokk ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">Tempat, Tanggal Lahir</th>
                                                <td class="">:</td>
                                                <td class="">{{$employe->tempatlahir ?? ''}}, @if($employe->tanggallahir) {{date('d-m-Y', strtotime($employe->tanggallahir))}} @else @endif</td>
                                            </tr>
                                            <tr>
                                                <th class="">Status</th>
                                                <td class="">:</td>
                                                <td class="">{{$employe->status ?? ''}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <table class="table table-hover text-wrap">
                                        <tbody>
                                            <tr>
                                                <th class="">Alamat</th>
                                                <td class=""></td>
                                                <td class=""></td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">Alamat</td>
                                                <td class="">:</td>
                                                <td class="">{{$employe->alamat ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">RT/RW</td>
                                                <td class="">:</td>
                                                <td class="">{{$employe->rt ?? ''}}/{{$employe->rw ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">Desa/Kelurahan</td>
                                                <td class="">:</td>
                                                <td class="">{{$employe->desa ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">Kecamatan</td>
                                                <td class="">:</td>
                                                <td class="">{{$employe->kecamatan ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">Kabupaten/Kotamadya</td>
                                                <td class="">:</td>
                                                <td class="">{{$employe->kabupaten ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">Provinsi</td>
                                                <td class="">:</td>
                                                <td class="">{{$employe->provinsi ?? ''}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right p-0">
                            <a href={{route('pegawai.datapenduduk')}} class="btn d-block btn-warning">EDIT</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-info border border-info">
                        <div class="card-header">
                            <h3 class="card-title">Data Pribadi</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <table class="table table-hover text-wrap">
                                        <tbody>
                                            <tr>
                                                <th class="">NPWP</th>
                                                <td class="">:</td>
                                                <td class="">{{$employe->npwp ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">Bank</th>
                                                <td class=""></td>
                                                <td class=""></td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">Nama bank</td>
                                                <td class="">:</td>
                                                <td class="">{{$employe->namabank ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">Nomor Rekening</td>
                                                <td class="">:</td>
                                                <td class="">{{$employe->norekening ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">BPJS</th>
                                                <td class=""></td>
                                                <td class=""></td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">BPJS Kesehatan</td>
                                                <td class="">:</td>
                                                <td class="">{{$employe->bpjskesehatan ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">BPJS Ketenagakerjaan</td>
                                                <td class="">:</td>
                                                <td class="">{{$employe->bpjsketenagakerjaan ?? ''}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <table class="table table-hover text-wrap">
                                        <tbody>
                                            <tr>
                                                <th class="">Kontak</th>
                                                <td class=""></td>
                                                <td class=""></td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">Nomor Telepon</td>
                                                <td class="">:</td>
                                                <td class="">{{$employe->phonenumber ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">E-mail</td>
                                                <td class="">:</td>
                                                <td class="">{{$employe->email ?? ''}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right p-0">
                            <a href={{route('pegawai.datapribadi')}} class="btn d-block btn-info">EDIT</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-dark border border-dark">
                        <div class="card-header">
                            <h3 class="card-title">Pendidikan</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <table class="table table-hover text-wrap">
                                        <tbody>
                                            <tr>
                                                <th class="">Universitas/Perguruan Tinggi</th>
                                                <td class="">:</td>
                                                <td class="">{{$employe->universitas ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">Jurusan</th>
                                                <td class="">:</td>
                                                <td class="">{{$employe->jurusan ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">Lulus</th>
                                                <td class="">:</td>
                                                <td class="">@if($employe->tahunlulus) {{date('d-m-Y', strtotime($employe->tahunlulus))}} @else @endif</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right p-0">
                            <a href={{route('pegawai.datapendidikan')}} class="btn d-block btn-dark">EDIT</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-success border border-success">
                        <div class="card-header">
                            <h3 class="card-title">STR dan SIP</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <table class="table table-hover text-wrap">
                                        <tbody>
                                            <tr>
                                                <th class="">Terbit STR</th>
                                                <td class="">:</td>
                                                <td class="">@if($employe->terbitstr) {{date('d-m-Y', strtotime($employe->terbitstr))}} @else @endif</td>
                                            </tr>
                                            <tr>
                                                <th class="">Nomor STR</th>
                                                <td class="">:</td>
                                                <td class="">{{$employe->str ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">Berlaku STR</th>
                                                <td class="">:</td>
                                                <td class="">@if($employe->berlakustr) {{date('d-m-Y', strtotime($employe->berlakustr))}} @else @endif</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <table class="table table-hover text-wrap">
                                        <tbody>
                                            <tr>
                                                <th class="">Terbit SIP</th>
                                                <td class="">:</td>
                                                <td class="">@if($employe->terbitsip) {{date('d-m-Y', strtotime($employe->terbitsip))}} @else @endif</td>
                                            </tr>
                                            <tr>
                                                <th class="">Nomor SIP</th>
                                                <td class="">:</td>
                                                <td class="">{{$employe->sip ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th class="">Berlaku SIP</th>
                                                <td class="">:</td>
                                                <td class="">@if($employe->berlakusip) {{date('d-m-Y', strtotime($employe->berlakusip))}} @else @endif</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right p-0">
                            <a href={{route('pegawai.datastr')}} class="btn d-block btn-success">EDIT</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-secondary border border-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Pelatihan</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="">{!! nl2br($employe->pelatihan) ?? '-tidak ada pelatihan-' !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right p-0">
                            <a href={{route('pegawai.datapelatihan')}} class="btn d-block btn-secondary">EDIT</a>
                        </div>
                    </div>
                </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
