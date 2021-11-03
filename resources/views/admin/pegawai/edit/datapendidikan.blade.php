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
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-dark border border-dark">
              <div class="card-header">
                <h3 class="card-title">Data Pendidikan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action={{route('admin.pegawai.datapendidikan', [ 'id' => $employe->id])}}>
                @csrf 
                @method('patch')
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for='universitas'>Universitas</label>
                                <input class="form-control" type="text" name='universitas' id='universitas' value="{{ old('universitas') ?? $employe->universitas }}" Placeholder='--universitas/perguruan tinggi/sekolah tinggi--'>
                                @error('universitas')
                                    <div class="text text-danger">universitas harus diisi</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for='jurusan'>Jurusan</label>
                                <input class="form-control" type="text" name='jurusan' id='jurusan' value="{{ old('jurusan') ?? $employe->jurusan }}" Placeholder='--jurusan--'>
                                @error('jurusan')
                                    <div class="text text-danger">jurusan harus diisi</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for='tahunlulus'>Lulus</label>
                                <input class="form-control" type="date" name='tahunlulus' id='tahunlulus' value="{{ old('tahunlulus') ?? $employe->tahunlulus }}" Placeholder='--tahun lulus--'>
                                @error('tahunlulus')
                                    <div class="text text-danger">tahun lulus harus diisi</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right p-0">
                  <button type="submit" class="btn btn-block btn-dark">SIMPAN</button>
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
