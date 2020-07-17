@extends('layouts.backend')

@section('content')
   <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Foto foto kegiatan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Foto Kegiatan</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-12">
                              @if($errors->any())
                                  <div class="alert alert-danger mt-2 mb-2" role="alert">
                                    {{$errors->first()}}
                                  </div>
                                  @endif
                            <form method="post" action="{{route('post-foto')}}" enctype="multipart/form-data">
                              @csrf
                            <div class="form-group">
                              <label for="nama_kegiatan">Nama Foto</label>
                              <input type="text" name="nama_foto" class="form-control" id="nama_kegiatan" aria-describedby="emailHelp">
                            </div>
                             <div class="form-group">
                              <label for="nama_kegiatan">Nama Kegiatan</label>
                              <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan" aria-describedby="emailHelp">
                            </div>
                             <div class="form-group">
                              <label for="nama_kegiatan">Foto Kegiatan</label>
                              <input type="file" name="gambar" class="form-control" id="nama_kegiatan" aria-describedby="emailHelp">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                            </div>
                        </div>
                          
                        </div>
                    </div>
                  </div>
                </main>

             






     

@endsection