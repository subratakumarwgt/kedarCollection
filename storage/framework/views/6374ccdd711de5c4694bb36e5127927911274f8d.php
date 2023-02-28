
<?php $__env->startSection('title', 'ChartJS Chart'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>ChartJS Chart</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Charts</li>
<li class="breadcrumb-item active">ChartJS Chart</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-xl-6 col-md-12 box-col-12">
         <div class="card">
            <div class="card-header">
               <h5>Bar Chart</h5>
            </div>
            <div class="card-body chart-block">
               <canvas id="myBarGraph"></canvas>
            </div>
         </div>
      </div>
      <div class="col-xl-6 col-md-12 box-col-12">
         <div class="card">
            <div class="card-header">
               <h5>Line Graph</h5>
            </div>
            <div class="card-body chart-block">
               <canvas id="myGraph"></canvas>
            </div>
         </div>
      </div>
      <div class="col-xl-6 col-md-12 box-col-12">
         <div class="card">
            <div class="card-header">
               <h5>Radar Graph</h5>
            </div>
            <div class="card-body chart-block">
               <canvas id="myRadarGraph"></canvas>
            </div>
         </div>
      </div>
      <div class="col-xl-6 col-md-12 box-col-12">
         <div class="card">
            <div class="card-header">
               <h5>Line Chart</h5>
            </div>
            <div class="card-body chart-block">
               <canvas id="myLineCharts"></canvas>
            </div>
         </div>
      </div>
      <div class="col-xl-6 col-md-12 box-col-12">
         <div class="card">
            <div class="card-header">
               <h5>Doughnut Chart</h5>
            </div>
            <div class="card-body chart-block chart-vertical-center">
               <canvas id="myDoughnutGraph"></canvas>
            </div>
         </div>
      </div>
      <div class="col-xl-6 col-md-12 box-col-12">
         <div class="card">
            <div class="card-header">
               <h5>Polar Chart</h5>
            </div>
            <div class="card-body chart-block chart-vertical-center">
               <canvas id="myPolarGraph"></canvas>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/chart/chartjs/chart.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/chartjs/chart.custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\rollswallah\resources\views/charts/chartjs.blade.php ENDPATH**/ ?>