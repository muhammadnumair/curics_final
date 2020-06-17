@extends('layouts.frontend.layout')
@section('content')
<main>
   <div class="bg_color_2">
      <div class="container margin_60_35">
         <div id="login-2">
            <h1>Login to Curics!</h1>
            <form class="kt-form"  method="POST" action="{{ route('login') }}" novalidate="novalidate">
               @csrf
               <div class="box_form clearfix">
                  <div class="box_login" style="width: 100%;">
                     <div class="form-group">
                        <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="form-group">
                        <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <a href="#0" class="forgot"><small>Forgot password?</small></a>
                     </div>
                     <div class="form-group">
                        <input class="btn_1" type="submit" value="Login">
                     </div>
                  </div>
               </div>
            </form>
            <p class="text-center link_bright">Do not have an account yet? <a href="#0"><strong>Register now!</strong></a></p>
         </div>
         <!-- /login -->
      </div>
   </div>
</main>
@endsection