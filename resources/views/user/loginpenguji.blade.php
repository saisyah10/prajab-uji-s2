@extends('baseloginpenguji')
@section('title','Login Penguji')
@section('content')
<div class="limiter">
    <div class="container-login100" style="{{ asset('assets/css_frontEnd/images/pln.jpg')}}">
      <div class="wrap-login100 p-t-30 p-b-50">
        <span class="login100-form-title p-b-41">
          Login Penguji
        </span>
        @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
            @endif
            @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
            @endif
        <form class="login100-form validate-form p-b-33 p-t-5" action="{{ url('/user/loginPostUser') }}" method="post">
        {{ csrf_field() }}
          <div class="wrap-input100 validate-input" data-validate = "Username">
            <input class="input100" type="text" name="username" id="username" placeholder="Username">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Password">
            <input class="input100" type="password" name="password" id="password" placeholder="Password">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="container-login100-form-btn m-t-32">
            <button class="login100-form-btn" type="submit" name="button">
               <a>LOGIN</a>
            </button>
          </div>

        </form>
      </div>
      </div>
</div>



