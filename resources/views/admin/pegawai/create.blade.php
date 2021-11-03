@extends('layouts.app')

@section('tambahpegawai')
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
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href={{route('admin.pegawai')}}>Home</a></li>
              <li class="breadcrumb-item active">+Pegawai</li>
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
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action={{route('admin.pegawai.create')}} method="post">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label for='noduk'>Nomor Urut DUK</label>
                          <input class="form-control" type="text" name='noduk' id='noduk' value="{{ old('noduk') }}" Placeholder='--nomor urut DUK--'>
                            @error('noduk')
                              <div class="text text-danger">nomor urut DUK harus diisi dengan angka</div>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for='nama'>Nama</label>
                          <input class="form-control" type="text" name='nama' id='nama' value="{{ old('nama') }}" Placeholder='--nama lengkap--'>
                            @error('nama')
                              <div class="text text-danger">nama harus diisi</div>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label>Jenis Kelamin</label>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="jeniskelamin" id="Laki-laki" {{ old('jeniskelamin')  === "Laki-laki" ? 'checked':'' }} value="Laki-laki">
                            <label class="form-check-label" for="Laki-laki">Laki-laki</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="jeniskelamin" id="Perempuan" {{ old('jeniskelamin')  === "Perempuan" ? 'checked':'' }} value="Perempuan">
                            <label class="form-check-label" for="Perempuan">Perempuan</label>
                          </div>
                            @error('jeniskelamin')
                              <div class="text text-danger">jenis kelamin harus dipilih</div>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for='nip'>NIP/NRPT</label>
                          <input class="form-control" type="text" name='nip' id='nip' value="{{ old('nip') }}" Placeholder='--NIP/NRPT--'>
                            @error('nip')
                              <div class="text text-danger">NIP/NRPT harus isi</div>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="golongan">Golongan Ruang</label>
                          <select class="form-control" id="golongan" name="golongan">
                              <option value="">--Golongan Ruang--</option>
                              <option {{ old('golongan')  === "Penata Tingkat I / IIId" ? 'selected':'' }} value="Penata Tingkat I / IIId">Penata Tingkat I / IIId</option>
                              <option {{ old('golongan')  === "Penata / IIIc" ? 'selected':'' }} value="Penata / IIIc">Penata / IIIc</option>
                              <option {{ old('golongan')  === "Penata Muda Tingkat I / IIIb" ? 'selected':'' }} value="Penata Muda Tingkat I / IIIb">Penata Muda Tingkat I / IIIb</option>
                              <option {{ old('golongan')  === "Penata Muda / IIIa" ? 'selected':'' }} value="Penata Muda / IIIa">Penata Muda / IIIa</option>
                              <option {{ old('golongan')  === "Pengatur Tingkat I / IId" ? 'selected':'' }} value="Pengatur Tingkat I / IId">Pengatur Tingkat I / IId</option>
                              <option {{ old('golongan')  === "Pengatur / IIc" ? 'selected':'' }} value="Pengatur / IIc">Pengatur / IIc</option>
                              <option {{ old('golongan')  === "Pengatur Muda Tingkat I / IIb" ? 'selected':'' }} value="Pengatur Muda Tingkat I / IIb">Pengatur Muda Tingkat I / IIb</option>
                              <option {{ old('golongan')  === "Pengatur Muda / IIa" ? 'selected':'' }} value="Pengatur Muda / IIa">Pengatur Muda / IIa</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for='tmtgolongan'>TMT Golongan Ruang</label>
                          <input class="form-control" type="date" name='tmtgolongan' id='tmtgolongan' value="{{ old('tmtgolongan') }}" Placeholder='--TMT golongan ruang--'>
                            @error('tmtgolongan')
                              <div class="text text-danger">TMT golongan ruang harus isi</div>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for='jabatan'>Jabatan</label>
                          <input class="form-control" type="text" name='jabatan' id='jabatan' value="{{ old('jabatan') }}" Placeholder='--jabatan--'>
                            @error('jabatan')
                              <div class="text text-danger">jabatan harus diisi</div>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for='statuskepegawaian'>Status Kepegawaian</label>
                          <input class="form-control" type="text" name='statuskepegawaian' id='statuskepegawaian' value="{{ old('statuskepegawaian') }}" Placeholder='--status kepegawaian--'>
                            @error('statuskepegawaian')
                              <div class="text text-danger">status kepegawaian harus diisi</div>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for='tmtjabatan'>TMT Jabatan</label>
                          <input class="form-control" type="date" name='tmtjabatan' id='tmtjabatan' value="{{ old('tmtjabatan') }}" Placeholder='--TMT jabatan--'>
                            @error('tmtjabatan')
                              <div class="text text-danger">TMT jabatan harus diisi</div>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for='unitkerja'>Unit Kerja</label>
                          <input class="form-control" type="text" name='unitkerja' id='unitkerja' value="{{ old('unitkerja') }}" Placeholder='--unit kerja--'>
                            @error('unitkerja')
                              <div class="text text-danger">unit kerja harus diisi</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for='universitas'>Universitas</label>
                            <input class="form-control" type="text" name='universitas' id='universitas' value="{{ old('universitas') }}" Placeholder='--universitas/perguruan tinggi/sekolah tinggi--'>
                              @error('universitas')
                                <div class="text text-danger">universitas harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='jurusan'>Jurusan</label>
                            <input class="form-control" type="text" name='jurusan' id='jurusan' value="{{ old('jurusan') }}" Placeholder='--jurusan--'>
                              @error('jurusan')
                                <div class="text text-danger">jurusan harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='tahunlulus'>Lulus</label>
                            <input class="form-control" type="date" name='tahunlulus' id='tahunlulus' value="{{ old('tahunlulus') }}" Placeholder='--tahun lulus--'>
                              @error('tahunlulus')
                                <div class="text text-danger">tahun lulus harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='npwp'>Nomor NPWP</label>
                            <input class="form-control" type="text" name='npwp' id='npwp' value="{{ old('npwp') }}" Placeholder='--npwp--'>
                              @error('npwp')
                                <div class="text text-danger">nomor NPWP harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='namabank'>Nama Bank</label>
                            <input class="form-control" type="text" name='namabank' id='namabank' value="{{ old('namabank') }}" Placeholder='--nama bank--'>
                              @error('namabank')
                                <div class="text text-danger">nama bank harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='norekening'>Nomor Rekening</label>
                            <input class="form-control" type="text" name='norekening' id='norekening' value="{{ old('norekening') }}" Placeholder='--email--'>
                              @error('norekening')
                                <div class="text text-danger">nomor rekening harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='bpjskesehatan'>Nomor BPJS Kesehatan</label>
                            <input class="form-control" type="text" name='bpjskesehatan' id='bpjskesehatan' value="{{ old('bpjskesehatan') }}" Placeholder='--nomor bpjs kesehatan--'>
                              @error('bpjskesehatan')
                                <div class="text text-danger">nomor BPJS Kesehatan harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='bpjsketenagakerjaan'>Nomor BPJS Ketenagakerjaan</label>
                            <input class="form-control" type="text" name='bpjsketenagakerjaan' id='bpjsketenagakerjaan' value="{{ old('bpjsketenagakerjaan') }}"  Placeholder='--nomor bpjs ketenagakerjaan--'>
                              @error('bpjsketenagakerjaan')
                                <div class="text text-danger">nomor BPJS Ketenagakerjaan harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='phonenumber'>Nomor Handphone</label>
                            <input class="form-control" type="text" name='phonenumber' id='phonenumber' value="{{ old('phonenumber') }}" Placeholder='--nomor handphone--'>
                              @error('phonenumber')
                                <div class="text text-danger">nomor telepon harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='email'>E-mail</label>
                            <input class="form-control" type="text" name='email' id='email' value="{{ old('email') }}" Placeholder='--email--'>
                              @error('email')
                                <div class="text text-danger">e-mail harus diisi</div>
                              @enderror
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for='nik'>NIK</label>
                            <input class="form-control" type="text" name='nik' id='nik' value="{{ old('nik') }}" Placeholder='--nomor induk kependudukan--'>
                              @error('nik')
                                <div class="text text-danger">nomor NIK harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='nokk'>Nomor Kartu Keluarga</label>
                            <input class="form-control" type="text" name='nokk' id='nokk' value="{{ old('nokk') }}"  Placeholder='--nomor kartu keluarga--'>
                              @error('nokk')
                                <div class="text text-danger">nomor Kertu Keluarga harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='tempatlahir'>Tempat, Tanggal Lahir</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" name='tempatlahir' id='tempatlahir' value="{{ old('tempatlahir') }}" Placeholder='--tempat lahir--'>
                                  @error('tempatlahir')
                                    <div class="text text-danger">tempat lahir harus diisi</div>
                                  @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control" type="date" name='tanggallahir' id='tanggallahir' value="{{ old('tanggallahir') }}" Placeholder='--tanggal lahir--'>
                                  @error('tanggallahir')
                                    <div class="text text-danger">tanggal lahir harus diisi</div>
                                  @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='status'>Status</label>
                            <input class="form-control" type="text" name='status' id='status' value="{{ old('status') }}" Placeholder='--status--'>
                              @error('status')
                                <div class="text text-danger">status harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='alamat'>Alamat</label>
                            <input class="form-control" type="text" name='alamat' id='alamat' value="{{ old('alamat') }}" Placeholder='--alamat--'>
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
                                        <option {{ old('rt')  === "001" ? 'selected':'' }} value="001">001</option>
                                        <option {{ old('rt')  === "002" ? 'selected':'' }} value="002">002</option>
                                        <option {{ old('rt')  === "003" ? 'selected':'' }} value="003">003</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="rw">RW</label>
                                    <select class="form-control" id="rw" name="rw">
                                        <option value="">--RW--</option>
                                        <option {{ old('rw')  === "001" ? 'selected':'' }} value="001">001</option>
                                        <option {{ old('rw')  === "002" ? 'selected':'' }} value="002">002</option>
                                        <option {{ old('rw')  === "003" ? 'selected':'' }} value="003">003</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='desa'>Desa/Kelurahan</label>
                            <input class="form-control" type="text" name='desa' id='desa' value="{{ old('desa') }}" Placeholder='--desa/kelurahan--'>
                              @error('desa')
                                <div class="text text-danger">desa/kelurahan harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='kecamatan'>Kecamatan</label>
                            <input class="form-control" type="text" name='kecamatan' id='kecamatan' value="{{ old('kecamatan') }}" Placeholder='--kecamatan--'>
                              @error('kecamatan')
                                <div class="text text-danger">kecamatan harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='kabupaten'>Kabupaten/Kotamadya</label>
                            <input class="form-control" type="text" name='kabupaten' id='kabupaten' value="{{ old('kabupaten') }}" Placeholder='--kabupaten/kotamadya--'>
                              @error('kabupaten')
                                <div class="text text-danger">kabupaten harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='provinsi'>Provinsi</label>
                            <input class="form-control" type="text" name='provinsi' id='provinsi' value="{{ old('provinsi') }}" Placeholder='--provinsi--'>
                              @error('provinsi')
                                <div class="text text-danger">provinsi harus diisi</div>
                              @enderror
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for='terbitstr'>Terbit STR</label>
                            <input class="form-control" type="date" name='terbitstr' id='terbitstr' value="{{ old('terbitstr') }}" Placeholder='--tanggal terbit str--'>
                              @error('terbitstr')
                                <div class="text text-danger">tanggal terbit STR harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='str'>Nomor STR</label>
                            <input class="form-control" type="text" name='str' id='str' value="{{ old('str') }}" Placeholder='--nomor str--'>
                              @error('str')
                                <div class="text text-danger">nomor STR harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='berlakustr'>Berlaku STR</label>
                            <input class="form-control" type="date" name='berlakustr' id='berlakustr' value="{{ old('berlakustr') }}" Placeholder='--tanggal berlaku str--'>
                              @error('berlakustr')
                                <div class="text text-danger">tanggal berlaku STR harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='terbitsip'>Terbit SIP</label>
                            <input class="form-control" type="date" name='terbitsip' id='terbitsip' value="{{ old('terbitsip') }}" Placeholder='--tanggal terbit sip--'>
                              @error('terbitsip')
                                <div class="text text-danger">tanggal terbit SIP harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='sip'>Nomor SIP</label>
                            <input class="form-control" type="text" name='sip' id='sip' value="{{ old('sip') }}" Placeholder='--nomor sip--'>
                              @error('sip')
                                <div class="text text-danger">nomor SIP harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for='berlakusip'>Berlaku SIP</label>
                            <input class="form-control" type="date" name='berlakusip' id='berlakusip' value="{{ old('berlakusip') }}" Placeholder='--tanggal berlaku sip--'>
                              @error('berlakusip')
                                <div class="text text-danger">tanggal berlaku SIP harus diisi</div>
                              @enderror
                        </div>
                        <div class="form-group">
                            <label for="pelatihan">Pelatihan</label>
                            <textarea class="form-control" type="text" name="pelatihan" id="pelatihan" rows="5">{{ old('pelatihan') }}</textarea>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
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
