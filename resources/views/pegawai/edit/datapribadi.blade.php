@extends('layouts.app')


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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-info border border-info">
              <div class="card-header">
                <h3 class="card-title">Data STR & SIP</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action={{route('pegawai.datapribadi')}}>
                @csrf 
                @method('patch')
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for='npwp'>Nomor NPWP</label>
                                <input class="form-control" type="text" name='npwp' id='npwp' value="{{ old('npwp') ?? $employe->npwp }}" Placeholder='--npwp--'>
                                @error('npwp')
                                    <div class="text text-danger">nomor NPWP harus diisi</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for='namabank'>Nama Bank</label>
                                <input class="form-control" type="text" name='namabank' id='namabank' value="{{ old('namabank') ?? $employe->namabank }}" Placeholder='--nama bank--'>
                                @error('namabank')
                                    <div class="text text-danger">nama bank harus diisi</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for='norekening'>Nomor Rekening</label>
                                <input class="form-control" type="text" name='norekening' id='norekening' value="{{ old('norekening') ?? $employe->norekening }}" Placeholder='--email--'>
                                @error('norekening')
                                    <div class="text text-danger">nomor rekening harus diisi</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for='bpjskesehatan'>Nomor BPJS Kesehatan</label>
                                <input class="form-control" type="text" name='bpjskesehatan' id='bpjskesehatan' value="{{ old('bpjskesehatan') ?? $employe->bpjskesehatan }}" Placeholder='--nomor bpjs kesehatan--'>
                                @error('bpjskesehatan')
                                    <div class="text text-danger">nomor BPJS Kesehatan harus diisi</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for='bpjsketenagakerjaan'>Nomor BPJS Ketenagakerjaan</label>
                                <input class="form-control" type="text" name='bpjsketenagakerjaan' id='bpjsketenagakerjaan' value="{{ old('bpjsketenagakerjaan') ?? $employe->bpjsketenagakerjaan }}"  Placeholder='--nomor bpjs ketenagakerjaan--'>
                                @error('bpjsketenagakerjaan')
                                    <div class="text text-danger">nomor BPJS Ketenagakerjaan harus diisi</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for='phonenumber'>Nomor Handphone</label>
                                <input class="form-control" type="text" name='phonenumber' id='phonenumber' value="{{ old('phonenumber') ?? $employe->phonenumber }}" Placeholder='--nomor handphone--'>
                                @error('phonenumber')
                                    <div class="text text-danger">nomor telepon harus diisi</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for='email'>E-mail</label>
                                <input class="form-control" type="text" name='email' id='email' value="{{ old('email') ?? $employe->email }}" Placeholder='--email--'>
                                @error('email')
                                    <div class="text text-danger">e-mail harus diisi</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right p-0">
                  <button type="submit" class="btn btn-block btn-info">SIMPAN</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
