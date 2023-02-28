
<?php $__env->startSection('title', 'My Bookings'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb-title'); ?>
<h5>Appointment Log</h5>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Settings</li>
<li class="breadcrumb-item active">My Bookings </li>
<li class="breadcrumb-item active"><?php echo e($app_log->appointment->booking_id); ?> </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('banner'); ?>
<div class="" style="height: 200px;position:fixed;filter: blur(12px);-webkit-filter: blur(12px);"><img src="<?php echo e(asset('assets/images/bg_3-33.jpg')); ?>" alt="" style="min-width: 1000px;"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="">

				<div class=" pt-3 pb-3 row text-ark">
					
					<input type="hidden" value="<?php echo e($app_log->appointment); ?>" id="booking">
					<!-- cd-timeline Start-->
					<section class="cd-container" id="cd-timeline">
						<?php $__currentLoopData = $app_log->steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<input type="hidden" value="<?php echo e($log); ?>" class="steps">
						<div class="cd-timeline-block text-center" id="loader_<?php echo e($log->id); ?>">
							<div class="cd-timeline-content">
								<div class="spinner-border" role="status">
									<span class="sr-only">Loading...</span>
								</div>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





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
<script>
	var booking = document.getElementById("booking");
	booking = JSON.parse(booking.value);
	const step_one = (data, dataJson) => $(`<div class="cd-timeline-block" >
							<div class="cd-timeline-img cd-picture bg-${data.class}"><i class="${data.icon}"></i></div>
							<div class="cd-timeline-content border-bottom border-top border-${data.class}">
								<h5 class="text-primary  p-2">${data.section_title}</h5>
								<p class="m-0  border-bottom">Appointment ID: <strong class="badge badge-warning text-dark pull-right">ID: ${dataJson.appointment_id}</strong></p>
								<p class="m-0 border-bottom">Appointment for <strong class="pull-right small">${dataJson.appointment_for}</strong></p>

								<p class="m-0 border-bottom">Schedule date <strong class="pull-right small"> ${dataJson.schedule_date}</strong></p>
								<p class="m-0 border-bottom">Booking charge: <strong class="pull-right  text-${data.class}"><i class="fa fa-inr small"></i> ${booking.amount_paid}.00</strong></p>
								<p class="m-0  text-right border-bottom"> Recieved on:<strong class="small pull-right"> ${dataJson.recieved_on}</strong></p>
							
							</div>
						</div>`);
						const step_one_append = (data, dataJson) => $(`<div class="cd-timeline-block ">
							<div class="cd-timeline-img cd-movie bg-${data.class}"><i class="${data.icon}"></i></div>
							<div class="cd-timeline-content border-bottom border-top border-${data.class}">
								<h5 class="text-primary  p-2">${data.section_title}</h5>
								<h6 class="p-1">Your appointment is <span class="text-${data.class}"> ${data.status_name} <i class="${data.icon}"></i> .</span></h6>
								
							
										</div>
						</div>`);

	const step_two = (data, dataJson) => $(`<div class="cd-timeline-block ">
							<div class="cd-timeline-img cd-movie bg-${data.class}"><i class="${data.icon}"></i></div>
							<div class="cd-timeline-content border-bottom border-top border-${data.class}">
								<h5 class="text-primary  p-2">${data.section_title}</h5>
								<h6 class="p-1">Your appointment is <span class="text-${data.class}"> ${data.status_name} <i class="${data.icon}"></i> .</span></h6>
								
							
								 <span class="small pull-right text-secondary">${data.status_name} on-<strong>  ${dataJson.cancelled_on ?? dataJson.confirmed_on}</strong></span>
							</div>
						</div>`);

	const step_three = (data, dataJson) => {
		return $(`<div class="cd-timeline-block ">
		               <div class="cd-timeline-img cd-movie bg-${data.class} "><i class="${data.icon}"></i></div>
							<div class="cd-timeline-content border-bottom border-top border-${data.class}">
								<h5 class="text-primary  p-2">${data.section_title}</h5>
									<p class="m-0 border-bottom">Timming:  <strong class="badge badge-${data.class} pull-right"><i class="fa fa-clock-o"></i>  ${dataJson.timming}</strong></p>
									<p class="m-0 border-bottom">Doctor: <strong class="pull-right small">Dr ${dataJson.doctor}</strong></p>
								<p class="m-0 border-bottom">Centre: <strong class="pull-right small">${dataJson.centre}</strong></p>
								<p class="m-0 border-bottom">Doctor fees: <strong class="pull-right  text-${data.class}"><i class="fa fa-inr small"></i> ${dataJson.fees}.00</strong></p>
								
								<p class="m-0">Address:<p> <strong class="small border-bottom">${dataJson.address}</strong></p></p>
								<span class="cd-date"><button class="btn btn-pill btn-${data.class} btn-sm shadow-sm"><i class="fa fa-download" aria-hidden="true"></i> Reciept</button></span>
							</div>
						</div>`);

	}
	const step_four = (data, dataJson) => {
		return $(`<div class="cd-timeline-block border-bottom-${data.class}">
							<div class="cd-timeline-img cd-location bg-${data.class}"><i class="fa fa-comments-o"></i></div>
							<div class="cd-timeline-content">
								<h5 class="bg-light text-primary p-3">Get well soon! <i class="fa fa-smile-o" aria-hidden="true"></i></h5>
								<div class="form-group">
									<label>Please share your feedback</label>
									<input type="text" name="" class="form-control">
									<button class="btn btn-pill btn-outline-primary mt-3"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</button>
								</div>
								
							</div>
						</div>`)
	}

	const step_five = (data, dataJson) => {
		return $(`<div class="cd-timeline-block border-bottom-${data.class}">
							<div class="cd-timeline-img cd-location bg-${data.class}"><i class="fa fa-comments-o"></i></div>
							<div class="cd-timeline-content">
								<h5 class="bg-light text-primary p-3">Thank you for your feedback! <i class="fa fa-smile-o" aria-hidden="true"></i></h5>
								<p class="m-0 text-success text-center">${data.update_message}</strong></p>
								
							</div>
						</div>`)
	}
	var steps = document.getElementsByClassName("steps");
	const setNodes = async () => {
		await steps.forEach(element => {
			let data = JSON.parse(element.value);
			let dataJson = JSON.parse(data.section_content_json)
			var container = document.getElementById("cd-timeline");
			$("#loader_" + data.id).remove();

			switch (data.step_no) {

				case 1:

					$("#cd-timeline").append(step_one(data, dataJson));
					break;
				case 2:
					$("#cd-timeline").append(step_two(data, dataJson));

					break;
				case 3:
					$("#cd-timeline").append(step_three(data, dataJson));

					break;
					case 4:
						if (dataJson.feedback == "") {
							$("#cd-timeline").append(step_four(data, dataJson));
						}
						else{
							$("#cd-timeline").append(step_five(data, dataJson));
						}
					

					break;

				default:

					break;
			}
		})
	}

	setTimeout(() => {
		setNodes()
	}, 800);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\Projects\alliswell\Cuba\resources\views/userpanel/mybookings.blade.php ENDPATH**/ ?>