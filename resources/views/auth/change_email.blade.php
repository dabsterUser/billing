@extends('layouts.auth')

@section('content')
<main role="main" class="no-sidebar">
    <div class="container-fluid mt-5">
      <div class="row justify-content-center">
        <div class="col-4">
          <div class="card">
            <div class="card-header text-center">
              <h4>{{ __('Update Email') }}</h4>
            </div>
            <div class="card-body">

              <form method="POST" action="{{ route('change-email') }}" id="change-email-form">
              @csrf
                <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="" class="">Enter Email  </label>
                      <div class="controls">
                      <input type="text" name="email"  class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>

                  </div>
                  <div class="col-md-12 form-controls my-3 text-right">
                    <button type="submit" class="btn btn-primary btn-block"><i class="far fa-user"></i> Update Email</button>
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



$('#change-email-form').validate({
    errorElement: 'span',
    errorClass: 'text-danger text-right',
    rules: {
        
        email:{
          required:true,
          regex: "^[a-zA-Z0-9_.]+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}$" 
        }
    },
    messages: {
        email:{
          required:'Please enter email',
          regex:"Enter valid email"
        }
    },
    highlight: function(element) {
        $(element).closest('.form-group input').addClass('has-error border-danger');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group input').removeClass('has-error border-danger');
    },
    success: function(element) {
        $(element).closest('.form-group input').removeClass('has-error border-danger');
        $(element).closest('.form-group').children('span.help-block').remove();
    },
    errorPlacement: function(error, element) {
        error.appendTo(element.closest('.form-group'));
    },
    submitHandler: function(form) {
       $(form)[0].submit();
    }
});
</script>
@endsection
