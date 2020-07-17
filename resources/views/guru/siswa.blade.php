@extends('layouts.backend')

@section('content')
   <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Siswa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Daftar Siswa</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-12">
                                <a href="{{route('export-siswa')}}" class="btn btn-danger">Download Excel</a>
                                  @if(Session::has("success"))
                                  <div class="alert alert-success mt-2 mb-2">
                                    {{Session::get('success')}}
                                  </div>
                                  @endif
                                  @if(Session::has("delete"))
                                  <div class="alert alert-danger mt-2 mb-2">
                                    {{Session::get('delete')}}
                                  </div>
                                  @endif
                                <div class="card mb-4 mt-2">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Daftar Siswa
                                    </div>
                                    <table class="table table-hover" id="dataTable">
                                      <thead>
                                        <tr>
                                          <th scope="col">No</th>
                                          <th scope="col">Nama</th>
                                          <th scope="col">NISN</th>
                                          <th scope="col">Alamat</th>
                                          <th scope="col">Kelas</th>
                                          <th scope="col">Jurusan</th>
                                          <th scope="col">Anggkatan</th>
                                          <th scope="col">Point</th>
                                          <th scope="col">Foto</th>
                                          <th scope="col">Aksi</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($siswa as $key)
                                        <tr>
                                          <th scope="row">{{$loop->iteration}}</th>
                                          <td>{{$key->nama}}</td>
                                          <td>{{$key->number}}</td>
                                          <td>{{$key->alamat}}</td>
                                          <td>{{$key->kelas}}</td>
                                          <td>{{$key->jurusan}}</td>
                                          <td>{{$key->anggkatan}}</td>
                                          <td>{{$key->point}}</td>
                                          <td> <img src="{{asset('upload/profil/'.$key->foto)}}" width="25%"> </td>
                                          <td>
                                              <a href="{{route('tambah-point',$key->id_user)}}" class="btn btn-danger">Tambah Point</a>
                                              <a href="{{route('histori-point',$key->nama)}}" class="btn btn-success">Histori Point</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                       
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </main>
             

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('import-siswa')}}" enctype="multipart/form-data">
          @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Upload Excel</label>
          <input type="file" name="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted"> <span class="text-danger">Wajib bertipe .xls sesuai format yang disediakan. <b>NIS tidak boleh ada yang sama, perhatikan terlebih dahulu apakah NIS sudah terdaftar atau belum</b></span>.</small>
        </div>
        
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
       </form>
    </div>
  </div>
</div>



@endsection