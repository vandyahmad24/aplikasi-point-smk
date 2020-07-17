@extends('layouts.backend')

@section('content')
   <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Buat Point {{$siswa->nama}}</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tambah Point</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-12">
                                  @if($errors->any())
                                  <div class="alert alert-danger mt-2 mb-2" role="alert">
                                    {{$errors->first()}}
                                  </div>
                                  @endif
                                <div class="card mb-4 mt-2">
                                    <div class="container">
                                       <form class="mt-2" method="post" action="{{route('tambah-point-siswa')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                          <label for="nama">Nama Siswa</label>
                                          <input type="hidden" name="id" class="form-control" readonly="" value="{{$siswa->id}}" id="nama" aria-describedby="emailHelp">
                                          <input type="text" name="nama" class="form-control" readonly="" value="{{$siswa->nama}}" id="nama" aria-describedby="emailHelp">
                                        </div>
                                         <div class="form-group">
                                          <label for="NIK">NIS Siswa</label>
                                          <input type="text" name="number" class="form-control" id="NIK" aria-describedby="emailHelp" readonly="" value="{{$siswa->number}}" >
                                        </div>
                                        <div class="form-group">
                                          <label for="kelas">Kelas Siswa</label>
                                          <input type="text" name="kelas" class="form-control" id="kelas" readonly="" value="{{$siswa->profil_siswa->kelas}}">
                                        </div>
                                        <div class="form-group">
                                          <label for="jurusan">Jurusan Siswa</label>
                                          <input type="text" name="jurusan" class="form-control" id="jurusan" readonly="" value="{{$siswa->profil_siswa->jurusan}}">
                                        </div>
                                        <div class="form-group">
                                          <label for="point">Total Point</label>
                                          <input type="text" name="point" class="form-control" id="point" readonly="" value="{{$siswa->profil_siswa->point}}">
                                        </div>
                                        <hr>
                                        <h4>Buat Point</h4>
                                        <div class="form-group">
                                          <label for="point"> Jenis point</label>
                                          <select class="form-control" name="jenis_point">
                                            <option value="prestasi">Prestasi</option>
                                            <option value="pelanggaran">Pelanggaran</option>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label for="keterangan">Keterangan Point</label>
                                          <input type="text" name="keterangan" class="form-control" id="keterangan">
                                        </div>
                                         <div class="form-group">
                                          <label for="point">Jumlah Point</label>
                                          <input type="text" name="subpoint" class="form-control" id="point">
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