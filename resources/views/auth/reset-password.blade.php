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
              <h4>{{ __('Reset Password') }}</h4>
            </div>
            <div class="card-body">
            <form method="POST" action="{{ route('password.store') }}" id="reset-password-form">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="email" class="">{{ __('E-Mail Address') }}</label>
                                    <div class="controls">
                                        <!-- <div class="col-md-6"> -->
                                            <input id="email" type="email" placeholder="xyz@abc.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="password" class="">{{ __('Password') }}</label>

                                    <!-- <div class="col-md-6"> -->
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    <!-- </div> -->
                                </div>
                                <div class="form-group ">

                                    <div class="alert alert-warning mt-0 custom-password-validation" role="alert">
                                        <div class="row">
                                            <span class="col-6 lower-case">Lower case letter</span>
                                            <span class="col-6 upper-case">Upper case letter</span>
                                            <span class="col-6 number">Number</span>
                                            <span class="col-6 symbols">Symbol allowed @#$%^&*()+</span>
                                            <span class="col-6 min-six">Minimum 6 charachers</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group ">
                                    <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="similar to password field">
                                </div>
                            </div>

                            <div class="col-md-12 form-controls my-3 text-right">
                                <button type="submit" class="btn btn-primary">
                                {{ __('Reset Password') }}
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
<script type="text/javascript" defer>

$(document).ready(function(){
  $('.custom-password-validation').hide();
  $('form input[type=text],form input[type=number],form select').focus(function(){
    // get selected input error container
    $(this).siblings(".invalid-feedback").hide();
    $(this).siblings(".alert").hide();
    $(this).removeClass('is-invalid');
    });
});
jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z\s]+$/i.test(value);
}, "Letters only please");

jQuery.validator.addMethod(
  "regex",
  function(value, element, regexp) {
    var re = new RegExp(regexp);
    return this.optional(element) || re.test(value);
  },
  "Please check your input."
);

jQuery.validator.addMethod("exactlength", function(value, element, param) {
 return this.optional(element) || value.length == param;
}, $.validator.format("Please enter exactly {0} characters."));

var password_count = 0 ;
jQuery.validator.addMethod("custom_validation", function(value, element, param) {
    var status1 = false;
    var status2 = false;
    var status3 = false;
    var status4 = false;
    var status5 = false;
  if(value.length>5){
      $('.custom-password-validation .min-six').addClass('text-success');
      // return true;
      status1 = true;
  }else{
    $('.custom-password-validation .min-six').removeClass('text-success');
      // return true;
      status1 = false;
  }

  if(hasLowerCase(value)){
    $('.custom-password-validation .lower-case').addClass('text-success');
    status2 = true;
  }else{
    $('.custom-password-validation .lower-case').removeClass('text-success');
    status2 = false;
    // return true
  }

  if(hasUpperCase(value)){
    $('.custom-password-validation .upper-case').addClass('text-success');
    status3 = true;
  }else{
    $('.custom-password-validation .upper-case').removeClass('text-success');
    status3 = false;
  }

  if(hasSpecialSymbol(value)){
    $('.custom-password-validation .symbols').addClass('text-success');
    status4 = true;
  }else{
    $('.custom-password-validation .symbols').removeClass('text-success');
    status4 = false;
  }

  if(hasNumber(value)){
    $('.custom-password-validation .number').addClass('text-success');
    status5 = true;
  }else{
    $('.custom-password-validation .number').removeClass('text-success');
    status5 = false;
  }
  if(status1 && status2 && status3 && status4 && status5){
    return true;
  }else{
    return false
  }


}, $.validator.format(""));

function hasLowerCase(str) {
    return (/[a-z]/.test(str));
}

function hasUpperCase(str) {
    return (/[A-Z]/.test(str));
}

function hasSpecialSymbol(str){
  return (/[_\W]/).test(str);
}

function hasNumber(str){
  return (/[0-9]/).test(str);
}

$('#reset-password-form').validate({
    errorElement: 'div',
    errorClass: 'alert alert-danger',
    onkeyup: function(element) {
           $(element).valid();
    },
    rules: {

        email:{
          required:true,
          regex: "^[a-zA-Z0-9_.]+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}$"
        },
        password:{
          required:true,
          custom_validation:'all'
        },
        password_confirmation:{
          required:true,
          equalTo : "#password"
        },
    },
    messages: {

        email:{
          required:'Please enter email',
          regex:"Enter valid email"
        },
        password:{
          required:"Please enter password ",
        },
        password_confirmation:{
          required:"Please enter confirm password",
          equalTo : "Password and Confirm Password should be same"
        },
    },
    highlight: function(element) {
        $(element).closest('.form-group input').addClass('has-error border-danger');
        $(element).closest('.controls label').addClass('has-error border-danger');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group input').removeClass('has-error border-danger');
        $(element).closest('.controls label').addClass('has-error border-danger');
    },
    success: function(element) {
        $(element).closest('.form-group input').removeClass('has-error border-danger');
        $(element).closest('.form-group').children('span.help-block').remove();
    },
    errorPlacement: function(error, element) {
        error.appendTo(element.closest('.form-group'));
        error.appendTo(element.closest('.controls'));
    },
    submitHandler: function(form) {
       $(form)[0].submit();
    }
});

$(document).on('keyup','#password',function(){

    if($('#password').val() !=''){
        $('.custom-password-validation').show();
    }else{
        $('.custom-password-validation').hide();
    }
});
</script>

@endsection
