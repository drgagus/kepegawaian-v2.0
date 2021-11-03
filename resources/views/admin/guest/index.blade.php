@extends('layouts.app')

@section('guestmenu')
menu-open
@endsection

@section('guest')
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
              <li class="breadcrumb-item"><a href={{route('admin.guest')}}>Guest</a></li>
              <li class="breadcrumb-item active">Daftar pegawai</li>
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
                <table class="table table-bordered table-hover text-nowrap">
                  <thead >
                    <tr>
                          <th class="text-center" scope="col" rowspan="2">No</th>
                          <th class="text-center" scope="col" rowspan="2">Nama</th>
                      @if ($guest->nip == 1)
                          <th class="text-center" scope="col" rowspan="2">NIP/NRPT</th>
                      @endif
                      @if ($guest->pangkat == 1)
                          <th class="text-center" scope="col" colspan="2">Pangkat</th>
                      @endif
                      @if ($guest->jeniskelamin == 1)
                          <th class="text-center" scope="col" rowspan="2">Jenis Kelamin</th>
                      @endif
                      @if ($guest->jabatan == 1)
                          <th class="text-center" scope="col" colspan="3">Jabatan</th>
                      @endif
                      @if ($guest->unitkerja == 1)
                          <th class="text-center" scope="col" rowspan="2">Unit<br>Kerja</th>
                      @endif
                      @if ($guest->pendidikan == 1)
                          <th class="text-center" scope="col" colspan="3">Pendidikan</th>
                      @endif
                      @if ($guest->lahir == 1)
                          <th class="text-center" scope="col" rowspan="2">Tempat, Tanggal<br>Lahir</th>
                      @endif
                      @if ($guest->nik == 1)
                          <th class="text-center" scope="col" rowspan="2">Nomor<br>NIK</th>
                      @endif
                      @if ($guest->nokk == 1)
                          <th class="text-center" scope="col" rowspan="2">Nomor<br>Kartu Keluarga</th>
                      @endif
                      @if ($guest->status == 1)
                          <th class="text-center" scope="col" rowspan="2">Status</th>
                      @endif
                      @if ($guest->alamat == 1)
                          <th class="text-center" scope="col" rowspan="2">alamat</th>
                      @endif
                      @if ($guest->npwp == 1)
                          <th class="text-center" scope="col" rowspan="2">NPWP</th>
                      @endif
                      @if ($guest->npwp == 1)
                          <th class="text-center" scope="col" colspan="2">BPJS</th>
                      @endif
                      @if ($guest->kontak == 1)
                          <th class="text-center" scope="col" colspan="2">Kontak</th>
                      @endif
                      @if ($guest->bank == 1)
                          <th class="text-center" scope="col" colspan="2">Bank</th>
                      @endif
                      @if ($guest->str == 1)
                          <th class="text-center" scope="col" colspan="3">STR</th>
                      @endif
                      @if ($guest->sip == 1)
                          <th class="text-center" scope="col" colspan="3">SIP</th>
                      @endif
                      @if ($guest->pelatihan == 1)
                          <th class="text-center" scope="col" rowspan="2">Pelatihan</th>
                      @endif
                    </tr>
                    <tr>
                        
                        
                        
                      @if ($guest->pangkat == 1)
                          <th class="text-center" scope="col" >GOL/RUANG</th>
                          <th class="text-center" scope="col" >TMT</th>
                      @endif
                        
                      @if ($guest->jabatan == 1)
                          <th class="text-center" scope="col" >Jabatan</th>
                          <th class="text-center" scope="col" >Status<br>Kepegawaian</th>
                          <th class="text-center" scope="col" >Tahun</th>
                      @endif
                        
                      @if ($guest->pendidikan == 1)
                          <th class="text-center" scope="col" >Perguruan Tinggi</th>
                          <th class="text-center" scope="col" >Jurusan</th>
                          <th class="text-center" scope="col" >Tahun<br>Lulus</th>
                      @endif
                     
                      @if ($guest->bpjs == 1)
                          <th class="text-center" scope="col" >BPJS Kesehatan</th>
                          <th class="text-center" scope="col" >BPJS Ketenagakerjaan</th>
                      @endif
                     
                      @if ($guest->kontak == 1)
                          <th class="text-center" scope="col" >Nomor Handphone</th>
                          <th class="text-center" scope="col" >Email</th>
                      @endif
                      
                      @if ($guest->bank == 1)
                          <th class="text-center" scope="col" >Nama Bank</th>
                          <th class="text-center" scope="col" >Nomor Rekening</th>
                      @endif
                      @if ($guest->str == 1)
                          <th class="text-center" scope="col" >Terbit STR</th>
                          <th class="text-center" scope="col" >Nomor STR</th>
                          <th class="text-center" scope="col" >Berlaku STR</th>
                      @endif
                      @if ($guest->sip == 1)
                          <th class="text-center" scope="col" >Terbit SIP</th>
                          <th class="text-center" scope="col" >Nomor SIP</th>
                          <th class="text-center" scope="col" >Berlaku SIP</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($employes as $employe)
                      <tr>
                            <td>#</td>
                            <td><a href={{route('admin.pegawai.show', ['id' => $employe->id])}} class="text-weight-bold text-dark">{{$employe->nama}}</a></td>
                        @if ($guest->nip == 1)
                            <td>{{$employe->nip ?? '-'}}</td>
                        @endif
                        @if ($guest->pangkat == 1)
                            <td>{{$employe->golongan ?? '-'}}</td>
                            <td>@if($employe->tmtgolongan) {{date('d-m-Y', strtotime($employe->tmtgolongan))}} @else - @endif</td>
                        @endif
                        @if ($guest->jeniskelamin == 1)
                            <td>{{$employe->jeniskelamin ?? '-'}}</td>
                        @endif
                        @if ($guest->jabatan == 1)
                            <td>{{$employe->jabatan ?? '-'}}</td>
                            <td>{{$employe->statuskepegawaian ?? '-'}}</td>
                            <td>@if($employe->tmtjabatan) {{date('d-m-Y', strtotime($employe->tmtjabatan))}} @else - @endif</td>
                        @endif
                        @if ($guest->unitkerja == 1)
                            <td>{{$employe->unitkerja ?? '-'}}</td>
                        @endif
                        @if ($guest->pendidikan == 1)
                            <td>{{$employe->universitas ?? '-'}}</td>
                            <td>{{$employe->jurusan ?? '-'}}</td>
                            <td>@if($employe->tahunlulus) {{date('Y', strtotime($employe->tahunlulus))}} @else - @endif</td>
                        @endif
                        @if ($guest->lahir == 1)
                            <td>{{$employe->tempatlahir ?? '-'}}, @if($employe->tanggallahir) {{date('d-m-Y', strtotime($employe->tanggallahir))}} @else - @endif</td>
                        @endif
                        @if ($guest->nik == 1)
                            <td>{{$employe->nik ?? '-'}}</td>
                        @endif
                        @if ($guest->nokk == 1)
                            <td>{{$employe->nokk ?? '-'}}</td>
                        @endif
                        @if ($guest->status == 1)
                            <td>{{$employe->status ?? '-'}}</td>
                        @endif
                        @if ($guest->alamat == 1)
                            <td>{{$employe->alamat ?? '-'}} @if($employe->rt AND $employe->rw) RT/RW {{$employe->rt}}/{{$employe->rw}} @else  @endif {{$employe->desa ?? ''}} {{$employe->kecamatan ?? ''}} {{$employe->kabupaten ?? ''}} {{$employe->provinsi ?? ''}}</td>
                        @endif
                        @if ($guest->npwp == 1)
                            <td>{{$employe->npwp ?? '-'}}</td>
                        @endif
                        @if ($guest->bpjs == 1)
                            <td>{{$employe->bpjskesehatan ?? '-'}}</td>
                            <td>{{$employe->bpjsketenagakerjaan ?? '-'}}</td>
                        @endif
                        @if ($guest->kontak == 1)
                            <td>{{$employe->phonenumber ?? '-'}}</td>
                            <td>{{$employe->email ?? '-'}}</td>
                        @endif
                        @if ($guest->bank == 1)
                            <td>{{$employe->namabank ?? '-'}}</td>
                            <td>{{$employe->norekening ?? '-'}}</td>
                        @endif
                        @if ($guest->str == 1)
                            <td>@if($employe->terbitstr) {{date('d-m-Y', strtotime($employe->terbitstr))}} @else - @endif</td>
                            <td>{{$employe->str ?? '-'}}</td>
                            <td>@if($employe->berlakustr) {{date('d-m-Y', strtotime($employe->berlakustr))}} @else - @endif</td>
                        @endif
                        @if ($guest->sip == 1)
                            <td>@if($employe->terbitsip) {{date('d-m-Y', strtotime($employe->terbitsip))}} @else - @endif</td>
                            <td>{{$employe->sip ?? '-'}}</td>
                            <td>@if($employe->berlakusip) {{date('d-m-Y', strtotime($employe->berlakusip))}} @else - @endif</td>
                        @endif
                        @if ($guest->pelatihan == 1)
                            <td>{!! nl2br($employe->pelatihan) ?? '-tidak ada pelatihan-' !!}</td>
                        @endif
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
