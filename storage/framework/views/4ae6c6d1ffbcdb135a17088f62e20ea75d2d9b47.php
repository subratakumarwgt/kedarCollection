
<?php $__env->startSection('title'); ?>
<title><?php echo e(Config::get('settings.brand.brand_name')); ?> | Register</title>

<?php $__env->startSection('css'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="container-fluid">
   
   <div class="row" >
  
      <!-- <div class="col-xl-7 order-1"><img class="bg-img-cover bg-center" src="/images/banner.webp" alt="looginpage" width="500px"></div> -->
      <div class="col-xl-12 p-0 ">
     
         <div class="login-card "  style="background:url('/images/banner.webp')">
        
            <div>
               <!-- <div class="bg-dark text-center"><a class="logo text-start" href="<?php echo e(route('auth-login')); ?>"><img class="img-fluid for-light" width="100px" src="<?php echo e(asset('/images/logosmall.png')); ?>" alt="looginpage"><img class="img-fluid for-dark" src="<?php echo e(asset('assets/images/logo/logo_dark.png')); ?>" alt="looginpage"></a></div> -->
               <div class="login-main shadow text-white" style="background:rgba(0,0,0,0.7)">
               <div class="row justify-content-center">
                  <img src="/images/logosmall.png" alt="" width="60px" style="width: 100px;">
               </div>
                  <form class="theme-form needs-validation" novalidate="" method="post" action="<?php echo e(route('auth-login')); ?>">
                     <?php echo csrf_field(); ?>
                   
                     <!-- <h6 class="h5 text-gray">Enter your Contact & Password to login</h6> -->
                     <?php if(Session::has('error')): ?>
                     <div class="row p-2 justify-content-center">
                           <div class="alert-danger col-md-6 alert"><?php echo e(Session::get('error')); ?></div>
                     </div>
                     <?php endif; ?>
                                    <div class="form-group">
                        <label class="col-form-label">Full name</label>
                        <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus placeholder="Enter Your Full name">

                        <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback text-danger" role="alert">
                           <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Contact No</label>
                        <input id="contact" type="text" class="form-control <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="contact" value="<?php echo e(old('contact')); ?>" required autocomplete="contact" autofocus placeholder="Enter Your Mobile Number">

                        <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback text-danger" role="alert">
                           <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                     </div>
                     <?php if(isset($_GET['redirect_url'])): ?>
                     <input type="hidden" name="redirect_url" value="<?php echo e($_GET['redirect_url']); ?>" />
                     <?php endif; ?>
                     <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password" placeholder="Enter Your Password">

                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback text-danger" role="alert">
                           <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="show-hide"><span class="show"> </span></div>
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Confirm Password</label>
                        <input id="password_confirmation" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password_confirmation" required autocomplete="current-password" placeholder="Enter Your Password">

                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback text-danger" role="alert">
                           <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="show-hide"><span class="show"> </span></div>
                     </div>
                     <div class="form-group ">
                        <div class="checkbox p-0">
                           <input id="checkbox1" type="checkbox">
                           <label class="text-muted" for="checkbox1">Remember password</label>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-arrow-right"></i> Sign up</button>
                     </div>
                     <div class="form-group ">
                     <button class="btn btn-outline-light text-white btn-block" type="button"><i class="fa fa-google"></i> Sign up with Google</button>
                     </div>
                     <div class="form-group ">
                     <button class="btn btn-outline-light text-white btn-block" type="button"><i class="fa fa-facebook"></i> Sign up with Facebook</button>
                     </div>
                     <!-- <h6 class="text-muted mt-4 or">Or Sign in with</h6>
                     <div class="social mt-4">
                        <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div>
                     </div> -->
                     <p class="mt-4 mb-0">Already have an account?<a class="ms-2" href="<?php echo e(route('login')); ?>">Sign in </a></p>
                     <script>
                        (function() {
                           'use strict';
                           window.addEventListener('load', function() {
                              // Fetch all the forms we want to apply custom Bootstrap validation styles to
                              var forms = document.getElementsByClassName('needs-validation');
                              // Loop over them and prevent submission
                              var validation = Array.prototype.filter.call(forms, function(form) {
                                 form.addEventListener('submit', function(event) {
                                    if (form.checkValidity() === false) {
                                       event.preventDefault();
                                       event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                 }, false);
                              });
                           }, false);
                        })();
                     </script>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userpanel.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/userpanel/register.blade.php ENDPATH**/ ?>