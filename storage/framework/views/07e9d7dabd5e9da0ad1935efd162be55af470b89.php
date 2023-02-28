<?php $__env->startSection('title', 'Apex Chart'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Apex Chart</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Charts</li>
<li class="breadcrumb-item active">Apex Chart</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-xl-6 box-col-6">
			<div class="card">
				<div class="card-header">
					<h5>Basic Area Chart </h5>
				</div>
				<div class="card-body">
					<div id="basic-apex"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-xl-6 box-col-6">
			<div class="card">
				<div class="card-header">
					<h5>Area Spaline Chart </h5>
				</div>
				<div class="card-body">
					<div id="area-spaline"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-xl-6 box-col-6">
			<div class="card">
				<div class="card-header">
					<h5>Bar chart</h5>
				</div>
				<div class="card-body">
					<div id="basic-bar"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-xl-6 box-col-6">
			<div class="card">
				<div class="card-header">
					<h5>Column Chart </h5>
				</div>
				<div class="card-body">
					<div id="column-chart"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-xl-6 box-col-12">
			<div class="card">
				<div class="card-header">
					<h5>
						3d Bubble Chart 
					</h5>
				</div>
				<div class="card-body">
					<div id="chart-bubble"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-xl-6 box-col-6">
			<div class="card">
				<div class="card-header">
					<h5>Stepline Chart </h5>
				</div>
				<div class="card-body">
					<div id="stepline"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-xl-12 box-col-6">
			<div class="card">
				<div class="card-header">
					<h5>Column Chart</h5>
				</div>
				<div class="card-body">
					<div id="annotationchart"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-xl-6 box-col-6">
			<div class="card">
				<div class="card-header">
					<h5>Pie Chart </h5>
				</div>
				<div class="card-body apex-chart">
					<div id="piechart"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-xl-6 box-col-6">
			<div class="card">
				<div class="card-header">
					<h5>Donut Chart</h5>
				</div>
				<div class="card-body apex-chart">
					<div id="donutchart"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-xl-12 box-col-12">
			<div class="card">
				<div class="card-header">
					<h5>Mixed Chart</h5>
				</div>
				<div class="card-body">
					<div id="mixedchart">                       </div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-xl-12 box-col-12">
			<div class="card">
				<div class="card-header">
					<h5>Candlestick Chart </h5>
				</div>
				<div class="card-body">
					<div id="candlestick"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-xl-6 box-col-6">
			<div class="card">
				<div class="card-header">
					<h5>Radar Chart </h5>
				</div>
				<div class="card-body">
					<div id="radarchart"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-xl-6 box-col-6">
			<div class="card">
				<div class="card-header">
					<h5>Radial Bar Chart</h5>
				</div>
				<div class="card-body">
					<div id="circlechart"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/chart/apex-chart/apex-chart.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/apex-chart/stock-prices.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/apex-chart/chart-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\Projects\alliswell\Cuba\resources\views/charts/chart-apex.blade.php ENDPATH**/ ?>