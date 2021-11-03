@extends('layouts.app')

@section('guestmenu')
menu-open
@endsection

@section('guesthakakses')
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
              <li class="breadcrumb-item active">Hak Akses</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Daftar Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action={{route('admin.guest.aksespegawai')}}>
                @csrf 
                @method('patch')
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                          @if (session('aksespegawai'))
                            <div class="alert alert-info">
                              {{ session('aksespegawai') }}
                            </div>
                          @endif
                          @foreach ($employes as $employe)
                            @if ($employe->guest == 1)
                            <div class="form-group">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="guest{{$employe->id}}" name="guest{{$employe->id}}" value="1" checked>
                                <label class="form-check-label font-weight-bold" for="guest{{$employe->id}}">{{$employe->nama}} <span class="text-info">({{$employe->jabatan ?? ''}})</span></label>
                              </div>
                            </div>
                            @else
                            <div class="form-group">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="guest{{$employe->id}}" name="guest{{$employe->id}}" value="1" >
                                <label class="form-check-label font-weight-bold text-danger" for="guest{{$employe->id}}">{{$employe->nama}} <span class="text-info">({{$employe->jabatan ?? ''}})</span></label>
                              </div>
                            </div>
                            @endif
                          @endforeach
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Hak Akses</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action={{route('admin.guest.akses')}}>
                @csrf 
                @method('patch')
                <div class="card-body">
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
                        <div class="col-lg-4">
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="nip" name="nip" value=1 @if($guest->nip == 1) checked @else @endif>
                              <label for="nip" class="custom-control-label @if($guest->nip == 1) text-dark @else text-danger @endif">NIP</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="jeniskelamin" name="jeniskelamin" value=1  @if($guest->jeniskelamin == 1) checked @else @endif>
                              <label for="jeniskelamin" class="custom-control-label @if($guest->jeniskelamin == 1) text-dark @else text-danger @endif">Jenis Kelamin</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="pangkat" name="pangkat" value=1  @if($guest->pangkat == 1) checked @else @endif>
                              <label for="pangkat" class="custom-control-label @if($guest->pangkat == 1) text-dark @else text-danger @endif">Pangkat</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="jabatan" name="jabatan" value=1  @if($guest->jabatan == 1) checked @else @endif>
                              <label for="jabatan" class="custom-control-label @if($guest->jabatan == 1) text-dark @else text-danger @endif">Jabatan</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="unitkerja" name="unitkerja" value=1  @if($guest->unitkerja == 1) checked @else @endif>
                              <label for="unitkerja" class="custom-control-label @if($guest->unitkerja == 1) text-dark @else text-danger @endif">Unit Kerja</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="pendidikan" name="pendidikan" value=1  @if($guest->pendidikan == 1) checked @else @endif>
                              <label for="pendidikan" class="custom-control-label @if($guest->pendidikan == 1) text-dark @else text-danger @endif">Pendidikan</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="lahir" name="lahir" value=1  @if($guest->lahir == 1) checked @else @endif>
                              <label for="lahir" class="custom-control-label @if($guest->lahir == 1) text-dark @else text-danger @endif">Tempat, Tanggal Lahir</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="nik" name="nik" value=1  @if($guest->nik == 1) checked @else @endif>
                              <label for="nik" class="custom-control-label @if($guest->nik == 1) text-dark @else text-danger @endif">Nomor NIK</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="nokk" name="nokk" value=1  @if($guest->nokk == 1) checked @else @endif>
                              <label for="nokk" class="custom-control-label @if($guest->nokk == 1) text-dark @else text-danger @endif">Nomor Kartu Keluarga</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="status" name="status" value=1  @if($guest->status == 1) checked @else @endif>
                              <label for="status" class="custom-control-label @if($guest->status == 1) text-dark @else text-danger @endif">Status</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="alamat" name="alamat" value=1  @if($guest->alamat == 1) checked @else @endif>
                              <label for="alamat" class="custom-control-label @if($guest->alamat == 1) text-dark @else text-danger @endif">Alamat</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="npwp" name="npwp" value=1  @if($guest->npwp == 1) checked @else @endif>
                              <label for="npwp" class="custom-control-label @if($guest->npwp == 1) text-dark @else text-danger @endif">NPWP</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="bpjs" name="bpjs" value=1  @if($guest->bpjs == 1) checked @else @endif>
                              <label for="bpjs" class="custom-control-label @if($guest->bpjs == 1) text-dark @else text-danger @endif">BPJS</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="kontak" name="kontak" value=1  @if($guest->kontak == 1) checked @else @endif>
                              <label for="kontak" class="custom-control-label @if($guest->kontak == 1) text-dark @else text-danger @endif">Kontak</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="bank" name="bank" value=1  @if($guest->bank == 1) checked @else @endif>
                              <label for="bank" class="custom-control-label @if($guest->bank == 1) text-dark @else text-danger @endif">Bank</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="str" name="str" value=1  @if($guest->str == 1) checked @else @endif>
                              <label for="str" class="custom-control-label @if($guest->str == 1) text-dark @else text-danger @endif">STR</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="sip" name="sip" value=1  @if($guest->sip == 1) checked @else @endif>
                              <label for="sip" class="custom-control-label  @if($guest->sip == 1) text-dark @else text-danger @endif">SIP</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="pelatihan" name="pelatihan" value=1  @if($guest->pelatihan == 1) checked @else @endif>
                              <label for="pelatihan" class="custom-control-label @if($guest->pelatihan == 1) text-dark @else text-danger @endif">Pelatihan</label>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
