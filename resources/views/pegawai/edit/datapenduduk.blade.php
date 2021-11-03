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
            <div class="card card-warning border border-warning">
              <div class="card-header">
                <h3 class="card-title">Data Kependudukan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action={{route('pegawai.datapenduduk')}}>
                @csrf 
                @method('patch')
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for='nik'>NIK</label>
                                <input class="form-control" type="text" name='nik' id='nik' value="{{ old('nik') ?? $employe->nik }}" Placeholder='--nomor induk kependudukan--'>
                                @error('nik')
                                    <div class="text text-danger">nomor NIK harus diisi</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for='nokk'>Nomor Kartu Keluarga</label>
                                <input class="form-control" type="text" name='nokk' id='nokk' value="{{ old('nokk') ?? $employe->nokk }}"  Placeholder='--nomor kartu keluarga--'>
                                @error('nokk')
                                    <div class="text text-danger">nomor Kertu Keluarga harus diisi</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for='tempatlahir'>Tempat, Tanggal Lahir</label>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" name='tempatlahir' id='tempatlahir' value="{{ old('tempatlahir') ?? $employe->tempatlahir  }}" Placeholder='--tempat lahir--'>
                                    @error('tempatlahir')
                                        <div class="text text-danger">tempat lahir harus diisi</div>
                                    @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="date" name='tanggallahir' id='tanggallahir' value="{{ old('tanggallahir') ?? $employe->tanggallahir  }}" Placeholder='--tanggal lahir--'>
                                    @error('tanggallahir')
                                        <div class="text text-danger">tanggal lahir harus diisi</div>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for='status'>Status</label>
                                <input class="form-control" type="text" name='status' id='status' value="{{ old('status') ?? $employe->status  }}" Placeholder='--status--'>
                                @error('status')
                                    <div class="text text-danger">status harus diisi</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for='alamat'>Alamat</label>
                                <input class="form-control" type="text" name='alamat' id='alamat' value="{{ old('alamat') ?? $employe->alamat }}" Placeholder='--alamat--'>
                                @error('alamat')
                                    <div class="text text-danger">alamat harus diisi</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="rt">RT</label>
                                        <select class="form-control" id="rt" name="rt">
                                            <option value="">--RT--</option>
                                            <option {{ old('rt') ?? $employe->rt  === "001" ? 'selected':'' }} value="001">001</option>
                                            <option {{ old('rt') ?? $employe->rt  === "002" ? 'selected':'' }} value="002">002</option>
                                            <option {{ old('rt') ?? $employe->rt  === "003" ? 'selected':'' }} value="003">003</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="rw">RW</label>
                                        <select class="form-control" id="rw" name="rw">
                                            <option value="">--RW--</option>
                                            <option {{ old('rw') ?? $employe->rw  === "001" ? 'selected':'' }} value="001">001</option>
                                            <option {{ old('rw') ?? $employe->rw  === "002" ? 'selected':'' }} value="002">002</option>
                                            <option {{ old('rw') ?? $employe->rw  === "003" ? 'selected':'' }} value="003">003</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for='desa'>Desa/Kelurahan</label>
                                        <input class="form-control" type="text" name='desa' id='desa' value="{{ old('desa') ?? $employe->desa }}" Placeholder='--desa/kelurahan--'>
                                        @error('desa')
                                            <div class="text text-danger">desa/kelurahan harus diisi</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for='kecamatan'>Kecamatan</label>
                                        <input class="form-control" type="text" name='kecamatan' id='kecamatan' value="{{ old('kecamatan') ?? $employe->kecamatan }}" Placeholder='--kecamatan--'>
                                        @error('kecamatan')
                                            <div class="text text-danger">kecamatan harus diisi</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for='kabupaten'>Kabupaten/Kotamadya</label>
                                        <input class="form-control" type="text" name='kabupaten' id='kabupaten' value="{{ old('kabupaten') ?? $employe->kabupaten }}" Placeholder='--kabupaten/kotamadya--'>
                                        @error('kabupaten')
                                            <div class="text text-danger">kabupaten harus diisi</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for='provinsi'>Provinsi</label>
                                        <input class="form-control" type="text" name='provinsi' id='provinsi' value="{{ old('provinsi') ?? $employe->provinsi }}" Placeholder='--provinsi--'>
                                        @error('provinsi')
                                            <div class="text text-danger">provinsi harus diisi</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right p-0">
                  <button type="submit" class="btn btn-block btn-warning">SIMPAN</button>
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
