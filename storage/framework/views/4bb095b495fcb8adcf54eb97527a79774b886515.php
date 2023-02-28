
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Sales Report  <i class="fas fa-file"></i></h3>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Sales</li>
<li class="breadcrumb-item active">Report</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="row">
            <div class="col-xl-6 xl-100 box-col-12">
         <div class="widget-joins card widget-arrow">
            <div class="row">
               <div class="col-sm-6 pe-0">
                  <div class="media border-after-xs">
                     <div class="align-self-center me-3 text-start">
                        <h6 class="mb-1">Sale</h6>
                        <h4 class="mb-0">Today</h4>
                     </div>
                     <div class="media-body align-self-center"><i class="font-<?php echo e($todayTotal > $yesterdayTotal ? 'success' : 'danger'); ?>" data-feather="arrow-<?php echo e($todayTotal > $yesterdayTotal ? 'up' : 'down'); ?>"></i></div>
                     <div class="media-body">
                        <h5 class="mb-0"> <i class="fa fa-inr"></i> <span class="counter"><?php echo e($todayTotal); ?></span></h5>
                        <span class="mb-1"><?php echo e($todayTotal > $yesterdayTotal ? '+' : '-'); ?> (yesterday) <i class="fa fa-inr"></i> <?php echo e($yesterdayTotal); ?></span>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 ps-0">
                  <div class="media">
                     <div class="align-self-center me-3 text-start">
                        <h6 class="mb-1">Sale</h6>
                        <h4 class="mb-0">Month</h4>
                     </div>
                     <div class="media-body align-self-center"><i class="font-<?php echo e($thisMonthTotal > $lastMonthTotal ? 'success' : 'danger'); ?>" data-feather="arrow-<?php echo e($thisMonthTotal > $lastMonthTotal ? 'up' : 'down'); ?>"></i></div>
                     <div class="media-body ps-2">
                        <h5 class="mb-0"> <i class="fa fa-inr"></i> <span class="counter"><?php echo e($thisMonthTotal); ?></span></h5>
                        <span class="mb-1"><?php echo e($thisMonthTotal > $lastMonthTotal ? '+' : '-'); ?> (last month) <i class="fa fa-inr"></i> <?php echo e($lastMonthTotal); ?></span>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 pe-0">
                  <div class="media border-after-xs">
                     <div class="align-self-center me-3 text-start">
                        <h6 class="mb-1">Sale</h6>
                        <h4 class="mb-0">Week</h4>
                     </div>
                     <div class="media-body align-self-center"><i class="font-<?php echo e($thisWeekTotal > $lastWeekTotal ? 'success' : 'danger'); ?>" data-feather="arrow-<?php echo e($thisWeekTotal > $lastWeekTotal ? 'up' : 'down'); ?>"></i></div>
                     <div class="media-body">
                        <h5 class="mb-0"> <i class="fa fa-inr"></i> <span class="counter"><?php echo e($thisWeekTotal); ?></span></h5>
                        <span class="mb-1"><?php echo e($thisWeekTotal > $lastWeekTotal ? '+' : '-'); ?> (last week) <i class="fa fa-inr"></i> <?php echo e($lastWeekTotal); ?></span>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 ps-0">
                  <div class="media">
                     <div class="align-self-center me-3 text-start">
                        <h6 class="mb-1">Sale</h6>
                        <h4 class="mb-0">Year</h4>
                     </div>
                     <div class="media-body align-self-center"><i class="font-<?php echo e($thisYearTotal > $lastYearTotal ? 'success' : 'danger'); ?>" data-feather="arrow-<?php echo e($thisYearTotal > $lastYearTotal ? 'up' : 'down'); ?>"></i></div>
                     <div class="media-body">
                        <h5 class="mb-0"> <i class="fa fa-inr"></i> <span class="counter"><?php echo e($thisYearTotal); ?></span></h5>
                        <span class="mb-1"><?php echo e($thisYearTotal > $lastYearTotal ? '+' : '-'); ?> (last year) <i class="fa fa-inr"></i> <?php echo e($lastYearTotal); ?></span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row m-0">
                        <div class="col-md-4 p-3 border-right-sm">
                            <label class="p-2">From Date</label>
                            <input type="date" name="" id="from_date" class="form-control" >

                        </div>
                        <div class="col-md-4 p-3 border-right-sm">
                            <label class="p-2">To Date</label>
                            <input type="date" name="" id="to_date" class="form-control" >

                        </div>

                        <!-- <div class="col-md-4 p-3">
                            <label class="p-2">Group by Sales</label>
                            <select class="form-control" id="category">
                            <option  selected="" value="" disabled>--Select--</option>
                          
                                <option value="items">items</option>
                                <option value="date">date</option>
                                <option value="order_type">order_type</option>
                                <option value="payment_type">payment_type</option>
                          
                            </select>
                            </select>


                        </div> -->
                        <div class="col-md-4 p-3">
                            <label class="p-2">Filter by Order Type</label>
                            <select class="form-control" id="order_type">
                            <option  selected="" value="" disabled>--Select--</option>
                            <option value="dine_in" >Dine In</option>
                            <option  value="take_away" >Take Away</option>
                            <option  value="Online" >Online</option>
                            <option  value="on_call" >On Call</option>
                            <option  value="website" >website</option>                          
                            </select>
                            </select>


                        </div>
                       
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="datatable">
                            <thead>
                                <tr><th>Order Id</th>
                                    <th>Items Count</th>
                                    <th>Order Type</th>
                                    <th>Payment</th>
                                    <th>User Details</th>
                                    <th>Charges</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="https://cdn.datatables.net/plug-ins/1.12.1/api/sum().js"></script>
