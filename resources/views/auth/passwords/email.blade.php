@extends('layouts.site')

@section('content')
<div class="main-content"> 
    <!-- Section: home -->
    <section id="home" class="divider parallax fullscreen layer-overlay overlay-white-9" data-bg-img={{asset("site/assets/images/bg/bg1.jpg")}} style="background-image: url('site/assets/images/bg/bg1.jpg'); background-position: 50% -12px;">
      <div class="display-table">
        <div class="display-table-cell">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-md-push-3">
                <div class="text-center mb-60"><a href="#" class=""><img alt="" src={{asset("site/assets/images/logo-wide.png")}}></a></div>
                <h4 class="text-theme-colored mt-0 pt-5"> Reset Password</h4>  
               
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
               @endif      
               
                <form name="login-form" class="form-transparent clearfix" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="form_username_email">Email Adress</label>
                      <input id="form_username_email" placeholder="Enter Your Email Adress" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                  </div>
                  
                  
                  <div class="form-group pull-right mt-10">
                    <button type="submit" class="btn btn-dark btn-sm">Reset</button>
                  </div>
                
                  {{-- <div class="clear text-center pt-10">
                    <a class="btn btn-dark btn-lg btn-block no-border mt-15 mb-15" href="#" data-bg-color="#3b5998" style="background: rgb(59, 89, 152) !important;">Login with facebook</a>
                    <a class="btn btn-dark btn-lg btn-block no-border" href="#" data-bg-color="#00acee" style="background: rgb(0, 172, 238) !important;">Login with twitter</a>
                  </div> --}}
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
