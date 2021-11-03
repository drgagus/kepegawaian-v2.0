@extends('layouts.app')

@section('guestmenu')
menu-open
@endsection

@section('guestpengaturan')
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
              <li class="breadcrumb-item active">Pengaturan</li>
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
            <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Pengaturan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action={{route('admin.guest.pengaturan')}}>
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
                            <div class="form-group">
                              <label for='password'>Password</label>
                              <input class="form-control" type="password" name='password' id='password' value="{{ old('password') }}" Placeholder='--password guest account--'>
                                @error('password')
                                  <div class="text text-danger">Password</div>
                                @enderror
                            </div>
                            <div class="form-group">
                              <label for='expired'>Date Expired</label>
                              <input class="form-control" type="date" name='expired' id='expired' value="{{ old('expired') ?? $guestaccount->expired}}" Placeholder='--date expired--'>
                                @error('expired')
                                  <div class="text text-danger">Date expired</div>
                                @enderror
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
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
