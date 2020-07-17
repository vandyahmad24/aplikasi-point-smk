@extends('layouts.backend')

@section('content')
   <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Daftar Point</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Daftar Point</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card mb-4 mt-2">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Daftar Point
                                    </div>
                                    <table class="table table-hover" id="dataTable">
                                      <thead>
                                        <tr>
                                          <th scope="col">No</th>
                                          <th scope="col">Nama Guru</th>
                                          <th scope="col">Nama Siswa</th>
                                          <th scope="col">Keterangan Point</th>
                                          <th scope="col">Jenis Point</th>
                                          <th scope="col">Sub Point</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($point as $key)
                                        <tr>
                                          <th scope="row">{{$loop->iteration}}</th>
                                          <td>{{$key->guru_bk}}</td>
                                          <td>{{$key->nama_siswa}}</td>
                                          <td>{{$key->keterangan}}</td>
                                          <td>{{$key->jenis_point}}</td>
                                          <td>{{$key->subpoint}}</td>
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