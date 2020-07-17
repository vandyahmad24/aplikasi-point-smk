@extends('layouts.backend')

@section('content')
   <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Daftar Guru</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Daftar Guru</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-12">
                                <a  class="btn btn-primary" href="{{route('tambah-guru')}}">Tambah Guru</a>
                                 
                                 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                  Import Excel
                                </button>
                                <a href="{{route('export-guru')}}" class="btn btn-danger">Download Excel</a>
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

                                  @if($errors->any())
                                  <div class="alert alert-danger mt-2 mb-2" role="alert">
                                    {{$errors->first()}}
                                  </div>
                                  @endif
                                  


                                <div class="card mb-4 mt-2">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Daftar Jurusan
                                    </div>
                                    <table class="table table-hover">
                                      <thead>
                                        <tr>
                                          <th scope="col">No</th>
                                          <th scope="col">Nama</th>
                                          <th scope="col">NIK</th>
                                          <th scope="col">Alamat</th>
                                          <th scope="col">Foto</th>
                                          <th scope="col">Aksi</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($guru as $key)
                                        <tr>
                                          <td scope="col">{{$loop->iteration}}</td>
                                          <td scope="col">{{$key->nama}}</td>
                                          <td scope="col">{{$key->number}}</td>
                                          <td scope="col">{{$key->alamat}}</td>
                                          <td scope="col"><img src="{{asset('upload/profil/'.$key->foto)}}" width="10%"></td>
                                          <td><a class="btn btn-warning" href="{{route('edit-guru',$key->id)}}">Edit </a>
                                                <a href="{{route('delete-guru',$key->id)}}" class="btn btn-danger"  onclick="return confirm('Anda Yakin Akan Menghapus Tersebut?')">Delete</a>
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


                <!-- Button trigger modal -->


<!-- Modal -->
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
        <form method="post" action="{{route('import-guru')}}" enctype="multipart/form-data">
          @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Upload Excel</label>
          <input type="file" name="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted"> <span class="text-danger">Wajib bertipe .xls sesuai format yang disediakan. <b>NIK tidak boleh ada yang sama, perhatikan terlebih dahulu apakah NIK sudah terdaftar atau belum</b></span>.</small>
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