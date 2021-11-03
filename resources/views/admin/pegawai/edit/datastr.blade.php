@extends('layouts.app')


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <div class="card bg-light">
                <div class="card-body">
                  <div class="row">
                    <div class="col-2 text-center">
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
                    <div class="col-7">
                      <h2 class="lead"><b><a href={{route('admin.pegawai.show', ['id'=>$employe->id])}} class="text-dark font-weight-bold">{{$employe->nama}} - {{$employe->jabatan}}</a></b></h2>
                      <table class="">
                            <tr class="">
                                <td class="">Portal</td>
                                <td class="">:</td>
                                @if($employe->portal == 1) <td class="text-primary font-weight-bold">OPEN</td> @else <td class="text-danger font-weight-bold">CLOSE</td>@endif
                            </tr>
                            <tr class="">
                                <td class="">Aktif</td>
                                <td class="">:</td>
                                @if($employe->active == 1) <td class="text-primary font-weight-bold">AKTIF</td> @else <td class="text-danger font-weight-bold">NON-AKTIF</td>@endif
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-success border border-success">
              <div class="card-header">
                <h3 class="card-title">Data STR & SIP</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action={{route('admin.pegawai.datastr', [ 'id' => $employe->id])}}>
                @csrf 
                @method('patch')
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for='terbitstr'>Terbit STR</label>
                                <input class="form-control" type="date" name='terbitstr' id='terbitstr' value="{{ old('terbitstr') ?? $employe->terbitstr }}" Placeholder='--tanggal terbit str--'>
                                @error('terbitstr')
                                    <div class="text text-danger">tanggal terbit STR harus diisi</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for='str'>Nomor STR</label>
                                <input class="form-control" type="text" name='str' id='str' value="{{ old('str') ?? $employe->str }}" Placeholder='--nomor str--'>
                                @error('str')
                                    <div class="text text-danger">nomor STR harus diisi</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for='berlakustr'>Berlaku STR</label>
                                <input class="form-control" type="date" name='berlakustr' id='berlakustr' value="{{ old('berlakustr') ?? $employe->berlakustr }}" Placeholder='--tanggal berlaku str--'>
                                @error('berlakustr')
                                    <div class="text text-danger">tanggal berlaku STR harus diisi</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for='terbitsip'>Terbit SIP</label>
                                <input class="form-control" type="date" name='terbitsip' id='terbitsip' value="{{ old('terbitsip') ?? $employe->terbitsip }}" Placeholder='--tanggal terbit sip--'>
                                @error('terbitsip')
                                    <div class="text text-danger">tanggal terbit SIP harus diisi</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for='sip'>Nomor SIP</label>
                                <input class="form-control" type="text" name='sip' id='sip' value="{{ old('sip') ?? $employe->sip }}" Placeholder='--nomor sip--'>
                                @error('sip')
                                    <div class="text text-danger">nomor SIP harus diisi</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for='berlakusip'>Berlaku SIP</label>
                                <input class="form-control" type="date" name='berlakusip' id='berlakusip' value="{{ old('berlakusip') ?? $employe->berlakusip }}" Placeholder='--tanggal berlaku sip--'>
                                @error('berlakusip')
                                    <div class="text text-danger">tanggal berlaku SIP harus diisi</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right p-0">
                  <button type="submit" class="btn btn-block btn-success">SIMPAN</button>
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
