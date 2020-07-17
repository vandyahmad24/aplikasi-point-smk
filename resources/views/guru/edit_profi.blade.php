@extends('layouts.backend')

@section('content')
   <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Edit Profil <b>{{$user->nama}}</b></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit Profil Guru</li>
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
                                       Edit Profil <b>{{$user->nama}}
                                    </div>
                                    <div class="container">
                                       <form class="mt-2" method="post" action="{{route('put-profil-guru')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                          <label for="nama">Nama Guru</label>
                                          <input type="hidden" name="id" value="{{$user->id}}">
                                           <input type="hidden" name="profil_guru" value="{{$user->profil_guru->id}}">
                                          <input type="text" name="nama" class="form-control" value="{{$user->nama}}" id="nama" aria-describedby="emailHelp">
                                        </div>
                                         <div class="form-group">
                                          <label for="NIK">NIK Guru</label>
                                          <input type="number" name="number" class="form-control" value="{{$user->number}}" id="NIK" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                          <label for="Alamat">Alamat Guru</label>
                                          <input type="text" name="alamat" class="form-control" value="{{$user->profil_guru->alamat}}" id="Alamat" aria-describedby="emailHelp">
                                        </div>
                                       
                                        <div class="form-group">
                                          <label for="Foto">Foto Guru</label>
                                          <img src="{{asset('upload/profil/'.$user->foto)}}" width="20%">
                                        </div>
                                         <div class="form-group">
                                          <label for="Foto">Foto Guru</label>
                                          <input type="file" name="gambar" class="form-control" id="Foto" aria-describedby="emailHelp">
                                        </div>
                                         <div class="form-group">
                                          <a href="{{route('ganti-password-guru',$user->id)}}" class="btn btn-danger">Ganti Kata Sandi</a>
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