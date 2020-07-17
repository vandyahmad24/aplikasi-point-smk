@extends('layouts.backend')

@section('content')
   <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Siswa {{$siswa}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('daftar-siswa')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Jumlah Guru {{$guru_jumlah}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('daftar-guru')}}">Lihat Detail</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Daftar Jurusan
                                    </div>
                                    <table class="table table-hover">
                                      <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Kode</th>
                                          <th scope="col">Nama</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($jurusan as $key)
                                        <tr>
                                          <th scope="row">{{$loop->iteration}}</th>
                                          <td>{{$key->kode}}</td>
                                          <td>{{$key->nama}}</td>
                                        </tr>
                                        @endforeach
                                       
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Daftar Guru
                                    </div>
                                    <table class="table table-hover">
                                      <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Nama</th>
                                          <th scope="col">NIK</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($guru as $key)
                                        <tr>
                                          <th scope="row">{{$loop->iteration}}</th>
                                          <td>{{$key->nama}}</td>
                                          <td>{{$key->number}}</td>

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