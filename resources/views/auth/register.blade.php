@extends('layouts.auth')

@section('content')
<div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-5 login-banner d-flex align-items-center justify-content-center min-vh-100 bg-dark flex-column">
          <div class="text-center text-white position-relative mt-auto">
          <a class=" text-white" href="#"><img src="{{ asset('public/images/logo-w.svg')}}"></a>
            <h5 class="my-3">A Powerful, Yet Free Invoicing Platform <br>
                For Your Business, Build with Trust.</h5>
            <a class=" text-white" href="#"><i class="fa fa-caret-left" aria-hidden="true"></i> Back to epiliam</a>
          </div>
         <label class="mt-auto position-relative text-white">Copyright © 2021 Bills. All rights reserved.</label>
        </div>
        <div class="col-7 bg-white d-flex align-items-center min-vh-100 px-5">
            <div class="register-body">
              <h4 class="mb-5">Create Your Free Account</h4>
              <form method="POST" id="user-register-form" action="{{ route('register') }}">
              @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="InputName" class="">Full Name</label>
                      <div class="controls">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"  placeholder="Full Name" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                        @error('name')
                            <div class="alert alert-warning" role="alert">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6 form-group"></div>
                    <div class="col-md-6 form-group">
                      <label for="" class="">{{ __('Email address') }}</label>
                      <div class="controls">
                        <input  type="text" class="form-control @error('email') is-invalid @enderror" placeholder="@example.com" name="email" value="{{ old('email') }}"  autocomplete="email">

                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                  {{ $message }}
                                </div>
                            @enderror

                      </div>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="" class="">Mobile number</label>
                      <div class="controls">
                        <input type="number" class="form-control @error('phone') is-invalid @enderror"  placeholder="OTP will send on this number" name="phone" id="phone" value="{{ old('phone') }}"  autocomplete="phone">
                          @error('phone')
                            <div class="alert alert-danger" role="alert">
                              {{ $message }}
                            </div>
                            @enderror
                      </div>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="" class="">Password</label>
                      <div class="controls">
                      <input id="password" type="password" class="form-control"  placeholder="Enter password" name="password"  autocomplete="new-password">


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

                    <div class="col-md-6 form-group">
                      <label for="" class="">Confirm Password</label>
                      <div class="controls">
                      <input id="password-confirm" type="password" class="form-control"  placeholder="similar to password field"  name="password_confirmation"  autocomplete="new-password">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <!-- <label class="">Terms & Condition</label> -->
                      <div class="controls">
                        <label class="@error('term_condition') is-invalid @enderror"><input type="checkbox" name="term_condition" {{old('term_condition') == 'accepted' ?'checked':''}} value="accepted" id="" > I agree to <a href="#"> Terms & condition</a> and <a href="#"> Privacy policy</a>  </label>
                        @error('term_condition')
                            <div class="alert alert-danger" role="alert">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6 form-controls my-3">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
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


jQuery.validator.addMethod("custom_validation", function(value, element, param) {
    var status = false;
  if(value.length>5){
      $('.custom-password-validation .min-six').addClass('text-success');
      // return true;
      status = true;
  }else{
    $('.custom-password-validation .min-six').removeClass('text-success');
      // return true;
      status = false;
  }

  if(hasLowerCase(value)){
    $('.custom-password-validation .lower-case').addClass('text-success');
    status = true;
  }else{
    $('.custom-password-validation .lower-case').removeClass('text-success');
    status = false;
    // return true
  }

  if(hasUpperCase(value)){
    $('.custom-password-validation .upper-case').addClass('text-success');
    status = true;
  }else{
    $('.custom-password-validation .upper-case').removeClass('text-success');
    status = false;
    // return true
  }

  if(hasSpecialSymbol(value)){
    $('.custom-password-validation .symbols').addClass('text-success');
    status = true;
  }else{
    $('.custom-password-validation .symbols').removeClass('text-success');
    status = false;
    // return true
  }

  if(hasNumber(value)){
    $('.custom-password-validation .number').addClass('text-success');
    status = true;
  }else{
    $('.custom-password-validation .number').removeClass('text-success');
    status = false;
    // return true;
  }
  return status;



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

$('#user-register-form').validate({
    errorElement: 'div',
    errorClass: 'alert alert-danger',
    onkeyup: function(element) {
           $(element).valid();
    },
    rules: {
          name: {
            required: true,
            lettersonly:true
        },
        email:{
          required:true,
          regex: "^[a-zA-Z0-9_.]+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}$"
        },
        phone:{
          required:true,
          digits:true,
          exactlength: 10
        },
        password:{
          required:true,
          custom_validation:'all'
          // regex:"^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$"

        },
        password_confirmation:{
          required:true,
          // regex:"^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$",
          equalTo : "#password"
        },
        term_condition:{
          required:true
        }
    },
    messages: {
        name: {
            required: 'Please enter full name',
            lettersonly:'Name should be only characters'
        },
        email:{
          required:'Please enter email',
          regex:"Enter valid email"
        },
        phone:{
          required:"Please enter mobile number",
          digits:true,
          exactlength: "Please enter 10 digits"
        },
        password:{
          required:"Please enter password ",
          // regex:"Password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character."
        },
        password_confirmation:{
          required:"Please enter confirm password",
          // regex:"Password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.",
          equalTo : "Password and Confirm Password should be same"
        },
        term_condition:{
          required:"Please check terms & condition"
        }
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

$(document).ready(function(){
			$('[data-toggle="popover"]').popover({html:true});

		});
    $('form input[type=text]').focus(function(){
    // get selected input error container
    $(this).siblings(".invalid-feedback").hide();
    $(this).removeClass('is-invalid');
    });

    var mobileInput = document.getElementById("phone")
    mobileInput.addEventListener("keydown", function(e) {
  // prevent: "e", "=", ",", "-", "."
      if ([69, 187, 188, 189, 190].includes(e.keyCode)) {
        e.preventDefault();
      }


    });

    $('#phone').on('keydown',function(e){

        var length = $(this).val().length;
        if(length > 9){
          if ([8,46].includes(e.keyCode) == false) {
            e.preventDefault();
          }
        }
      });


    </script>
@endsection
