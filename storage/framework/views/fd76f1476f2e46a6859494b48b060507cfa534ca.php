
<?php $__env->startSection('title', 'Timeline 2'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Timeline 2</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Timeline</li>
<li class="breadcrumb-item active">Timeline 2</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5>Example</h5>
				</div>
				<div class="card-body">
					<div id="timeline-2">
						<div data-year="2010">Start</div>
						<div class="active" data-year="2011">Lorem is simply dummy text of the printing and typesetting industry. the printing and typesetting industry.</div>
						<div data-year="2013">Lorem is simply dummy text of the printing and typesetting industry. </div>
						<div data-year="2014">Lorem is simply dummy text of the printing and typesetting industry.</div>
						<div data-year="2015">Lorem is simply dummy text of the printing and typesetting industry.</div>
						<div data-year="2017">Lorem is simply dummy text of the printing and typesetting industry.</div>
						<div data-year="2018">End.</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/timeline/timeline-v-2/jquery.timeliny.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/timeline/timeline-v-2/timeline-v-2-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/bonus-ui/timeline-v-2.blade.php ENDPATH**/ ?>