<?php $__env->startSection('content'); ?>
<main role="main" class="no-sidebar">
    <div class="container-fluid ">
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
          <div class="card">
            <div class="card-header text-center">
              <h4><?php echo e(__('Login')); ?></h4>
            </div>
            <div class="card-body">

              <form method="POST" action="<?php echo e(route('login')); ?>">
              <?php echo csrf_field(); ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="InputEmail" class=""><?php echo e(__('E-Mail Address')); ?></label>
                      <div class="controls">
                        <input type="text"  placeholder="xyz@abc.com" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>">
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
                      <label for="InputPassword" ><?php echo e(__('Password')); ?></label>
                      <div class="controls">
                        <input type="password"  class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="Enter Password here">
                            <?php $__errorArgs = ['password'];
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
                   <label class="">
                    <input type="checkbox" name="remember" value="accepted" id=""> Remember me</label>
                  </div>
                  <div class="col-md-12 form-controls my-3 text-right">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                  </div>
                  <div class="reset-password col-12">
                    <label><a href="<?php echo e(url('password/reset')); ?>">Help to reset password</a></label>
                    </div>
                  <div class="sign-up col-12">
                    <label>Don't have an account? <a href="<?php echo e(url('/register')); ?>">Create One</a></label>
                    </div>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u986104073/domains/bill.dabstersofttech.com/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>