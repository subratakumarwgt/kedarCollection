
<?php $__env->startSection('title', 'Timeline 1'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Timeline 1</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Timeline</li>
<li class="breadcrumb-item active">Timeline 1</li>
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
					<!-- cd-timeline Start-->
					<section class="cd-container" id="cd-timeline">
						<div class="cd-timeline-block">
							<div class="cd-timeline-img cd-picture bg-primary"><i class="icon-pencil-alt"></i></div>
							<div class="cd-timeline-content">
								<h4>Title of section<span> 1</span></h4>
								<p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
								<span class="cd-date">Jan <span class="counter"> 14</span></span>
							</div>
						</div>
						<div class="cd-timeline-block">
							<div class="cd-timeline-img cd-movie bg-secondary"><i class="icon-video-camera"></i></div>
							<div class="cd-timeline-content">
								<h4>Title of section<span> 2</span></h4>
								<div class="ratio ratio-21x9 m-t-20">
									<iframe src="https://www.youtube.com/embed/wpmHZspl4EM" allowfullscreen=""></iframe>
								</div>
								<span class="cd-date">Jan <span class="counter">18</span></span>
							</div>
						</div>
						<div class="cd-timeline-block">
							<div class="cd-timeline-img cd-picture bg-success"><i class="icon-image"></i></div>
							<div class="cd-timeline-content">
								<h4>Title of section<span> 3</span></h4>
								<img class="img-fluid p-t-20" src="<?php echo e(asset('assets/images/banner/1.jpg')); ?>" alt=""><span class="cd-date">Jan <span class="counter">24</span></span>
							</div>
						</div>
						<div class="cd-timeline-block">
							<div class="cd-timeline-img cd-location bg-info"><i class="icon-pulse"></i></div>
							<div class="cd-timeline-content">
								<h4>Title of section<span> 4</span></h4>
								<audio class="m-t-20" controls="">
									<source src="<?php echo e(asset('assets/audio/horse.ogg')); ?>" type="audio/ogg">
									Your browser does not support the audio element.
								</audio>
								<span class="cd-date">Feb <span class="counter">14</span></span>
							</div>
						</div>
						<div class="cd-timeline-block">
							<div class="cd-timeline-img cd-location bg-warning"><i class="icon-image"></i></div>
							<div class="cd-timeline-content">
								<h4>Title of section<span> 5</span></h4>
								<img class="img-fluid p-t-20" src="<?php echo e(asset('assets/images/banner/3.jpg')); ?>" alt=""><span class="cd-date">Feb <span class="counter">18</span></span>
							</div>
						</div>
						<div class="cd-timeline-block">
							<div class="cd-timeline-img cd-movie bg-danger"><i class="icon-pencil-alt"></i></div>
							<div class="cd-timeline-content">
								<h4>Final Section</h4>
								<p class="m-0">This is the content of the last section</p>
								<span class="cd-date">Feb <span class="counter">26</span></span>
							</div>
						</div>
					</section>
					<!-- cd-timeline Ends-->
					<!-- Container-fluid ends                    -->
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/timeline/timeline-v-1/main.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/modernizr.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/bonus-ui/timeline-v-1.blade.php ENDPATH**/ ?>