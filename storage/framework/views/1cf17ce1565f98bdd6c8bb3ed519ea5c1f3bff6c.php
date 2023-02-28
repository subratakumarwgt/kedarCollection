
<?php $__env->startSection('title', 'All is Well | Register'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid p-0">
  <div class="row m-0">
    <div class="col-xl-7 p-0"><img class="bg-img-cover bg-center" src="<?php echo e(asset('assets/images/login/1.jpg')); ?>" alt="looginpage"></div>
    <div class="col-xl-5 p-0">
      <div class="login-card">
        <div>
          <div><a class="logo" href="<?php echo e(route('index')); ?>"><img class="img-fluid for-light" src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt="looginpage"><img class="img-fluid for-dark" src="<?php echo e(asset('assets/images/logo/logo_dark.png')); ?>" alt="looginpage"></a></div>
          <div class="login-main">
            <form class="theme-form">
              <h4>Create your account</h4>
              <p>Enter your personal details to create account</p>
              <div class="form-group">
                <label class="col-form-label pt-0">Your Name</label>
                <div class="row g-2">
                  <div class="col-6">
                    <input class="form-control" type="text" required="" placeholder="First name">
                  </div>
                  <div class="col-6">
                    <input class="form-control" type="text" required="" placeholder="Last name">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-form-label">Contact</label>
                <input class="form-control" type="number" required="" placeholder="9090909090m">
              </div>
              <div class="form-group">
                <label class="col-form-label">PIN Code</label>
                <input class="form-control" type="number" name="pin_code" required="" minlength="6" placeholder="736101">
                
              </div>
              <div class="form-group">
                <label class="col-form-label">Password</label>
                <input class="form-control" type="password" name="password" required="" placeholder="*********">
                <div class="show-hide"><span class="show"></span></div>
              </div>
              <div class="form-group">
                <label class="col-form-label"> Confirm Password</label>
                <input class="form-control" type="password" name="password_confirmation" required="" placeholder="*********">
                <div class="show-hide"><span class="show"></span></div>
              </div>
          
              <div class="form-group mb-0">
                <div class="checkbox p-0">
                  <input id="checkbox1" type="checkbox">
                  <label class="text-muted" for="checkbox1">Agree with<a class="ms-2" href="#">Privacy Policy</a></label>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Create Account</button>
              </div>
             
              <p class="mt-4 mb-0">Already have an account?<a class="ms-2" href="<?php echo e(route('login')); ?>">Sign in</a></p>
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
<?php echo $__env->make('userpanel.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\rollswallah\resources\views/userpanel/register.blade.php ENDPATH**/ ?>