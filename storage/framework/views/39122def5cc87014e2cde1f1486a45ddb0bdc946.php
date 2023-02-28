
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Asset Edit</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Assets</li>
<li class="breadcrumb-item active">Edit</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-body">
            <form  id="asset_form" class="" novalidate="" enctype="multipart/form-data" method="post" action="/management/centre/import/data">
            <input type="hidden" id="asset_id" value="<?php echo e($asset->id); ?>">
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label mt-5" for="" >Asset Title</label>                                   
									<div class="col-sm-6">
										<input class="form-control mt-5" id="title" required  type="text" readonly placeholder="Asset Title" value="<?php echo e($asset->title); ?>">
                                       
									</div>
								</div>
                                <div class="mb-3 row">
									<label class="col-sm-3 col-form-label" for="">List</label>
									<div class="col-sm-6">
										<select multiple="multiple" class="form-control " id="asset_list" required> 
                                            <?php $__currentLoopData = json_decode($asset->list_json); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($list); ?>" selected><?php echo e($list); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        
									</div>
								</div>
            </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" id="saveButton">Save</button>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
     $("#asset_list").select2({
  tags: true,
  tokenSeparators: [','],
 
});
    $("#saveButton").on("click",function(e){
        if($("#asset_form").valid()){
            loadoverlay($("#asset_form"));
            var form = new FormData();
            form.append("table_name", "static_assets");
            form.append("list_json",JSON.stringify( $("#asset_list").val()));           
            form.append("table_model", "StaticAsset");
            form.append("id", $("#asset_id").val());

            var settings = {
                "url": "/api/update-data",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form,
                statusCode: {
                    400: function() {
                        hideoverlay($("#asset_form"));
                        $.notify({
                            message: "Sorry could not upload data"
                        }, {
                            type: 'danger',
                            z_index: 10000,
                            timer: 2000,
                        });
                    }
                }
            };

            $.ajax(settings).done(function(response) {
                hideoverlay($("#asset_form"));
                response = JSON.parse(response);
                $.notify({
                    message: response.message
                }, {
                    type: 'success',
                    z_index: 10000,
                    timer: 2000,
                });
               
            });
  
        }
        else{
       
            
           
        }
    })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/adminpanel/assets/assetedit.blade.php ENDPATH**/ ?>