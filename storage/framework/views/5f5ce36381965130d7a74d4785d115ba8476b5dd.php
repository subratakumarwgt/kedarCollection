
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">


<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Edit Centre</h3>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Centre</li>
<li class="breadcrumb-item active">Add</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
					
						<div class="card-body">
							<form  id="centre_form" class="needs-validation theme-form" novalidate="" enctype="multipart/form-data" method="post" action="/management/centre/import/data">
								<div class="mb-3 row">
								
									<div class="col-sm-3">
                                    <img class="img-fluid shadow border" src="/<?php echo e(@$centre->image); ?>" id="img_prv">
										<input class="form-control " id="image"  type="file" accept="jpg,png" name="image" placeholder="Centre Image" >
                                       
									</div>
                                    <div class="col-sm-9">
                                    <div class="mb-3 row">
									<label class="col-sm-3 col-form-label" for="">Title</label>
									<div class="col-sm-9">
										<input class="form-control" required id="name" type="text" placeholder="Centre Name" name="name" value="<?php echo e(@$centre->name); ?>">
                                        <div class="invalid-tooltip">Please enter valid title.</div>
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label" for="" required>Type</label>
									<div class="col-sm-9">
										<select id="type" class="form-control " name="type">
                                       
                                            <option value="clinic" <?php if($centre->type == 'clinic'): ?> selected <?php endif; ?>>Clinic/Chamber</option>
                                            <option value="centre"  <?php if($centre->type == 'centre'): ?> selected <?php endif; ?>>Diagnostic Centre</option>
                                        </select>
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label" for="">Contact Number</label>
									<div class="col-sm-9">
										<input class="form-control" required id="number" type="text" placeholder="Contact" data-bs-original-title="" title="" name="details" value="<?php echo e(@$centre->details); ?>">
                                        <div class="invalid-tooltip">Please enter valid number.</div>
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label" for="">Address & PIN</label>
									<div class="col-sm-9">
										<input class="form-control" required id="address" type="text" placeholder="Addres with corresponding PIN" data-bs-original-title="" title="" name="address" value="<?php echo e(@$centre->address); ?>">
                                        <div class="invalid-tooltip">Please enter valid address.</div>
									</div>
								</div>
                                    
                             
                                    </div>
								</div>
                                <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="">Doctors</label>
                                <div class="col-sm-9">
                                <select class="form-control doctors" name="doctors[]" multiple="multiple" id="doctors" value="<?php echo e(@$centre->doctors_json_list); ?>">
                                    <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($doctor->id); ?>" selected><?php echo e($doctor->name); ?>, <?php echo e($doctor->specialist); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $x_doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($doctor->id); ?>" ><?php echo e($doctor->name); ?>, <?php echo e($doctor->specialist); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
</select></div></div>
<div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="">Diagnoses</label>
                                <div class="col-sm-9">
                                <select class="form-control tests" name="diagnoses[]" multiple="multiple" id="diagnoses">
                                <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($doctor->id); ?>" selected><?php echo e($doctor->title); ?>, <?php echo e($doctor->specialist); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $x_tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($doctor->id); ?>" ><?php echo e($doctor->title); ?>, <?php echo e($doctor->specialist); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
</select></div></div><input type="hidden" value="<?php echo e(@$centre->id); ?>" id="centre_id">
<button class="btn btn-primary ml-3 mt-2" data-bs-original-title="" title="" id="submit">Submit</button>
						
							</form>
						</div>
						<div class="card-footer">
						
							
						</div>
					</div>
                    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script>
