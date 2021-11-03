@extends('layouts.app')


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><a href={{route('admin.pegawai.show', ['id' => $employe->id])}}>{{$employe->nama}}</a></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row p-3">
          <div class="col-lg-4">
              <div class="card card-dark">
                  <div class="card-header">
                      <h3 class="card-title">Akun</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="post" action={{route('admin.akun.create', [ 'id' => $employe->id])}}>
                  @csrf
                  <div class="card-body">
                      <div class="row">
                          <div class="col-lg-12">
                              <!-- <div class="form-group">
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile"></label>
                                  </div>
                                </div>
                                  @error('image')
                                    <div class="text text-danger">{{$message}}</div>
                                  @enderror
                              </div> -->
                              <div class="input-group mt-3">
                                <input type="text" name="username" class="form-control" value="{{old('username')}}" placeholder="--username--">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                    </div>
                                </div>
                              </div>
                              @error('username')
                                <div class="text text-danger">{{$message}}</div>
                              @enderror
                              <div class="input-group mt-3">
                                <input type="password" name="password" class="form-control" placeholder="--password--">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                              </div>
                              @error('password')
                                <div class="text text-danger">{{$message}}</div>
                              @enderror
                              <div class="input-group mt-3">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="--retype password--">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                              </div>
                              @error('password_confirmation')
                                <div class="text text-danger">{{$message}}</div>
                              @enderror
                          </div>
                      </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Create</button>
                  </div>
                  </form>
              </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
