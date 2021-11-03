@extends('layouts.app')

@section('dokumen')
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
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-dark border border-dark">
              <div class="card-header">
                <h3 class="card-title">Dokumen</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <form action={{route('pegawai.dokumen')}} class="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                          @if (session('dokumen'))
                            <div class="alert alert-info">
                              {{ session('dokumen') }}
                            </div>
                          @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="--judul file--">
                            @error('title')
                              <div class="text text-danger">judul harus diisi</div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="file">File</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="fileinput" id="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">--pilih file--</label>
                              </div>
                            </div>
                            @error('fileinput')
                              <div class="text text-danger">file harus dipilih (pdf,docx,xlsx|max:4MB)</div>
                            @enderror
                          </div>
                          <button type="submit" class="btn btn-block btn-primary">UPLOAD</button>
                        </div>
                    </div>
                  </form>
              </div>
                <!-- /.card-body -->
              <div class="card-footer border-top border-primary p-0">
                    <div class="row p-0">
                        <div class="col-lg-12">
                          @if (count($documents))
                            <table class="table table-hover text-wrap">
                              @foreach($documents as $document)
                                <tr>
                                  <th class="text-center" scope="col" style="width:5%">#</th>
                                  <th class="text-left" scope="col" ><a href="{{asset('storage/'.$document->file)}}" target=_blank class="">{{$document->title}}</a></th>
                                  <th class="text-right" scope="col">
                                    <div class="btn-group dropright">
                                      <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action </button>
                                      <div class="dropdown-menu p-0">
                                        <a class="dropdown-item bg-warning" href={{route('pegawai.dokumen.edit', ['id' => $document->id])}}>Edit</a>
                                        <a class="dropdown-item bg-danger" href="#" data-toggle="modal" data-target="#modal-delete-document-{{$document->id}}">Hapus</a>
                                      </div>
                                    </div>
                                  </th>
                                </tr>
                              @endforeach
                            </table>
                          @else
                          <h3 class="text-danger p-3">Tidak Ada Dokumen</h3>
                          @endif
                        </div>
                    </div>
              </div>
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


<!-- -----START MODAL DELETE DOKUMEN----- -->
@foreach($documents as $document)
<div class="modal fade" id="modal-delete-document-{{$document->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">HAPUS DOKUMEN</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action={{route('pegawai.dokumen.delete', ['id' => $document->id])}} class="dropdown-item" method="post">
                  @csrf
                  @method('delete')
                  Yakin Ingin Hapus Dokumen "<b>{{$document->title ?? ''}}</b>" ?
            </div>
            <div class="modal-footer text-right">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-primary">Ya</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endforeach
<!-- -----END MODAL DELETE DOKUMEN----- -->
@endsection