<script>
    jQuery.fn.dataTable.Api.register( 'sum()', function ( ) {
    return this.flatten().reduce( function ( a, b ) {
        if ( typeof a === 'string' ) {
            a = a.replace(/[^\d.-]/g, '') * 1;
        }
        if ( typeof b === 'string' ) {
            b = b.replace(/[^\d.-]/g, '') * 1;
        }
 
        return a + b;
    }, 0 );
} );
    $(function() {
       
        var dataTable = $('#datatable').DataTable({
            'processing': true,
            serverSide: true,
            drawCallback: function () {
                var api = this.api();
                $( api.table().footer() ).html("<td colspan='7'>Total</td><td colspan='7'><i class='fas fa-inr'></i>"+
                 (  0 - parseInt(api.column( 7, {page:'current'} ).data().sum()))
                    +"</td>");
            },
            language: {
                processing: '<div class="loader-box"><div class="loader-2"></div></div>'
            },
            ajax: {
                'url': '/management/sales/bind',
                'data': function(data) {
                    // Read values
                    var from_date = $('#from_date').val();
                    var to_date = $('#to_date').val();
                    var order_type = $('#order_type').val();

                    // Append to data
                    data.from_date = from_date;
                    data.to_date = to_date;
                    data.order_type = order_type;

                }
            },
            columns: [{
                    data: 'Order Id',
                    Orderable: true
                },
                {
                    data: 'Items Count',
                    Orderable: false
                },
                {
                    data: 'Order Type',
                    Orderable: false
                },                
                {
                    data: 'Payment',
                    Orderable: false
                },
                {
                    data: 'User Details',
                    Orderable: false
                },
                {
                    data: 'Charges',
                    Orderable: false
                },
                {
                    data: 'Date',
                    Orderable: false
                },
                {
                    data: 'Amount',
                    Orderable: false
                },
                {
                    data: 'Action',
                    Orderable: false
                },
            ],
        });



        $('#from_date').on('change', function() {
            dataTable.draw();
        });
        $('#to_date').on('change', function() {
            dataTable.draw();
        });
        $('#order_type').on('change', function() {
            dataTable.draw();
        });


    });
</script>


<!-- <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/adminpanel/expenses/salesReport.blade.php ENDPATH**/ ?>