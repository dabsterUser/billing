@extends('layouts.auth')

@section('content')

<main role="main" class="no-sidebar">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-8 login-banner d-flex align-items-center justify-content-center min-vh-100 bg-dark flex-column">
          <div class="text-center text-white position-relative mt-auto">
            <a class=" text-white" href="#"><img src="{{ asset('public/images/logo-w.svg')}}"></a>
            <h5 class="my-3">A Powerful, Yet Free Invoicing Platform <br>
                For Your Business, Build with Trust.</h5>
            <a class=" text-white" href="#"><i class="fa fa-caret-left" aria-hidden="true"></i> Back to epiliam</a>
          </div>
         <label class="mt-auto position-relative text-white">Copyright © 2021 Bills. All rights reserved.</label>
        </div>
        <div class="col-4 bg-white d-flex align-items-center min-vh-100 px-5">
            <div class="verify-body mt-5">

             <h4 class="mb-5">{{ __('Bank Details') }}</h4>
             <form method="POST" action="{{ route('save-bank-details') }}">
              @csrf
              <input type="hidden" name="user_id" value="{{$user->id}}">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputEmail" class="">{{ __('Your Bank Name') }}</label>
                      <div class="controls">
                        <input type="text"  placeholder="Your Bank Name" class="form-control " name="bank_name" >
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputEmail" class="">{{ __('Account Holder Name') }}</label>
                      <div class="controls">
                        <input type="text"  placeholder="Account Holder Name" class="form-control " name="account_name" >
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputEmail" class="">{{ __('Enter Bank IFSC Code') }}</label>
                      <div class="controls">
                        <input type="text"  placeholder="Enter Bank IFSC Code" class="form-control " name="bank_ifsc" >
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                  </div>

                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="InputEmail" class="">{{ __('Enter Account Number') }}</label>
                        <div class="controls">
                            <input type="text"  placeholder="Enter Account Number" class="form-control " name="bank_account_number" >
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="InputEmail" class="">{{ __('Enter Bank Branch Name') }}</label>
                        <div class="controls">
                            <input type="text"  placeholder="Enter Bank Branch Name" class="form-control " name="bank_branch_name" >
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="InputEmail" class="">{{ __('Enter UPI Id (If Any)') }}</label>
                        <div class="controls">
                            <input type="text"  placeholder="Enter UPI Id" class="form-control " name="bank_upi_id" >
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                    </div>

                  <div class="row w-100">
                    <div class="col-md-6 form-controls my-3">
                      <a href="{{ route('home') }}" class="btn btn-light mr-2">Skip</a>
                    </div>
                    <div class="col-md-6 form-controls my-3 text-right">
                      <button type="submit" class="btn btn-primary btn-block"><i class="far fa-user"></i> Save </button>
                    </div>
  
                  </div>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </main>
<script>
$(document).ready(function(){
  $('form input[type=text],form select').focus(function(){
    // get selected input error container
    $(this).siblings(".invalid-feedback").hide();
    $(this).removeClass('is-invalid');
    });
});
</script>

@endsection
