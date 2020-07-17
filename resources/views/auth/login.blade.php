@extends('layouts.new_form')

@section('content')
  <img class="wave" src="{{asset('new_form/img/wave.png')}}">
    <div class="container">
        <div class="img">
            <img src="{{asset('new_form/img/bg.svg')}}">
        </div>
        <div class="login-content">
            <form action="{{route('login')}}" method="post"  autocomplete="off">
              @csrf
                <img src="{{asset('front/logo.png')}}">
                <h2 class="title">Selamat Datang </h2>
                    @if($errors->any())
                      <div class="alert alert-danger" role="alert">
                        {{$errors->first()}}
                      </div>
                      @endif
                      @if (\Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                           {!! \Session::get('error') !!}
                        </div>
                    @endif
                <div class="input-div one">
                   <div class="i">
                        <i class="fas fa-user"></i>
                   </div>
                   <div class="div">
                        <h5>NIS/NIK</h5>
                        <input name="number" type="text" class="input">
                   </div>
                </div>
                <div class="input-div pass">
                   <div class="i"> 
                        <i class="fas fa-lock"></i>
                   </div>
                   <div class="div">
                        <h5>Password</h5>
                        <input name="password" type="password" class="input">
                   </div>
                </div>
                <a href="#">Forgot Password?</a>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
@endsection
