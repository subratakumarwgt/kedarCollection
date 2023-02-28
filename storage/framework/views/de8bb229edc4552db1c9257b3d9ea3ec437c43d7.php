
<?php $__env->startSection('title', 'My Bookings'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-7">
         <h3 class="text-danger h3"> Access denied. You don't have permission to view this page</h3>
         <p> <a href="/">Get back to Home Page</a></p>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
	$(".detailsBtn").on('click',function(){
		var id = $(this).data('id')
		window.open('/my-bookings/'+id,'_self')
	})
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('userpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\rollswallah\resources\views/userpanel/access-denied.blade.php ENDPATH**/ ?>