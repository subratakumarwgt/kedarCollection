
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Product List  <i class="fas fa-cookie-bite"></i></h3>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Products</li>
<li class="breadcrumb-item active">List</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
       
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                <div class="col-md-12 mb-3"><a href="import" class="btn btn-primary btn-sm mr-3"><i class="fas fa-plus-square"></i> New Product</a>
<a href="import/excel" class="btn btn-primary btn-sm mr-3"><i class="fas fa-plus-square"></i> Mass Import</a></div>
                    <div class="row m-0">
                        <div class="col-md-4 p-3 border-right-sm">
                            <label class="p-2">Filter by Sub Category</label>
                            <select class="form-control" id="sub_category">
                                <option value="" default>__Select__</option>
                                <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($sub_category); ?>"><?php echo e($sub_category); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                            </select>

                        </div>

                        <div class="col-md-4 p-3">
                            <label class="p-2">Filter by Category</label>
                            <select class="form-control" id="category">
                            <option  selected="" value="" disabled>--Select--</option>
                             <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category); ?>"><?php echo e($category); ?></option>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                            </select>
                            </select>


                        </div>
                        <div class="col-md-4 p-3">
                            <label class="p-2">Filter by Status</label>
                            <select class="form-control" id="status">
                            <option  selected="" value="" disabled>--Select--</option>
                            <option value="1" >Active</option>
                            <option  value="0" >Inactive</option>
                          
                            </select>
                            </select>


                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="datatable">
                            <thead>
                                <tr><th>
                                        <div class="text-center text-end icon-state switch-sm switch-outline m-1 ">
                                        <label class="switch">
                                            <input type="checkbox" data-bs-original-title="" title="" id="select_all"><span class="switch-state  bg-success shadow-sm"></span>
                                        </label>
                                        </div>
                                    </th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>MRP</th>
                                    <th>Brand</th>
                                    <th>Stocks</th>
                                    <th>Categories</th>
                                    <th>Sub Categories</th>
                                    <th>Search Tags</th>
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
        let selected_items = []
      
      
       $(".item_row").bind("change",getSelectedItems)
       
        var dataTable = $('#datatable').DataTable({
            'processing': true,
            serverSide: true,
            language: {
                processing: '<div class="loader-box"><div class="loader-2"></div></div>'
            },
            ajax: {
                'url': '/management/product/bind',
                'data': function(data) {
                    // Read values
                    var category = $('#category').val();
                    var sub_category = $('#sub_category').val();
                    var status = $('#status').val();

                    // Append to data
                    data.category = category;
                    data.sub_category = sub_category;
                    data.status = status;

                }
            },
            columns: [
                {
                    data: 'Select',
                    Orderable: false
                },{
                    data: 'Image',
                    Orderable: false
                },
                {
                    data: 'Title',
                    Orderable: false
                },
                {
                    data: 'MRP',
                    Orderable: false
                },                
                {
                    data: 'Brand',
                    Orderable: false
                },
                {
                    data: 'Stocks',
                    Orderable: false
                },
                {
                    data: 'Categories',
                    Orderable: false
                },
                {
                    data: 'Sub Categories',
                    Orderable: false
                },
                {
                    data: 'Search Tags',
                    Orderable: false
                },
                {
                    data: 'Action',
                    Orderable: false
                },
            ],
        });
        $('#category').on('change', function() {
            dataTable.draw();
        });
        $('#sub_category').on('change', function() {
            dataTable.draw();
        });
        $('#status').on('change', function() {
            dataTable.draw();
        });


    });
</script>


<!-- <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/adminpanel/products/productlist.blade.php ENDPATH**/ ?>