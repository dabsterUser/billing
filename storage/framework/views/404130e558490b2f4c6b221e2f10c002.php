

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

             <h4 class="mb-5"><?php echo e(__('Organization Details')); ?></h4>
             <form method="POST" action="<?php echo e(route('save-organization')); ?>">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputEmail" class=""><?php echo e(__('Your Company Name')); ?></label>
                      <div class="controls">
                        <input type="text"  placeholder="Your Company Name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>">
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
                      <label for="InputEmail" class=""><?php echo e(__('Your Company Email')); ?></label>
                      <div class="controls">
                        <input type="text"  placeholder="Your Company Email" class="form-control " name="email" value="<?php echo e(old('email')); ?>">
                        <?php $__errorArgs = ['email'];
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
                      <label for="InputEmail" class=""><?php echo e(__('Your Company Type')); ?></label>
                      <div class="controls">
                      <select class="form-control <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" name="type" >
                          <option value="0" >Your Company Type</option>
                          <option value="1" <?php echo e('1' == old('type') ? 'selected':''); ?>>Proprietorship</option>
                          <option value="2" <?php echo e('2' == old('type') ? 'selected':''); ?>>Partnership</option>
                          <option value="3" <?php echo e('3' == old('type') ? 'selected':''); ?>>Hindu Undivided Family</option>
                          <option value="4" <?php echo e('4' == old('type') ? 'selected':''); ?>>Private Limited Company</option>
                          <option value="5" <?php echo e('5' == old('type') ? 'selected':''); ?>>Public Limited Company</option>
                          <option value="6" <?php echo e('6' == old('type') ? 'selected':''); ?>>Society/ Club/ Trust/ AOP</option>
                          <option value="7" <?php echo e('7' == old('type') ? 'selected':''); ?>>Government Department</option>
                          <option value="8" <?php echo e('8' == old('type') ? 'selected':''); ?>>Public Sector Undertaking</option>
                          <option value="9" <?php echo e('9' == old('type') ? 'selected':''); ?>>Unlimited Company</option>
                          <option value="10" <?php echo e('10' == old('type') ? 'selected':''); ?>>Limited Liability Partnership</option>
                          <option value="11" <?php echo e('11' == old('type') ? 'selected':''); ?>>Local Authority</option>
                          <option value="12" <?php echo e('12' == old('type') ? 'selected':''); ?>>Statutory Body</option>
                          <option value="13" <?php echo e('13' == old('type') ? 'selected':''); ?>>Foreign Company</option>
                          <option value="14" <?php echo e('14' == old('type') ? 'selected':''); ?>>Foreign Limited Liability Partnership</option>
                          <option value="15" <?php echo e('15' == old('type') ? 'selected':''); ?>>Others</option>
                        </select>
                        <?php $__errorArgs = ['type'];
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
                      <label for="InputEmail" class=""><?php echo e(__('GSTIN')); ?></label>
                      <div class="controls">
                        <input type="text"  placeholder="Enter your GSTIN number" class="form-control <?php $__errorArgs = ['gstin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="gstin" value="<?php echo e(old('gstin')); ?>">
                        <?php $__errorArgs = ['gstin'];
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
                      <label for="InputEmail" class=""><?php echo e(__('Address Line 1')); ?></label>
                      <div class="controls">
                        <input type="text"  placeholder="Enter your building number & name" class="form-control <?php $__errorArgs = ['address1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="address1" value="<?php echo e(old('address1')); ?>">
                        <?php $__errorArgs = ['address1'];
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
                      <label for="InputEmail" class=""><?php echo e(__('Address Line 2')); ?></label>
                      <div class="controls">
                        <input type="text"  placeholder="Enter near by location & area name" class="form-control " name="address2" value="<?php echo e(old('address2')); ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputEmail" class=""><?php echo e(__('State')); ?></label>
                      <div class="controls">
                      <select class="form-control  <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" name="state_id">
                        <option value="0">Select State</option>
                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($state->id); ?>"  <?php echo e($state->id == old('state_id') ? 'selected':''); ?>><?php echo e($state->name); ?> (<?php echo e($state->state_code); ?>)</option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      <?php $__errorArgs = ['state_id'];
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
                        <!-- <input type="text"  placeholder="Enter OTP" class="form-control <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="state_id" value="<?php echo e(old('state_id')); ?>">
                        <?php $__errorArgs = ['state_id'];
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
unset($__errorArgs, $__bag); ?> -->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputEmail" class=""><?php echo e(__('Enter Your City')); ?></label>
                      <div class="controls">
                        <input type="text"  placeholder="Enter Your City" class="form-control <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="city" value="<?php echo e(old('city')); ?>">
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
                      <label for="InputEmail" class=""><?php echo e(__('Enter Your Pincode')); ?></label>
                      <div class="controls">
                        <input type="text"  placeholder="Enter Your Pincode" class="form-control <?php $__errorArgs = ['pincode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="pincode" value="<?php echo e(old('pincode')); ?>">
                        <?php $__errorArgs = ['pincode'];
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u284794662/domains/dabstersofttech.com/public_html/billing/resources/views/auth/signup_organization.blade.php ENDPATH**/ ?>