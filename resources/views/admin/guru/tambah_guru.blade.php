@extends('layouts.backend')

@section('content')
   <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tambah Guru</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tambah Guru</li>
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
                                        Tambah Guru Baru
                                    </div>
                                    <div class="container">
                                       <form class="mt-2" method="post" action="{{route('post-guru')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                          <label for="nama">Nama Guru</label>
                                          <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp">
                                        </div>
                                         <div class="form-group">
                                          <label for="NIK">NIK Guru</label>
                                          <input type="number" name="number" class="form-control" id="NIK" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                          <label for="Alamat">Alamat Guru</label>
                                          <input type="text" name="alamat" class="form-control" id="Alamat" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                          <label for="Foto">Foto Guru</label>
                                          <input type="file" name="gambar" class="form-control" id="Foto" aria-describedby="emailHelp">
                                        </div>
                                        <small>Daftar yang anda inputkan akan default membuat password untuk guru berupa <b>smk_bumi_nusantara</b> Guru bisa login dengan memasukkan NIK dan Password</small>
                                        
                                        
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                      </form>
                            </div>
                          
                        </div>
                    </div>
                </main>
@endsection