<?php $__env->startSection('content'); ?>


<form action="<?php echo e(url('/edit-profile')); ?>" method="post" id="add-admin-form">
<?php echo csrf_field(); ?>
<div class="page-content">
    <div class="top-stickybar">
        <div class="container-fluid">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="mb-sm-0">
                    <h4>User Details</h4>
                </div>
                <div class="page-title-right">
                    <a href="<?php echo e(url('/')); ?>" class="btn btn-light mr-2">Cancel</a>
                    <button type="submit" id="submit-data" class="btn btn-secondary disabled" disabled="true" >Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid main-container">
        <div class="main-form-container">
            <div class="row mx-0">
                <div class="col-12 py-3">
                    <p class="form-heading mb-4">Below Information will be used to access Epiliam.<br>Please remember or
                        Note and keep these details at some safe place.</p>
                    <div class="form-group row mb-3">
                        <label for="" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" id="name" value="<?php echo e($user->name); ?>" class="form-control  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  placeholder="Business Name here">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <span class="invalid-feedback" role="alert">
                                  <strong><?php echo e($message); ?></strong>
                              </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="" class="col-sm-3 col-form-label">Email ID</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" id="email" value="<?php echo e($user->email); ?>" class="form-control"  placeholder="Your working Email ID">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="" class="col-sm-3 col-form-label">Phone Number</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+91</div>
                                </div>
                                <input type="number" id="phone" name="phone" value="<?php echo e($user->phone); ?>" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="You may receive OTP on this number">
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <h5 class="form-heading my-4">Change Password</h5>
                    <div class="form-group row mb-3">
                        <label for="" class="col-sm-3 col-form-label">Current Password</label>
                        <div class="col-sm-9">
                            <input type="password" id="old_password" name="old_password" class="form-control"  placeholder="Your current login password">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="" class="col-sm-3 col-form-label">New Password</label>
                        <div class="col-sm-9">
                            <input type="password" id="password"  name="password" class="form-control"  placeholder="Enter new password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
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

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password_confirmation" class="form-control"  placeholder="Exactly same as above">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
<script type="text/javascript" defer>

$(document).ready(function(){
    $('.custom-password-validation').hide();
  $('form input[type=text],form select').focus(function(){
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
    if(value !=''){
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
}else{
    status = true;
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

$('#add-admin-form').validate({
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
            required:function(element){
                return $("#old_password").val()!="";
            },

          custom_validation:'all'
        },
        old_password:{
            required:function(element){
                return $("#password").val()!="";
            },
        },
        password_confirmation:{
          required:function(element){
                return $("#password").val()!="";
            },
          equalTo : "#password"
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
        },
        password_confirmation:{
          required:"Please enter confirm password",
          equalTo : "Password and Confirm Password should be same"
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
        error.appendTo(element.closest('.form-group .col-sm-9'));
        error.appendTo(element.closest('.controls'));
    },
    submitHandler: function(form) {
       $(form)[0].submit();
    }
});


var button = $('#submit-data');
var orig = [];

$.fn.getType = function () {
    return this[0].tagName == "INPUT" ? $(this[0]).attr("type").toLowerCase() : this[0].tagName.toLowerCase();
}

$("form :input").each(function () {
    var type = $(this).getType();
    var tmp = {
        'type': type,
        'value': $(this).val()
    };
    if (type == 'radio') {
        tmp.checked = $(this).is(':checked');
    }
    orig[$(this).attr('id')] = tmp;
});

$('form').bind('change keyup', function () {

    var disable = true;
    $("form :input").each(function () {
        var type = $(this).getType();
        var id = $(this).attr('id');

        if (type == 'text' || type == 'password' || type == 'email' || type=="number" || type == 'select') {
            disable = (orig[id].value == $(this).val());
        } else if (type == 'radio') {
            disable = (orig[id].checked == $(this).is(':checked'));
        }

        if (!disable) {
            return false; // break out of loop
        }
    });

    if(disable == false){
        console.log('123');
        button.addClass('btn-primary');
        button.removeClass('btn-secondary');
    }else{
        console.log('456');
        button.removeClass('btn-primary');
        button.addClass('btn-secondary');
    }

    button.prop('disabled', disable);
});

$(document).on('keyup','#password',function(){
    
    if($('#password').val() !=''){
        $('.custom-password-validation').show();
    }else{
        $('.custom-password-validation').hide();
    }
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u284794662/domains/dabstersofttech.com/public_html/billing/resources/views/user/edit-profile.blade.php ENDPATH**/ ?>