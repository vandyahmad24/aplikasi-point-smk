@extends('layouts.backend')

@section('content')
   <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Point Siswa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Daftar Siswa</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4 mt-2">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Daftar Siswa Point terkecil
                                    </div>
                                    <table class="table table-hover" >
                                      <thead>
                                        <tr>
                                          <th scope="col">No</th>
                                          <th scope="col">Nama</th>
                                          <th scope="col">Kelas</th>
                                          <th scope="col">Jurusan</th>
                                          <th scope="col">Anggkatan</th>
                                          <th scope="col">Point</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($terkecil as $key)
                                        <tr>
                                          <th scope="row">{{$loop->iteration}}</th>
                                          <td>{{$key->user->nama}}</td>
                                          <td>{{$key->kelas}}</td>
                                          <td>{{$key->jurusan}}</td>
                                          <td>{{$key->anggkatan}}</td>
                                          <td>{{$key->point}}</td>
                                          
                                        </tr>
                                        @endforeach
                                       
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                             <div class="col-xl-6">
                                <div class="card mb-4 mt-2">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Daftar Siswa Point Terbesar
                                    </div>
                                    <table class="table table-hover" >
                                      <thead>
                                        <tr>
                                          <th scope="col">No</th>
                                          <th scope="col">Nama</th>
                                          <th scope="col">Kelas</th>
                                          <th scope="col">Jurusan</th>
                                          <th scope="col">Anggkatan</th>
                                          <th scope="col">Point</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($terbanyak as $key)
                                        <tr>
                                          <th scope="row">{{$loop->iteration}}</th>
                                          <td>{{$key->user->nama}}</td>
                                          <td>{{$key->kelas}}</td>
                                          <td>{{$key->jurusan}}</td>
                                          <td>{{$key->anggkatan}}</td>
                                          <td>{{$key->point}}</td>
                                          
                                        </tr>
                                        @endforeach
                                       
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </main>
             




@endsection