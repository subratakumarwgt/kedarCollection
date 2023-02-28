
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Doctor List</h3> <a href="import" class="btn btn-primary btn-sm"><i class="fas fa-plus-square"></i> New Doctor</a>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Doctors</li>
<li class="breadcrumb-item active">List</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 p-3 border-right-sm">
                            <label class="p-2">Filter by Gender</label>
                            <select class="form-control" id="gender">
                                <option value="" default>Choose your option</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>

                        </div>

                        <div class="col-md-4 p-3">
                            <label class="p-2">Filter by Chambers</label>
                            <select class="form-control" id="chambers">
                            <option  selected="" value="" disabled>--Select--</option>
                            <?php $__currentLoopData = $centres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $centre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($centre->id); ?>"><?php echo e($centre->name); ?>,<?php echo e($centre->type); ?></option>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                            </select>
                            </select>


                        </div>
                        <div class="col-md-4 p-3">
                            <label class="p-2">Filter by Frequency</label>
                            <select class="form-control" id="chambers">
                            <option  selected="" value="" disabled>--Select--</option>
                            <option value="monthly">Monthly</option>
                            <option value="weekly">Weekly</option>
                            <option value="daily">Daily</option>
                           
                            </select>
                            </select>


                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="datatable">
                            <thead>
                                <tr><th>Image</th>
                                    <th>Name</th>
                                    <th>Specialist</th>
                                    <th>Degrees</th>
                                    <th>Visit Frequency</th>
                                    <th>Chambers</th>
                                    <th>Experience</th>
                                    <th>Fees Structure</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


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

<script>
    $(function() {
       
        var dataTable = $('#datatable').DataTable({
            'processing': true,
            serverSide: true,
            language: {
                processing: '<div class="loader-box"><div class="loader-2"></div></div>'
            },
            ajax: {
                'url': '/management/doctor/bind',
                'data': function(data) {
                    // Read values
                    var gender = $('#gender').val();
                    var chamber = $('#chambers').val();

                    // Append to data
                    data.gender = gender;
                    data.chamber = chamber;

                }
            },
            columns: [{
                    data: 'Image',
                    Orderable: false
                },
                {
                    data: 'Name',
                    Orderable: false
                },
                {
                    data: 'Specialist',
                    Orderable: false
                },                
                {
                    data: 'Degrees',
                    Orderable: false
                },
                {
                    data: 'Visit Frequency',
                    Orderable: false
                },
                {
                    data: 'Chambers',
                    Orderable: false
                },
                {
                    data: 'Experience',
                    Orderable: false
                },
                {
                    data: 'Fees Structure',
                    Orderable: false
                },
                {
                    data: 'Action',
                    Orderable: false
                },
            ],
        });



        $('#chambers').on('change', function() {
            dataTable.draw();
        });
        $('#gender').on('change', function() {
            dataTable.draw();
        });


    });
</script>


<!-- <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\Projects\alliswell\Cuba\resources\views/adminpanel/doctors/doctorlist.blade.php ENDPATH**/ ?>