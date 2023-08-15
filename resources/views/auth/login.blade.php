@extends('layouts.auth')

@section('content')

<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Welcome!</h1>
            {{-- <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p> --}}
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Login</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input id="form_username_email" type="email" placeholder="Enter Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input id="form_password" type="password" placeholder="Enter password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-check-info text-start">
                   Remember me
                   <input id="form_checkbox" class="text-dark font-weight-bolder" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Login</button >
                </div>
            </form>
                 <!-- GitHub Login Button -->
                 <!-- <login-with-github /> -->
                 <div class="clear text-center">
                    @if (Route::has('password.request'))
                    {{-- <a class="text-theme-colored font-weight-600 font-12" href="{{ route('password.request') }}">Forgot Your Password?</a> --}}
                    @endif
                    <a class="text-theme-colored font-weight-600 font-12 text-info" href="{{ route('register') }}">Create New Account?</a>

                </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

@endsection
