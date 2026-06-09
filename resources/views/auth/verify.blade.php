@extends('layouts.auth')

@section('content')
<main role="main" class="no-sidebar">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-7 login-banner d-flex align-items-center justify-content-center min-vh-100 bg-dark flex-column">
          <div class="text-center text-white position-relative mt-auto">
            <a class=" text-white" href="#"><img src="{{ asset('public/images/logo-w.svg')}}"></a>
            <h5 class="my-3">A Powerful, Yet Free Invoicing Platform <br>
                For Your Business, Build with Trust.</h5>
            <a class=" text-white" href="#"><i class="fa fa-caret-left" aria-hidden="true"></i> Back to epiliam</a>
          </div>
         <label class="mt-auto position-relative text-white">Copyright © 2021 Bills. All rights reserved.</label>
        </div>
        <div class="col-5 bg-white d-flex align-items-center min-vh-100 px-5">
            <div class="verify-body">
             <!-- <a class="mb-4 d-block" href="{{ url('/login') }}"><i class="fa fa-caret-left" aria-hidden="true"></i> Back to login</a> -->
              <h2 class="mb-5 font-weight-bolder">{{ __('Verify Email') }}</h2>
              <form method="POST" action="{{ route('verify') }}">
              @csrf
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                    <label for="" class="">Email Verification code is sent to <span class="text-success">"{{$user->email}}"</span> | <br/><a href="{{url('/change-email')}}" class="change-email"> Change email ID</a> </label>
                    </div>
                   
                  </div>
                  <input type="hidden" name="user_id" value="{{$user->id}}">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputEmail" class="">Enter the 6-digit Email verification Code we just sent you on email address you just provided on previous page</label>
                      <div class="controls">
                        <input type="text"  placeholder="Type your 6-digit Code here" class="form-control @error('otp') is-invalid @enderror" id="otp" name="otp" value="{{ old('otp') }}">
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif                    
                        @error('otp')
                            <div class="alert alert-danger" role="alert">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-12 form-controls my-3 text-right">
                    <button type="submit" class="btn btn-primary btn-block">Verify</button>
                  </div>
                  <div class="timer text-center font-weight-bold col-12">
                    
                  </div>
                  <div class="resend-container col-12 text-left d-none">
                      <label>
                    Didn't receive the Verification Code in email? <a href="{{ route('resend-otp')}}" class="resend_otp">Send again</a></label></div>
                    <div class="col-12">
                      <span class="dotted-hr">...</span>
                    </div>
                    <div class="sign-up col-12">
                      <label>Already have an account?
                        <a href="{{url('/login')}}">Login</a></label>
                    </div>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </main>

<script>

// $('.resend_otp').on('click',function(){
//   $.ajax({
//         url:"{{url('/')}}"+'/resend_otp',
//         method:'GET',
//         data:{'id':'{{$user->id}}'},
//         success:function(data){
//             if (data == '1') {
//                 swal.fire('Otp sent to email Successfully');
//             } else {
//               swal.fire('Something Went Wrong.Try Again Later');
//             }
//         }
//     });
// });

$(document).ready(function(){
 
  var timeLeft = 15;
    var elem = $('.timer');
    
    var timerId = setInterval(countdown, 1000);
    
    function countdown() {
      if (timeLeft == -1) {
        // console.log('12');
        clearTimeout(timerId);
        $('.resend-container').removeClass('d-none');
        $('.timer').addClass('d-none');
      } else {
        // console.log('123');
        elem.html(timeLeft + ' seconds to Resend OTP ');
        timeLeft--;
      }
    }

    var mobileInput = document.getElementById("otp")
    mobileInput.addEventListener("keydown", function(e) {
      if ([32].includes(e.keyCode)) {
        e.preventDefault();
      }
    });
  
});


</script>
@endsection
