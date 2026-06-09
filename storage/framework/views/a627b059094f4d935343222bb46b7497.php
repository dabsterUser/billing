<?php $__env->startSection('content'); ?>

<main role="main" class="no-sidebar">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-8 login-banner d-flex align-items-center justify-content-center min-vh-100 bg-dark flex-column">
          <div class="text-center text-white position-relative mt-auto">
            <a class=" text-white" href="#"><img src="<?php echo e(asset('public/images/logo-w.svg')); ?>"></a>
            <h5 class="my-3">A Powerful, Yet Free Invoicing Platform <br>
                For Your Business, Build with Trust.</h5>
            <a class=" text-white" href="#"><i class="fa fa-caret-left" aria-hidden="true"></i> Back to epiliam</a>
          </div>
         <label class="mt-auto position-relative text-white">Copyright © 2021 Bills. All rights reserved.</label>
        </div>
        <div class="col-4 bg-white d-flex align-items-center min-vh-100 px-5">
            <div class="verify-body mt-5">

             <h4 class="mb-5"><?php echo e(__('Bank Details')); ?></h4>
             <form method="POST" action="<?php echo e(route('save-bank-details')); ?>">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputEmail" class=""><?php echo e(__('Your Bank Name')); ?></label>
                      <div class="controls">
                        <input type="text"  placeholder="Your Bank Name" class="form-control " name="bank_name" >
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
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputEmail" class=""><?php echo e(__('Account Holder Name')); ?></label>
                      <div class="controls">
                        <input type="text"  placeholder="Account Holder Name" class="form-control " name="account_name" >
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
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputEmail" class=""><?php echo e(__('Enter Bank IFSC Code')); ?></label>
                      <div class="controls">
                        <input type="text"  placeholder="Enter Bank IFSC Code" class="form-control " name="bank_ifsc" >
                        <?php $__errorArgs = ['city'];
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

                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="InputEmail" class=""><?php echo e(__('Enter Account Number')); ?></label>
                        <div class="controls">
                            <input type="text"  placeholder="Enter Account Number" class="form-control " name="bank_account_number" >
                            <?php $__errorArgs = ['city'];
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

                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="InputEmail" class=""><?php echo e(__('Enter Bank Branch Name')); ?></label>
                        <div class="controls">
                            <input type="text"  placeholder="Enter Bank Branch Name" class="form-control " name="bank_branch_name" >
                            <?php $__errorArgs = ['city'];
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

                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="InputEmail" class=""><?php echo e(__('Enter UPI Id (If Any)')); ?></label>
                        <div class="controls">
                            <input type="text"  placeholder="Enter UPI Id" class="form-control " name="bank_upi_id" >
                            <?php $__errorArgs = ['city'];
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

                  <div class="row w-100">
                    <div class="col-md-6 form-controls my-3">
                      <a href="<?php echo e(route('home')); ?>" class="btn btn-light mr-2">Skip</a>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u284794662/domains/dabstersofttech.com/public_html/billing/resources/views/auth/user-bank-details.blade.php ENDPATH**/ ?>