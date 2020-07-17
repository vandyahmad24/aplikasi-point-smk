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
                                <a href="{{route('tambah-foto')}}" class="btn btn-primary" >Tambah Foto</a>
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

                                  
                                <div class="card mb-4 mt-2">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Daftar Foto Kegiatan
                                    </div>
                                    <table class="table table-hover">
                                      <thead>
                                        <tr>
                                          <th scope="col">No</th>
                                          <th scope="col">Nama Foto</th>
                                          <th scope="col">Nama Kegiatan</th>
                                          <th scope="col">Foto</th>
                                          <th scope="col">Aksi</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($foto as $key)
                                        <tr>
                                          <th scope="row">{{$loop->iteration}}</th>
                                          <td>{{$key->nama_foto}}</td>
                                          <td>{{$key->nama_kegiatan}}</td>
                                           <td> <img src="{{asset('upload/foto/'.$key->foto)}}" width="10%">
                                            </td>
                                          <td>
                                                <a href="{{route('delete-foto',$key->id)}}" class="btn btn-danger"  onclick="return confirm('Anda Yakin Akan Menghapus Tersebut?')">Delete</a>
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
             






     

@endsection