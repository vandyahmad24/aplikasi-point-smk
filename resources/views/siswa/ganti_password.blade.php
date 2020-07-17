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
                                         <form class="form-horizontal" role="form" method="POST" action="{{route('siswa-put-password')}}">
                 
                                        {{ csrf_field() }}

                 
                                        <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                                            <label for="current_password" class="col-md-4 control-label">Password Sekarang</label>
                 
                                            <div class="col-md-12">
                                                <input id="current_password" type="password" class="form-control" name="current_password" autofocus>
                                                <span class="help-block">{{ $errors->first('current_password') }}</span>
                                            </div>
                                        </div>
                 
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">Password Baru</label>
                 
                                            <div class="col-md-12">
                                                <input id="password" type="password" class="form-control" name="password">
                                                <span class="help-block">{{ $errors->first('password') }}</span>
                                            </div>
                                        </div>
                 
                                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <label for="password_confirmation" class="col-md-4 control-label">Password Konfirmasi</label>
                 
                                            <div class="col-md-12">
                                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                                                <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                                            </div>
                                        </div>
                 
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Ganti Password
                                                </button>
                                            </div>
                                        </div>
                                        </form>
                                    
                                    </div>
                                </div>
                               
                                      
                            </div>
                          
                        </div>
                    </div>
                </main>
@endsection