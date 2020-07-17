@extends('layouts.backend')

@section('content')
   <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Selamat Datang {{Auth::user()->nama}}</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Halaman Dashboard</li>
                        </ol>
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
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        Foto Profil
                                    </div>
                                    <div class="card-body text-center">
                                      <img src="{{asset('upload/profil/'.Auth::user()->foto)}}" width="50%">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        Profil Anda 
                                    </div>
                                    <div class="card-body text-center">
                                      <table class="table table-sm">
                                          <tr>
                                            <th scope="col">Nama</th>
                                            <td scope="col">{{Auth::user()->nama}}</td>
                                          </tr>
                                          <tr>
                                            <th scope="col">NIS</th>
                                            <td scope="col">{{Auth::user()->number}}</td>
                                          </tr>
                                          <tr>
                                            <th>Alamat</th>
                                            <td scope="col">{{Auth::user()->profil_siswa->alamat}}</td>
                                          </tr>
                                          <tr>
                                            <th>Anggkatan</th>
                                            <td scope="col">{{Auth::user()->profil_siswa->anggkatan}}</td>
                                          </tr>
                                          <tr>
                                            <th>Kelas</th>
                                            <td scope="col">{{Auth::user()->profil_siswa->kelas}}</td>
                                          </tr>
                                          <tr>
                                            <th>Jurusan</th>
                                            <td scope="col">{{Auth::user()->profil_siswa->jurusan}}</td>
                                          </tr>
                                          <tr>
                                            <th>Point Anda</th>
                                            <th scope="col">{{Auth::user()->profil_siswa->point}}</th>
                                          </tr>
                                          <tr>
                                           <td  colspan="2" > <a href="{{route('edit-dari-siswa',Auth::user()->id)}}"class=" btn btn-warning btn-sm">Edit Profil</a></td>
                                          </tr>

                                      </table>
                                    </div>
                                </div>
                            </div>
                             <div class="col-xl-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        Point Pelanggaran Saya
                                    </div>
                                    <div class="card-body text-center">
                                      <table class="table table-sm">
                                        
                                        <thead>
                                          <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Tanggal Pelanggaran</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Jenis Point</th>
                                            <th scope="col">Sub Point</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($log as $key)
                                          <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$key->created_at}}</td>
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
                     
                    </div>
                </main>
              
@endsection