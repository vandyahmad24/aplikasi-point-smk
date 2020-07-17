@extends('layouts.backend')

@section('content')
   <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tambah Siswa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tambah Siswa</li>
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
                                        Tambah Siswa Baru
                                    </div>
                                    <div class="container">
                                       <form class="mt-2" method="post" action="{{route('post-siswa')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                          <label for="nama">Nama Siswa</label>
                                          <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp">
                                        </div>
                                         <div class="form-group">
                                          <label for="NIK">NIS Siswa</label>
                                          <input type="number" name="number" class="form-control" id="NIK" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                          <label for="Alamat">Alamat Siswa</label>
                                          <input type="text" name="alamat" class="form-control" id="Alamat" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                          <label for="kelas">Kelas Siswa</label>
                                          <select class="form-control" name="kelas">
                                            <option value="X">X</option>
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label for="jurusan">Jurusan Siswa</label>
                                          <select class="form-control" name="jurusan">
                                            @foreach($jurusan as $key)
                                            <option value="{{$key->kode}}">{{$key->nama}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label for="anggkatan">Anggkatan</label>
                                          <input type="text" name="anggkatan" class="form-control" id="anggkatan" aria-describedby="emailHelp">
                                        </div>
                                        <small>Daftar Siswa yang anda inputkan akan default membuat password untuk guru berupa <b>smk_bisa</b> Siswa bisa login dengan memasukkan NIS dan Password</small>
                                        
                                        
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                      </form>
                            </div>
                          
                        </div>
                    </div>
                </main>
@endsection