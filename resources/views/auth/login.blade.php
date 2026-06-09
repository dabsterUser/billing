@extends('layouts.auth')

@section('content')
<main role="main" class="no-sidebar">
    <div class="container-fluid ">
      <div class="row justify-content-center">
      <div class="col-8 login-banner d-flex align-items-center justify-content-center min-vh-100 bg-dark flex-column">
          <div class="text-center text-white position-relative mt-auto">
            <a class=" text-white" href="#"><img src="{{ asset('images/logo-w.svg')}}"></a>
            <h5 class="my-3">A Powerful, Yet Free Invoicing Platform <br>
                For Your Business, Build with Trust.</h5>
            <a class=" text-white" href="#"><i class="fa fa-caret-left" aria-hidden="true"></i> Back to epiliam</a>
          </div>
         <label class="mt-auto position-relative text-white">Copyright © 2021 Bills. All rights reserved.</label>
        </div>
        <div class="col-4 bg-white d-flex align-items-center min-vh-100 px-5">
          <div class="card">
            <div class="card-header text-center">
              <h4>{{ __('Login') }}</h4>
            </div>
            <div class="card-body">

              <form method="POST" action="{{ route('login') }}">
              @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputEmail" class="">{{ __('E-Mail Address') }}</label>
                      <div class="controls">
                        <input type="text"  placeholder="xyz@abc.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputPassword" >{{ __('Password') }}</label>
                      <div class="controls">
                        <input type="password"  class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password here">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>

                  </div>
                  <div class="col-md-12">
                   <label class="">
                    <input type="checkbox" name="remember" value="accepted" id=""> Remember me</label>
                  </div>
                  <div class="col-md-12 form-controls my-3 text-right">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                  </div>
                  <div class="reset-password col-12">
                    <label><a href="{{ url('password/reset')}}">Help to reset password</a></label>
                    </div>
                  <div class="sign-up col-12">
                    <label>Don't have an account? <a href="{{url('/register')}}">Create One</a></label>
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
