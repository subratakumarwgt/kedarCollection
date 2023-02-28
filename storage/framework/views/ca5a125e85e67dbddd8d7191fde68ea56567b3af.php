
<?php $__env->startSection('title', 'Echarts'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/echart.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Echarts</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Charts</li>
<li class="breadcrumb-item active">Echarts</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5>Basic Area Chart </h5>
				</div>
				<div class="card-body">
					<div class="apache-cotainer" id="area-echart"></div>
				</div>
			</div>
		</div>
		<div class="col-xl-6 box-col-12">
			<div class="card">
				<div class="card-header">
					<h5>Area pie chart</h5>
				</div>
				<div class="card-body">
					<div class="apache-cotainer" id="echart-pie"></div>
				</div>
			</div>
		</div>
		<div class="col-xl-6 box-col-12">
			<div class="card">
				<div class="card-header">
					<h5>Bar polar chart</h5>
				</div>
				<div class="card-body">
					<div class="apache-cotainer" id="echart-polar"></div>
				</div>
			</div>
		</div>
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header">
					<h5>Bar chart</h5>
				</div>
				<div class="card-body">
					<div class="apache-cotainer-large" id="echart-bar">   </div>
				</div>
			</div>
		</div>
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header">
					<h5>Bar chart 2</h5>
				</div>
				<div class="card-body">
					<div class="apache-cotainer-large" id="echart-bar2"></div>
				</div>
			</div>
		</div>
		<div class="col-xl-6 box-col-12">
			<div class="card">
				<div class="card-header">
					<h5>Boxplot chart</h5>
				</div>
				<div class="card-body">
					<div class="apache-cotainer boxplot-cotainer" id="echart-boxplot"></div>
				</div>
			</div>
		</div>
		<div class="col-xl-6 box-col-12">
			<div class="card">
				<div class="card-header">
					<h5>lines clip chart</h5>
				</div>
				<div class="card-body clip-chart-wrapper">
					<div class="apache-cotainer" id="lines-clip"></div>
				</div>
			</div>
		</div>
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header">
					<h5>line visual chart</h5>
				</div>
				<div class="card-body">
					<div class="apache-cotainer" id="line-visual"></div>
				</div>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="card">
				<div class="card-header">
					<h5>angle chart</h5>
				</div>
				<div class="card-body">
					<div class="apache-cotainer" id="texture-bar-by-clipPath"> </div>
				</div>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="card">
				<div class="card-header">
					<h5>gauge chart</h5>
				</div>
				<div class="card-body">
					<div class="apache-cotainer" id="echart-gauge"> </div>
				</div>
			</div>
		</div>
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header">
					<h5>line visual chart 2</h5>
				</div>
				<div class="card-body">
					<div class="apache-cotainer" id="line-visulH"> </div>
				</div>
			</div>
		</div>
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header">
					<h5>pictorial repeat chart</h5>
				</div>
				<div class="card-body">
					<div class="apache-cotainer" id="dynamic-data"></div>
				</div>
			</div>
		</div>
		<div class="col-xl-6 xl-100 box-col-12">
			<div class="card">
				<div class="card-header">
					<h5>radar chart</h5>
				</div>
				<div class="card-body">
					<div class="apache-cotainer" id="echart-radar"></div>
				</div>
			</div>
		</div>
		<div class="col-xl-6 xl-100 box-col-12">
			<div class="card">
				<div class="card-header">
					<h5>polar line chart</h5>
				</div>
				<div class="card-body">
					<div class="apache-container polar-line" id="main0"></div>
				</div>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="card">
				<div class="card-header">
					<h5>pie rich text chart</h5>
				</div>
				<div class="card-body">
					<div class="apache-container" id="echart-pierich"></div>
				</div>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="card">
				<div class="card-header">
					<h5>pictorial single chart</h5>
				</div>
				<div class="card-body">
					<div class="apache-container" id="dotted"></div>
				</div>
			</div>
		</div>
		<div class="col-xl-12">
			<div class="card note p-20 d-inline-block w-100"> Echarts for more options please refer <a href="https://echarts.apache.org/examples/en/index.html" target="_blank">echart Official site  </a>And <a href="https://github.com/apache/echarts" target="_blank">githup link</a></div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
 <script src="<?php echo e(asset('assets/js/chart/echart/esl.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/echart/config.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/echart/pie-chart/facePrint.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/echart/pie-chart/testHelper.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/echart/pie-chart/custom-transition-texture.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/echart/data/symbols.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/echart/custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\rollswallah\resources\views/charts/echarts.blade.php ENDPATH**/ ?>