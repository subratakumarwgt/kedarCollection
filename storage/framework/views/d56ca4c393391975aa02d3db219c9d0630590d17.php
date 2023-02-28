<div class="row">
    <div class="col-md-12 p-1">
        <div class="row">
            <div class="col-md-3 p-1">
                <label for="">Status</label>
                <select name="" id="status" class="form-control">
                    <option value="">filter by status</option>
                    <option value="0">Inactive</option>
                    <option value="1">Active</option>
                </select>
            </div>
            <div class="col-md-3 p-1">
                <label for="">Categories</label>
                <select name="" id="category" class="form-control">
                <option value="">filter by category</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-3 p-1">
                <label for="">From</label>
               <input type="date" class="form-control" id="from_date">
            </div>
            <div class="col-md-3 p-1">
                <label for="">To</label>
                <input type="date" class="form-control" id="to_date">
            </div>
        </div>
    </div>
    <div class="col-md-12 p-1 table-responsive">    
    <table class="" id="datatableProduct">
        <thead>
            <tr>
            <th>
            <div class="text-center text-end icon-state switch-sm switch-outline m-1 ">
            <label class="switch">
                <input type="checkbox" data-bs-original-title="" title="" id=""><span class="switch-state  bg-success shadow-sm"></span>
            </label>
            </div> 
            </th>
            <th>
                Image
            </th>
            <th>
                Title
            </th>
            <th>
                Description
            </th>
            </tr>            
        </thead>
        <tbody>

        </tbody>
    </table>  
    </div>

</div>
<?php $__env->startPush("custom-scripts"); ?>
<script>
  var selectTable = $('#datatableProduct').DataTable({
            'processing': true,
            serverSide: true,
            language: {
                processing: '<div class="loader-box"><div class="loader-2"></div></div>'
            },
            ajax: {
                'url': '/management/product-select/bind',
                'data': function(data) {
                    // Read values
                    var category = $('#category').val();
                    // var sub_category = $('#sub_category').val();
                    var status = $('#status').val();
                    var from_date = $('#from_date').val();
                    var to_date = $('#to_date').val();

                    // Append to data
                    data.category = category;
                    // data.sub_category = sub_category;
                    data.status = status;

                    data.from_date = from_date;

                    data.to_date = to_date;

                }
            },
            columns: [
                {
                    data: 'Select',
                    Orderable: false
                },
                {
                    data: 'Image',
                    Orderable: false
                },
                {
                    data: 'Title',
                    Orderable: false
                },
                {
                    data: 'Description',
                    Orderable: false
                },
            ],
        });
        $('#category').on('change', function() {
            selectTable.draw();
        });
        $('#sub_category').on('change', function() {
            selectTable.draw();
        });
        $('#status').on('change', function() {
            selectTable.draw();
        });
</script>
<?php $__env->stopPush(); ?>


<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">


<?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/components/select-product.blade.php ENDPATH**/ ?>