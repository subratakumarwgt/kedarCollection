
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">


<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Edit category</h3>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">category</li>
<li class="breadcrumb-item active">Add</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header">
    <h4><?php echo e(isset($category) ? "Edit" : "Add"); ?> category</h4>
    <input type="hidden" id="category_id" value="<?php echo e(isset($category) ? $category->id : ''); ?>">
  </div>
    <div class="card-body">
        <form id="category_form" class="needs-validation theme-form" novalidate="" enctype="multipart/form-data" method="post" action="/management/category/import/data">
            <div class="mb-3 row">

                <div class="col-sm-3">
                    <?php if(isset($category)): ?>
                    <img class="img-fluid shadow border" src="/<?php echo e($category->image); ?>" id="img_prv">
                    <?php else: ?>
                    <img class="img-fluid shadow border" src="<?php echo e(asset('assets/images/product/1.png')); ?>" id="img_prv">
                    <?php endif; ?>
                    <input class="form-control " id="image" type="file" accept="" name="image" placeholder="category Image">
                  
                </div>
                <div class="col-sm-9">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label" for="">Category Title</label>
                        <div class="col-sm-9">
                            <input class="form-control" required id="category_name" type="text" placeholder="category Name" name="name" value="<?php echo e(@$category->name); ?>"></div>
                            <div class="mb-3">
                                <label class="form-label" for="status">Status <small>(default Active)*</small></label><br>
                                <label class="switch">
                                    <input type="checkbox" <?php if(isset($category) && $category->status == '1' ): ?> checked = "true" <?php endif; ?>" data-bs-original-title="" title="" id="status"><span class="switch-state bg-success"></span>
                                </label>
                            </div>
                        <div class="progress">
                        <div class="progress-bar-animated progress-bar-striped bg-success" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" id="statusText"></div>
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo e(@$category->id); ?>" id="category_id">
                    <button class="btn btn-primary ml-3 mt-2" data-bs-original-title="" title="" id="submit"><?php echo e(isset($category) ? "Update" : "Submit"); ?></button>
                </div>

            </div>
        </form>
    </div>
    <div class="card-footer d-none">
   
    </div>
</div>
<div class="card">
    <div class="card-header">
   All Categories    
    </div>
    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="datatable">
                            <thead>
                                <tr><th>Image</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                        </table>
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
               'url': '/management/category/bind',
               'data': function(data) {                    // Read values
                
                   var status = $('#status').prop("checked") ? "1": 0;               
                   data.status = status;

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
                   data: 'Action',
                   Orderable: false
               },
           ],
       });



       // $('#category').on('change', function() {
       //     dataTable.draw();
       // });
       // $('#sub_category').on('change', function() {
       //     dataTable.draw();
       // });
       $('#status').on('change', function() {
           dataTable.draw();
       });
       $("#submit").on("click",async function(e) {
        e.preventDefault()
        if(!$("#category_form").valid()){
          return 0;
        }
        var file = $("#image")[0].files[0];
        var img_path = "<?php echo e(@$category->image); ?>"
        var response; 
        // $("#statusText").html("File uploading started");
        console.log(file)
        if (file) {
            var form = new FormData();
            form.append("image", file);
            form.append("table_name", "categories");
            form.append("table_model", "Category");
            form.append("folder_name", "category_image");
            response = await $.ajax({
                url: '/api/upload-image',
                method: 'POST',
                type: 'POST',
                async: true,
                data: form,
                contentType: false,
                processData: false,
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress",
                        function(event) {
                            var percent = (event.loaded / event.total) * 100;
                            var progress = Math.round(percent);
                            setTimeout(() => {
                                $("#statusText").width(progress+"%");
                            }, 100);
                            
                        },
                        false
                    );
                    xhr.addEventListener("load", function(e) {
                        // $("#statusText").width(0+"%");

                    }, false);
                    xhr.addEventListener("error", function(){
                      
                        return 0;
                    }, false);
                    xhr.addEventListener("abort", function() {
                      
                        return 0;
                    }, false);
                    return xhr;
                }
            });
                    img_path = response.data
            }
            var form = new FormData();
            form.append("image", img_path);
            form.append("table_name", "categories");
            if($("#category_id").val() != "")
            form.append("id", $("#category_id").val());
            form.append("status",$("#status").prop("checked") ? "1" : "0")
            form.append("table_model", "Category");
            form.append("name",$("#category_name").val());
            response = await $.ajax({
                url: '/api/<?php echo e(isset($category) ? "update" : "create"); ?>-data',
                method: 'POST',
                type: 'POST',
                async: true,
                data: form,
                contentType: false,
                processData: false,
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress",
                        function(event) {
                            var percent = (event.loaded / event.total) * 100;
                            var progress = Math.round(percent);
                            $("#statusText").width(progress+"%");
                        },
                        false
                    );
                    xhr.addEventListener("load", function(e) {
                        $.notify({
								message: "Category <?php echo e(isset($category) ? 'updated' : 'created'); ?> successfully"
							}, {
								type: 'success',
								z_index: 10000,
								timer: 2000,
							})
                            dataTable.draw();
                    }, false);
                    xhr.addEventListener("error", function(){
                        $("#statusText").html("");
                        $.notify({
								message: "Data could not be updated"
							}, {
								type: 'danger',
								z_index: 10000,
								timer: 2000,
							})
                        return 0;
                    }, false);
                    xhr.addEventListener("abort", function() {
                        $.notify({
								message: "Data could not be updated"
							}, {
								type: 'danger',
								z_index: 10000,
								timer: 2000,
							})
                        return 0;
                    }, false);
                    return xhr;
                }
            });
            // $(val).closest("td").find(".image_path").val(response.data)
       
    })      

   });


</script>

<!-- <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/adminpanel/category/category.blade.php ENDPATH**/ ?>