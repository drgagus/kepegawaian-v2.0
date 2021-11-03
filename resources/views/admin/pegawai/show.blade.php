@extends('layouts.app')


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card bg-light">
                <div class="card-body">
                  <div class="row">
                    <div class="col-1 text-center">
                        @if ($user)
                            @if($employe->user->image)
                                <img src="{{asset('storage/'.$employe->user->image)}}" alt="" class="img-circle img-fluid">
                            @else
                                <img src="{{asset('storage/images/profil/default.jpg')}}" alt="" class="img-circle img-fluid">
                            @endif
                        @else
                            <img src="{{asset('storage/images/profil/default.jpg')}}" alt="" class="img-circle img-fluid">
                        @endif
                    </div>
                    <div class="col-11">
                      <h2 class="lead"><b><a href={{route('admin.pegawai.show', ['id'=>$employe->id])}} class="text-dark font-weight-bold">{{$employe->nama}} - {{$employe->jabatan}}</a></b></h2>
                      <table class="">
                            <tr class="">
                                <td class="">Portal</td>
                                <td class="">:</td>
                                @if($employe->portal == 1) 
                                <td class="">
                                    <form action={{route('admin.pegawai.portal', ['id'=> $employe->id])}} class="" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-primary font-weight-bold">Open</button>
                                    </form>
                                </td>
                                @else
                                <td class="">
                                    <form action={{route('admin.pegawai.portal', ['id'=> $employe->id])}} class="" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger font-weight-bold">Close</button>
                                    </form></td>
                                @endif
                            </tr>
                            <tr class="">
                                <td class="">Status</td>
                                <td class="">:</td>
                                <td class="text-primary font-weight-bold">
                                <form action={{route('admin.pegawai.aktifnonaktif', ['id'=> $employe->id])}} class="" method="post">
                                    @csrf
                                    @method('patch')
                                    @if ($employe->active == 1 )
                                        <button type="submit" class="btn btn-sm btn-outline-primary font-weight-bold">Aktif</button>
                                    @else
                                        <button type="submit" class="btn btn-sm btn-outline-danger font-weight-bold">NonAktif</button>
                                    @endif
                                </form>
                            </tr>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
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
            <div class="col-lg-12">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active border border-info border-bottom-0" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border border-info border-bottom-0" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Dokumen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border border-info border-bottom-0" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Akun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border border-info border-bottom-0" id="status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="false">Status</a>
                    </li>
                </ul>
                <div class="tab-content border border-info bg-light" id="myTabContent" style="height:100%">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row p-3">
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
                                        <a href={{route('admin.pegawai.datapegawai', [ 'id' => $employe->id])}} class="btn d-block btn-primary">EDIT</a>
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
                                        <a href={{route('admin.pegawai.datapenduduk', [ 'id' => $employe->id])}} class="btn d-block btn-warning">EDIT</a>
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
                                        <a href={{route('admin.pegawai.datapribadi', [ 'id' => $employe->id])}} class="btn d-block btn-info">EDIT</a>
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
                                        <a href={{route('admin.pegawai.datapendidikan', [ 'id' => $employe->id])}} class="btn d-block btn-dark">EDIT</a>
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
                                        <a href={{route('admin.pegawai.datastr', [ 'id' => $employe->id])}} class="btn d-block btn-success">EDIT</a>
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
                                        <a href={{route('admin.pegawai.datapelatihan', [ 'id' => $employe->id])}} class="btn d-block btn-secondary">EDIT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row p-3">
                            <div class="col-md-3">
                                <div class="card card-dark border border-dark">
                                    <div class="card-body">
                                        <div class="row p-0">
                                            <div class="col-lg-12">
                                                @if (count($documents))
                                                    <table class="table table-hover text-wrap">
                                                        @foreach($documents as $document)
                                                            <tr>
                                                            <th class="text-center" scope="col" style="width:5%">#</th>
                                                            <th class="text-left" scope="col" ><a href="{{asset('storage/'.$document->file)}}" target=_blank class="">{{$document->title}}</a></th>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                @else
                                                    <h3 class="text-danger p-3">Tidak Ada Dokumen</h3>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row p-3">
                            @if ($user)
                            <div class="col-lg-3">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                        @if($employe->user->image)
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{asset('storage/'.$employe->user->image)}}"
                                            alt="User profile picture">
                                        @else
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{asset('storage/images/profil/default.jpg')}}"
                                            alt="User profile picture">
                                        @endif
                                        </div>

                                        <h3 class="profile-username text-center">{{$employe->nama}}</h3>

                                        <p class="text-muted text-center">{{$employe->jabatan ?? ''}}</p>

                                        <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Username</b> <a class="float-right">{{$employe->user->username ?? ''}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Password</b>
                                            <a class="float-right">
                                            <form action={{route('admin.akun.reset', ['id'=> $employe->id])}} class="" method="post">
                                                @csrf
                                                <button type="submit" class="float-right btn btn-sm btn-dark">reset</button>
                                            </form>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Portal</b> 
                                            <a class="float-right">
                                            @if ($employe->portal == 1)
                                                <form action={{route('admin.pegawai.portal', ['id'=> $employe->id])}} class="" method="post">
                                                    @csrf
                                                    <button type="submit" class="float-right btn btn-sm btn-primary">Open</button>
                                                </form>
                                            @else
                                                <form action={{route('admin.pegawai.portal', ['id'=> $employe->id])}} class="" method="post">
                                                    @csrf
                                                    <button type="submit" class="float-right btn btn-sm btn-danger">Close</button>
                                                </form>
                                            @endif
                                            </a>
                                        </li>
                                        </ul>
                                        <a href="#" class="btn-block btn btn-danger" data-toggle="modal" data-target="#modal-delete-account">Hapus Akun</a>
                                        
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            @else
                            <div class="col-lg-3">
                                <a href={{route('admin.akun' , ['id'=> $employe->id])}} class="btn btn-primary">Buat Akun Pegawai</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="status-tab">
                        <div class="row p-3">
                            <div class="col-lg-3">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Status</b> 
                                            <a class="float-right">
                                            @if ($employe->active == 1)
                                            <button type="submit" class="btn-block btn btn-outline-primary">Aktif</button>
                                            @else
                                            <button type="submit" class="btn-block btn btn-outline-danger">Non Aktif</button>
                                            @endif
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                        <form action={{route('admin.pegawai.aktifnonaktif', ['id'=> $employe->id])}} class="" method="post">
                                            @csrf
                                            @method('patch')
                                            <div class="form-group">
                                                <label for="catatan">Catatan</label>
                                                <textarea class="form-control" type="text" name="catatan" id="catatan" rows="5">{{ old('catatan') ?? $employe->catatan}}</textarea>
                                            </div>
                                        </li>
                                        </ul>
                                                @if ($employe->active == 1 )
                                                <button type="submit" class="btn-block btn btn-danger">NonAktif-kan</button>
                                                @else
                                                <button type="submit" class="btn-block btn btn-primary">Aktif-kan</button>
                                                @endif
                                        </form>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
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

<!-- -----START MODAL DELETE AKUN----- -->
<div class="modal fade" id="modal-delete-account">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">HAPUS AKUN</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action={{route('admin.akun.delete', ['id'=> $employe->id])}} class="dropdown-item" method="post">
                  @csrf
                  @method('delete')
                  Yakin Ingin Hapus Akun Ini?
            </div>
            <div class="modal-footer text-right">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-primary">Ya</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- -----END MODAL DELETE AKUN----- -->
@endsection
