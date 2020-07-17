@extends('layouts.backend')

@section('content')
   <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Jurusan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Daftar Jurusan</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-12">
                                <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">Tambah Jurusan</button>
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
                                          <th scope="col">Kode</th>
                                          <th scope="col">Nama</th>
                                          <th scope="col">Aksi</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($jurusan as $key)
                                        <tr>
                                          <th scope="row">{{$loop->iteration}}</th>
                                          <td>{{$key->kode}}</td>
                                          <td>{{$key->nama}}</td>
                                          <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_jurusan{{$key->id}}">
                                                  Edit
                                                </button>
                                                <a href="{{route('delete-jurusan',$key->id)}}" class="btn btn-danger"  onclick="return confirm('Anda Yakin Akan Menghapus Tersebut?')">Delete</a>
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
             

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jurusan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('post-jurusan')}}">
            @csrf
          <div class="form-group">
            <label for="kode_jurusan">Kode Jurusan</label>
            <input type="text" name="kode" class="form-control" id="kode_jurusan" placeholder="TKR ">
          </div>
          <div class="form-group">
            <label for="nama_jurusan">Nama Jurusan</label>
            <input type="text" name="jurusan" class="form-control" id="nama_jurusan" placeholder="Teknik Kendaraan Ringan ">
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah Jurusan</button>
      </div>
       </form>
    </div>
  </div>
</div>

@foreach($jurusan as $key)
<div class="modal fade" id="edit_jurusan{{$key->id}}" tabindex="-1" role="dialog" aria-labelledby="edit_jurusan1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Jurusan <b>  {{$key->nama}} </b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('put-jurusan')}}">
            @csrf
          <div class="form-group">
            <label for="kode_jurusan">Kode Jurusan</label>
            <input type="hidden" name="id" class="form-control" id="kode_jurusan" value="{{$key->id}}">
            <input type="text" name="kode" class="form-control" id="kode_jurusan" value="{{$key->kode}}">
          </div>
          <div class="form-group">
            <label for="nama_jurusan">Nama Jurusan</label>
            <input type="text" name="jurusan" class="form-control" id="nama_jurusan" value="{{$key->nama}}">
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Edit Jurusan</button>
      </div>
       </form>
    </div>
  </div>
</div>
@endforeach

     

@endsection