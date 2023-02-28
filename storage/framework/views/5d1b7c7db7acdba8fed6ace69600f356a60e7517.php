
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><?php echo e($parent ?? "Inventory"); ?></li>
<li class="breadcrumb-item active"><?php echo e($child ?? "Resources"); ?> </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Modals -->

<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-sm-8">
            <div class="card">
                <form action="" id="add_item_form" class="form" method="post" action="/management/update-resources/<?php echo e($item->id); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">

                        <div class="modal-header">
                            <h5> <i class="fa fa-plus-square"></i> Edit <?php echo e($child); ?>

                            </h5>
                        </div>
                        <div class="modal-body">

                            <div class="form-group p-1 mt-2">
                                <label for="view_type">
                                    Item name
                                </label>
                                <input type="text" class="form-control" id="item_name" required name="name" value="<?php echo e($item->name); ?>">
                            </div>
                            <div class="form-group p-1 mt-2">
                                <label for="view_type">
                                    Unit
                                </label>
                                <input type="text" class="form-control" id="item_unit" required name="unit" value="<?php echo e($item->unit); ?>">
                            </div>

                            <div class="form-group p-1 mt-2">
                                <label for="view_type">
                                    Type
                                </label>
                                <select name="type" id="type" class="form-control">
                                    <?php if($item->type == "product" ): ?>
                                    <option value="product" selected>Product</option>
                                    <?php else: ?>
                                    <option value="vegetable" <?php if($item->type == "vegetable"): ?> selected <?php endif; ?>>Vegetable</option>
                                    <option value="raw_material" <?php if($item->type == "raw_material"): ?> selected <?php endif; ?>>Raw Material</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <?php if($item->type == "product" ): ?>
                            <div class="form-group p-1 mt-2">
                                <label for="view_type">
                                    Sub category
                                </label>
                                <select name="sub_category" id="sub_category" class="form-control">
                                    <option value="ice_cream" <?php if($item->type == "ice_cream"): ?> selected <?php endif; ?>>Ice Cream</option>
                                    <option value="fast_food" <?php if($item->type == "fast_food"): ?> selected <?php endif; ?>>Fast Food</option>
                                </select>
                            </div>
                            <?php endif; ?>
                            <div class="form-group p-1 mt-2">
                                <label for="view_type">
                                    Price
                                </label>
                                <input type="number" class="form-control" id="item_price" required name="price" value="<?php echo e($item->price); ?>">
                            </div>


                        </div>


                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-dark shadow-sm btn-block" type="submit"> Update <i class="fa fa-upload"></i> </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>



<!-- <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\rollswallah\resources\views/adminpanel/expenses/updateResource.blade.php ENDPATH**/ ?>