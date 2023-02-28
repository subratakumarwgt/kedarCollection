
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Centre List</h3>

<button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus-circle"></i> New Centre</button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Centre</li>
<li class="breadcrumb-item active">List</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="modal fade modal-bookmark" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Centre</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-bookmark needs-validation" id="contact-form" novalidate="">
                    <div class="row g-2">
                        <div class="mb-3 col-md-12 mt-0">
                            <label for="con-name">Name</label>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input class="form-control" type="text" required="" id="fname" placeholder="First Name" autocomplete="off">
                                </div>

                            </div>
                        </div>
                        <div class="mb-3 col-md-12 mt-0">
                            <label for="con-mail">Address</label>
                            <input class="form-control" type="text" required="" autocomplete="off" id="address">
                        </div>
                        <div class="mb-3 row mt-0">
                            <div class="col-md-6">
                                <label for="con-phone">Contact</label>
                                <input class="form-control" type="number" required="" autocomplete="off" id="number" minlength="10">
                            </div>
                            <div class="col-md-6">
                                <label for="con-mail">Type</label>
                                <select class="form-control" id="type">
                                <option  selected="" value="" disabled>Choose centre type</option>
                                    <option value="clinic">Clinic/Chamber</option>
                                    <option value="centre">Diagnostic Centre</option>

                                </select>
                            </div>

                        </div>
                    </div>
                    <button class="btn btn-secondary" id="addCentre" type="submit">Save</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 p-3 border-right-sm">
                            <label class="p-2">Filter by Region</label>
                            <select class="form-control" id="region">
                                <option value="" default>Choose your option</option>
                                <option value="assam">Assam</option>
                                <option value="coochbehar">Coochbehar Town</option>
                                <option value="texted">Coochbehar Rural</option>

                            </select>

                        </div>

                        <div class="col-md-6 p-3">
                            <label class="p-2">Filter by Status</label>
                            <select class="form-control" id="type2">
                            <option  selected="" value="" disabled>Choose centre type</option>
                                <option value="clinic">Clinic/Chamber</option>
                                <option value="centre">Diagnostic Centre</option>

                            </select>
                            </select>


                        </div>
                    </div>



                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="datatable">
                            <thead>
                                <tr> <th>Image</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Type</th>
                                    <th>Contact</th>
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
        $('#addCentre').on('click', function(e) {
            e.preventDefault();
            var form = new FormData();
            form.append("table_name", "centres");
            form.append("name", $("#fname").val());
            form.append("address", $("#address").val());
            form.append("details", $("#number").val());
            form.append("type", $("#type").val());
            form.append("table_model", "Centre");

            var settings = {
                "url": "/api/create-data",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form,
                statusCode: {
                    400: function() {
                        $.notify({
                            message: response.message
                        }, {
                            type: 'danger',
                            z_index: 10000,
                            timer: 2000,
                        });
                    }
                }
            };

            $.ajax(settings).done(function(response) {
                response = JSON.parse(response);
                $.notify({
                    message: response.message
                }, {
                    type: 'success',
                    z_index: 10000,
                    timer: 2000,
                });
                dataTable.draw();
                console.log(response);
            });
        });
        var dataTable = $('#datatable').DataTable({
            'processing': true,
            serverSide: true,
            language: {
                processing: '<div class="loader-box"><div class="loader-2"></div></div>'
            },
            ajax: {
                'url': '/management/centre/bind',
                'data': function(data) {
                    // Read values
                    var type = $('#type2').val();
                    var number = $('#number').val();

                    // Append to data
                    data.type = type;
                    data.details = number;

                }
            },
            columns: [{
                    data: 'Image'
                },
                {
                    data: 'Name',
                    Orderable: false
                },
                {
                    data: 'Address',
                    Orderable: false
                },
                {
                    data: 'Type',
                    Orderable: false
                },
                {
                    data: 'Contact',
                    Orderable: false
                },
                {
                    data: 'Action',
                    Orderable: false
                },
            ],
        });



        $('#type2').on('change', function() {
            dataTable.draw();
        });
        $('#number').on('change', function() {
            dataTable.draw();
        });


    });
</script>


<!-- <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\Projects\alliswell\Cuba\resources\views/adminpanel/centres/centrelist.blade.php ENDPATH**/ ?>