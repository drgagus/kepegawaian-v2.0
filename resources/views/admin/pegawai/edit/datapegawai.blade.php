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
            <div class="card card-primary border border-primary">
              <div class="card-header">
                <h3 class="card-title">Data Kepegawaian</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action={{route('admin.pegawai.datapegawai', [ 'id' => $employe->id])}}>
                @csrf 
                @method('patch')
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label for='noduk'>Nomor Urut DUK</label>
                            <input class="form-control" type="text" name='noduk' id='noduk' value="{{ old('noduk') ?? $employe->noduk}}" Placeholder='--nomor urut DUK--'>
                                @error('noduk')
                                <div class="text text-danger">nomor urut DUK harus diisi dengan angka</div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label for='nama'>Nama</label>
                            <input class="form-control" type="text" name='nama' id='nama' value="{{ old('nama')  ?? $employe->nama}}" Placeholder='--nama lengkap--'>
                                @error('nama')
                                <div class="text text-danger">nama harus diisi</div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jeniskelamin" id="Laki-laki" {{ old('jeniskelamin')   ?? $employe->jeniskelamin === "Laki-laki" ? 'checked':'' }} value="Laki-laki">
                                <label class="form-check-label" for="Laki-laki">Laki-laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jeniskelamin" id="Perempuan" {{ old('jeniskelamin')   ?? $employe->jeniskelamin === "Perempuan" ? 'checked':'' }} value="Perempuan">
                                <label class="form-check-label" for="Perempuan">Perempuan</label>
                            </div>
                                @error('jeniskelamin')
                                <div class="text text-danger">jenis kelamin harus dipilih</div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label for='nip'>NIP/NRPT</label>
                            <input class="form-control" type="text" name='nip' id='nip' value="{{ old('nip')  ?? $employe->nip}}" Placeholder='--NIP/NRPT--'>
                                @error('nip')
                                <div class="text text-danger">NIP/NRPT harus isi</div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label for="golongan">Golongan Ruang</label>
                            <select class="form-control" id="golongan" name="golongan">
                                <option value="">--Golongan Ruang--</option>
                                <option {{ old('golongan')  ?? $employe->golongan === "Penata Tingkat I / IIId" ? 'selected':'' }} value="Penata Tingkat I / IIId">Penata Tingkat I / IIId</option>
                                <option {{ old('golongan')  ?? $employe->golongan === "Penata / IIIc" ? 'selected':'' }} value="Penata / IIIc">Penata / IIIc</option>
                                <option {{ old('golongan')  ?? $employe->golongan === "Penata Muda Tingkat I / IIIb" ? 'selected':'' }} value="Penata Muda Tingkat I / IIIb">Penata Muda Tingkat I / IIIb</option>
                                <option {{ old('golongan')  ?? $employe->golongan === "Penata Muda / IIIa" ? 'selected':'' }} value="Penata Muda / IIIa">Penata Muda / IIIa</option>
                                <option {{ old('golongan')  ?? $employe->golongan === "Pengatur Tingkat I / IId" ? 'selected':'' }} value="Pengatur Tingkat I / IId">Pengatur Tingkat I / IId</option>
                                <option {{ old('golongan')  ?? $employe->golongan === "Pengatur / IIc" ? 'selected':'' }} value="Pengatur / IIc">Pengatur / IIc</option>
                                <option {{ old('golongan')  ?? $employe->golongan === "Pengatur Muda Tingkat I / IIb" ? 'selected':'' }} value="Pengatur Muda Tingkat I / IIb">Pengatur Muda Tingkat I / IIb</option>
                                <option {{ old('golongan')  ?? $employe->golongan === "Pengatur Muda / IIa" ? 'selected':'' }} value="Pengatur Muda / IIa">Pengatur Muda / IIa</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for='tmtgolongan'>TMT Golongan Ruang</label>
                            <input class="form-control" type="date" name='tmtgolongan' id='tmtgolongan' value="{{ old('tmtgolongan')  ?? $employe->tmtgolongan }}" Placeholder='--TMT golongan ruang--'>
                                @error('tmtgolongan')
                                <div class="text text-danger">TMT golongan ruang harus isi</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label for='jabatan'>Jabatan</label>
                            <input class="form-control" type="text" name='jabatan' id='jabatan' value="{{ old('jabatan')  ?? $employe->jabatan }}" Placeholder='--jabatan--'>
                                @error('jabatan')
                                <div class="text text-danger">jabatan harus diisi</div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label for='statuskepegawaian'>Status Kepegawaian</label>
                            <input class="form-control" type="text" name='statuskepegawaian' id='statuskepegawaian' value="{{ old('statuskepegawaian')  ?? $employe->statuskepegawaian }}" Placeholder='--status kepegawaian--'>
                                @error('statuskepegawaian')
                                <div class="text text-danger">status kepegawaian harus diisi</div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label for='tmtjabatan'>TMT Jabatan</label>
                            <input class="form-control" type="date" name='tmtjabatan' id='tmtjabatan' value="{{ old('tmtjabatan')  ?? $employe->tmtjabatan }}" Placeholder='--TMT jabatan--'>
                                @error('tmtjabatan')
                                <div class="text text-danger">TMT jabatan harus diisi</div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label for='unitkerja'>Unit Kerja</label>
                            <input class="form-control" type="text" name='unitkerja' id='unitkerja' value="{{ old('unitkerja')  ?? $employe->unitkerja }}" Placeholder='--unit kerja--'>
                                @error('unitkerja')
                                <div class="text text-danger">unit kerja harus diisi</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right p-0">
                  <button type="submit" class="btn btn-block btn-primary">SIMPAN</button>
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