$(document).ready(function() {
    $('.doctors').select2();
    $('.tests').select2();

$("#submit").on("click",function(e){
    loadoverlay( $("#centre_form"))
    e.preventDefault();
    var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
              
                    if (form.checkValidity() === false) {
                        hideoverlay( $("#centre_form"))
                        form.classList.add('was-validated');
                    return 0;
                       
                    }
                    else{
                        var form = new FormData();
        var files = $('#image')[0].files;                
        if(files.length > 0 ){
form.append('image',files[0]);
form.append("table_name", "centres");
form.append("table_model", "Centre");
form.append("folder_name", "centreimage");
var settings = {
  "url": "/api/upload-image",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form,
  statusCode: {
        400: function(response) {
            hideoverlay( $("#centre_form"))
          // response = JSON.parse(response);
      $.notify({
      message:response.message
   },{
    type:'danger',
    z_index:10000,
    timer:2000,
   });
        },
        500: function(response) {
            hideoverlay( $("#centre_form"))
        //    response = JSON.parse(response);
      $.notify({
      message:response.message
   },{
    type:'danger',
    z_index:10000,
    timer:2000,
   })
      }
}
}


$.ajax(settings).done(function (response) {
    hideoverlay( $("#centre_form"))
    console.log(response);
    response = JSON.parse(response);
     console.log(response);
    $.notify({
      message:response.message
   },{
    type:'success',
    z_index:10000,
    timer:2000,
   });
   //$("#image").remove();
   $("#centre_form").append('<input type="hidden" name="image" value="'+response.data+'">');
  $("#img_prv").attr({src:"/"+response.data})
   loadoverlay( $("#centre_form"))
   var form = new FormData();
form.append("table_name", "centres");
form.append("name", $("#name").val());
form.append("type", $("#type").val());
form.append("address",  $("#address").val());
form.append("details",  $("#number").val());
form.append("image", response.data);
form.append("table_model", "Centre");
form.append("doctors_list_json", JSON.stringify($("#doctors").val()));
form.append("tests_list_json", JSON.stringify($("#diagnoses").val()));
form.append("id", $("#centre_id").val());

var settings = {
  "url": "/api/update-data",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form,
  statusCode: {
        400: function(response) {
            hideoverlay( $("#centre_form"))
          response = JSON.parse(response);
      $.notify({
      message:response.message
   },{
    type:'danger',
    z_index:10000,
    timer:2000,
   });
        },
        500: function(response) {
            hideoverlay( $("#centre_form"))
          response = JSON.parse(response);
      $.notify({
      message:response.message
   },{
    type:'danger',
    z_index:10000,
    timer:2000,
   })
      }
}
};

$.ajax(settings).done(function (response) {
    hideoverlay( $("#centre_form"))
    response = JSON.parse(response)
    $.notify({
      message:response.message
   },{
    type:'success',
    z_index:10000,
    timer:2000,
   });
  console.log(response);
});
 
 
});

        }else{
            var form = new FormData();
form.append("table_name", "centres");
form.append("name", $("#name").val());
form.append("type", $("#type").val());
form.append("address",  $("#address").val());
form.append("details",  $("#number").val());
form.append("table_model", "Centre");
form.append("doctors_list_json", JSON.stringify($("#doctors").val()));
form.append("tests_list_json", JSON.stringify($("#diagnoses").val()));
form.append("id", $("#centre_id").val());

var settings = {
  "url": "/api/update-data",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form,
  statusCode: {
        400: function(response) {
            hideoverlay( $("#centre_form"))
          response = JSON.parse(response);
      $.notify({
      message:response.message
   },{
    type:'danger',
    z_index:10000,
    timer:2000,
   });
        },
        500: function(response) {
            hideoverlay( $("#centre_form"))
          response = JSON.parse(response);
      $.notify({
      message:response.message
   },{
    type:'danger',
    z_index:10000,
    timer:2000,
   })
      }
}
};

$.ajax(settings).done(function (response) {
    hideoverlay( $("#centre_form"))
    response = JSON.parse(response)
    $.notify({
      message:response.message
   },{
    type:'success',
    z_index:10000,
    timer:2000,
   });
  console.log(response);
});
   }
         }
                   
                
            });
    
  });

});
</script>
<script>

</script>

<!-- <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\Projects\alliswell\Cuba\resources\views/adminpanel/centres/centreedit.blade.php ENDPATH**/ ?>