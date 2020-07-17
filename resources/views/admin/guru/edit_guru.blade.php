@extends('layouts.backend')

@section('content')
   <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Edit Guru {{$guru->nama}}</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit Guru</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-12">
                                  @if($errors->any())
                                  <div class="alert alert-danger mt-2 mb-2" role="alert">
                                    {{$errors->first()}}
                                  </div>
                                  @endif
                                <div class="card mb-4 mt-2">
                                    <div class="card-header">
                                        Edit Guru <b> </b>
                                    </div>
                                    <div class="container">
                                       <form class="mt-2" method="post" action="{{route('put-guru')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                          <label for="nama">Nama Guru</label>
                                          <input type="hidden" name="id_user" value="{{$guru->id}}">
                                          <input type="hidden" name="profil_guru" value="{{$guru->profil_guru->id}}">
                                          <input type="text" name="nama" class="form-control" id="nama"  value="{{$guru->nama}}">
                                        </div>
                                         <div class="form-group">
                                          <label for="NIK">NIK Guru</label>
                                          <input type="number" name="number" class="form-control" id="NIK" value="{{$guru->number}}">
                                        </div>
                                        <div class="form-group">
                                          <label for="Alamat">Alamat Guru</label>
                                          <input type="text" name="alamat" class="form-control" id="Alamat" value="{{$guru->profil_guru->alamat}}">
                                        </div>
                                        <div class="form-group">
                                          <label for="Foto">Foto Guru</label>
                                          <input type="file" name="gambar" class="form-control" id="Foto" aria-describedby="emailHelp">
                                         
                                        </div>
                                         <div class="form-group">
                                          <label>Foto Guru : {{$guru->nama}}</label><br>
                                          <img src="{{asset('upload/profil/'.$guru->foto)}}" width="25%">
                                          </div>
                                      
                                        
                                        
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                      </form>
                            </div>
                          
                        </div>
                    </div>
                </main>
@endsection