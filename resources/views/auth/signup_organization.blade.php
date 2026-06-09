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

             <h4 class="mb-5">{{ __('Organization Details') }}</h4>
             <form method="POST" action="{{ route('save-organization') }}">
              @csrf
              <input type="hidden" name="user_id" value="{{$user->id}}">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputEmail" class="">{{ __('Your Company Name') }}</label>
                      <div class="controls">
                        <input type="text"  placeholder="Your Company Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
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
                      <label for="InputEmail" class="">{{ __('Your Company Email') }}</label>
                      <div class="controls">
                        <input type="text"  placeholder="Your Company Email" class="form-control " name="email" value="{{ old('email') }}">
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
                      <label for="InputEmail" class="">{{ __('Your Company Type') }}</label>
                      <div class="controls">
                      <select class="form-control @error('type') is-invalid @enderror" id="" name="type" >
                          <option value="0" >Your Company Type</option>
                          <option value="1" {{ '1' == old('type') ? 'selected':'' }}>Proprietorship</option>
                          <option value="2" {{ '2' == old('type') ? 'selected':'' }}>Partnership</option>
                          <option value="3" {{ '3' == old('type') ? 'selected':'' }}>Hindu Undivided Family</option>
                          <option value="4" {{ '4' == old('type') ? 'selected':'' }}>Private Limited Company</option>
                          <option value="5" {{ '5' == old('type') ? 'selected':'' }}>Public Limited Company</option>
                          <option value="6" {{ '6' == old('type') ? 'selected':'' }}>Society/ Club/ Trust/ AOP</option>
                          <option value="7" {{ '7' == old('type') ? 'selected':'' }}>Government Department</option>
                          <option value="8" {{ '8' == old('type') ? 'selected':'' }}>Public Sector Undertaking</option>
                          <option value="9" {{ '9' == old('type') ? 'selected':'' }}>Unlimited Company</option>
                          <option value="10" {{ '10' == old('type') ? 'selected':'' }}>Limited Liability Partnership</option>
                          <option value="11" {{ '11' == old('type') ? 'selected':'' }}>Local Authority</option>
                          <option value="12" {{ '12' == old('type') ? 'selected':'' }}>Statutory Body</option>
                          <option value="13" {{ '13' == old('type') ? 'selected':'' }}>Foreign Company</option>
                          <option value="14" {{ '14' == old('type') ? 'selected':'' }}>Foreign Limited Liability Partnership</option>
                          <option value="15" {{ '15' == old('type') ? 'selected':'' }}>Others</option>
                        </select>
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputEmail" class="">{{ __('GSTIN') }}</label>
                      <div class="controls">
                        <input type="text"  placeholder="Enter your GSTIN number" class="form-control @error('gstin') is-invalid @enderror" name="gstin" value="{{ old('gstin') }}">
                        @error('gstin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputEmail" class="">{{ __('Address Line 1') }}</label>
                      <div class="controls">
                        <input type="text"  placeholder="Enter your building number & name" class="form-control @error('address1') is-invalid @enderror" name="address1" value="{{ old('address1') }}">
                        @error('address1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputEmail" class="">{{ __('Address Line 2') }}</label>
                      <div class="controls">
                        <input type="text"  placeholder="Enter near by location & area name" class="form-control " name="address2" value="{{ old('address2') }}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputEmail" class="">{{ __('State') }}</label>
                      <div class="controls">
                      <select class="form-control  @error('state_id') is-invalid @enderror" id="" name="state_id">
                        <option value="0">Select State</option>
                        @foreach($states as $state)
                        <option value="{{$state->id}}"  {{ $state->id == old('state_id') ? 'selected':'' }}>{{$state->name}} ({{$state->state_code}})</option>
                        @endforeach
                      </select>
                      @error('state_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <!-- <input type="text"  placeholder="Enter OTP" class="form-control @error('state_id') is-invalid @enderror" name="state_id" value="{{ old('state_id') }}">
                        @error('state_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror -->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputEmail" class="">{{ __('Enter Your City') }}</label>
                      <div class="controls">
                        <input type="text"  placeholder="Enter Your City" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}">
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
                      <label for="InputEmail" class="">{{ __('Enter Your Pincode') }}</label>
                      <div class="controls">
                        <input type="text"  placeholder="Enter Your Pincode" class="form-control @error('pincode') is-invalid @enderror" name="pincode" value="{{ old('pincode') }}">
                        @error('pincode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 form-controls my-3 text-right">
                    <button type="submit" class="btn btn-primary btn-block"><i class="far fa-user"></i> Next </button>
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
