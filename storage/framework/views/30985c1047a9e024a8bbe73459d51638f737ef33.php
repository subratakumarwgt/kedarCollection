
<?php $__env->startSection('title', 'To-Do'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/todo.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>To-Do</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Apps</li>
<li class="breadcrumb-item active">To-Do</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header">
					<h5>To-Do</h5>
				</div>
				<div class="card-body">
					<div class="todo">
						<div class="todo-list-wrapper">
							<div class="todo-list-container">
								<div class="mark-all-tasks">
									<div class="mark-all-tasks-container"><span class="mark-all-btn" id="mark-all-finished" role="button"><span class="btn-label">Mark all as finished</span><span class="action-box completed"><i class="icon"><i class="icon-check"></i></i></span></span><span class="mark-all-btn move-down" id="mark-all-incomplete" role="button"><span class="btn-label">Mark all as Incomplete</span><span class="action-box"><i class="icon"><i class="icon-check"></i></i></span></span></div>
								</div>
								<div class="todo-list-body">
									<ul id="todo-list">
										<li class="task">
											<div class="task-container">
												<h4 class="task-label">Weekly Bigbazar Shopping </h4>
												<span class="task-action-btn"><span class="action-box large delete-btn" title="Delete Task"><i class="icon"><i class="icon-trash"></i></i></span><span class="action-box large complete-btn" title="Mark Complete"><i class="icon"><i class="icon-check"></i></i></span></span>
											</div>
										</li>
										<li class="task">
											<div class="task-container">
												<h4 class="task-label">Go Outside Picnic on Sunday</h4>
												<span class="task-action-btn"><span class="action-box large delete-btn" title="Delete Task"><i class="icon"><i class="icon-trash"></i></i></span><span class="action-box large complete-btn" title="Mark Complete"><i class="icon"><i class="icon-check"></i></i></span></span>
											</div>
										</li>
										<li class="completed task">
											<div class="task-container">
												<h4 class="task-label">Write a blog post </h4>
												<span class="task-action-btn"><span class="action-box large delete-btn" title="Delete Task"><i class="icon"><i class="icon-trash"></i></i></span><span class="action-box large complete-btn" title="Mark Complete"><i class="icon"><i class="icon-check"></i></i></span></span>
											</div>
										</li>
										<li class="task">
											<div class="task-container">
												<h4 class="task-label">Do the chicken dance</h4>
												<span class="task-action-btn"><span class="action-box large delete-btn" title="Delete Task"><i class="icon"><i class="icon-trash"></i></i></span><span class="action-box large complete-btn" title="Mark Incomplete"><i class="icon"><i class="icon-check"></i></i></span></span>
											</div>
										</li>
										<li class="task">
											<div class="task-container">
												<h4 class="task-label">Pay the electricity bills</h4>
												<span class="task-action-btn"><span class="action-box large delete-btn" title="Delete Task"><i class="icon"><i class="icon-trash"></i></i></span><span class="action-box large complete-btn" title="Mark Complete"><i class="icon"><i class="icon-check"></i></i></span></span>
											</div>
										</li>
										<li class="task completed">
											<div class="task-container">
												<h4 class="task-label">Make dinner reservation</h4>
												<span class="task-action-btn"><span class="action-box large delete-btn" title="Delete Task"><i class="icon"><i class="icon-trash"></i></i></span><span class="action-box large complete-btn" title="Mark Complete"><i class="icon"><i class="icon-check"></i></i></span></span>
											</div>
										</li>
										<li class="task">
											<div class="task-container">
												<h4 class="task-label">Meeting with photographer</h4>
												<span class="task-action-btn"><span class="action-box large delete-btn" title="Delete Task"><i class="icon"><i class="icon-trash"></i></i></span><span class="action-box large complete-btn" title="Mark Complete"><i class="icon"><i class="icon-check"></i></i></span></span>
											</div>
										</li>
										<li class="task">
											<div class="task-container">
												<h4 class="task-label">Birthday wish to best friend</h4>
												<span class="task-action-btn"><span class="action-box large delete-btn" title="Delete Task"><i class="icon"><i class="icon-trash"></i></i></span><span class="action-box large complete-btn" title="Mark Complete"><i class="icon"><i class="icon-check"></i></i></span></span>
											</div>
										</li>
									</ul>
								</div>
								<div class="todo-list-footer">
									<div class="add-task-btn-wrapper"><span class="add-task-btn">
										<button class="btn btn-primary"><i class="icon-plus"></i> Add new task</button></span>
									</div>
									<div class="new-task-wrapper">
										<textarea id="new-task" placeholder="Enter new task here. . ."></textarea><span class="btn btn-danger cancel-btn" id="close-task-panel">Close</span><span class="btn btn-success ml-3 add-new-task-btn" id="add-task">Add Task</span>
									</div>
								</div>
							</div>
						</div>
						<div class="notification-popup hide">
							<p><span class="task"></span><span class="notification-text"></span></p>
						</div>
					</div>
					<!-- HTML Template for tasks-->
					<script id="task-template" type="tect/template">
						<li class="task">
						<div class="task-container">
						<h4 class="task-label"></h4>
						<span class="task-action-btn">
						<span class="action-box large delete-btn" title="Delete Task">
						<i class="icon"><i class="icon-trash"></i></i>
						</span>
						<span class="action-box large complete-btn" title="Mark Complete">
						<i class="icon"><i class="icon-check"></i></i>
						</span>
						</span>
						</div>
						</li>
					</script>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/todo/todo.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/apps/to-do.blade.php ENDPATH**/ ?>