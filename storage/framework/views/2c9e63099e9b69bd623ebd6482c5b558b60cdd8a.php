
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Add New Content  <i class="fas fa-plus"></i></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Contents</li>
<li class="breadcrumb-item active">Add Contents</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
         
         <div class="card-body">
        
						<div class="row">	
                        				
						
                            <div class="col-md-12">
                         
                                <div class="row">
                                <div class="col-md-6">
                                <div class="mb-3">
									<label class="form-label">Content Caption</label>
									<input class="form-control" type="text" placeholder="Caption" data-bs-original-title="" id="caption" required>
								</div>
                            </div>
                              
                            <div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Content Sub-Caption</label>
									<input class="form-control" type="text" placeholder="Sub Caption" data-bs-original-title="" id="sub_caption" required>
								</div>
							</div>
							<div class="col-sm-6 col-md-8 ">
								<div class="mb-3" id="banner_holder">
																<label class="form-label">Content Images</label>
									
									<div class="input-group"><input class="form-control banners_json" type="file" placeholder="" data-bs-original-title=""  required>
									<div class="input-group-append border"><button class="btn addImage bg-light text-primary" onclick="addImageInput()"><i class="fa fa-plus"></i></button></div>
									
									
								</div>
								</div>
								
							</div>
							 <div class="col-sm-6 col-md-4"></div>
                            <div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label" >Target Url</label>
									<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text" id=""><?php echo e(url('/')); ?>/</span></div>
									<input class="form-control" id="target_url" type="text" placeholder="slug, {var}" aria-describedby="inputGroupPrepend" required="" data-bs-original-title="" title="">
									
								</div>
									
								</div>
							</div>
							<div class="col-md-6"></div>
							<div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">Content Types <small>(*)</small></label>
								<select class="form-control"  id="content_type" >
										<option value="" selected disabled>select content type</option>
									<?php $__currentLoopData = $content_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($type); ?>"><?php echo e($type); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								</div>
							</div>
                            <div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">Resource Type<small>(*)</small></label>
								<select class="form-control"  id="resource_type" onchange="">
									<option value="" selected disabled>select resource type</option>
									<?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($resource); ?>"><?php echo e($resource); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">Show Resources?<small>(Yes or No)</small></label>
								<select class="form-control"  id="show_resources">
									<option value="0">No</option>
									<option value="0">Yes</option>
								</select>
								</div>
							</div>

							<div class="col-sm-6 col-md-12">
								<div class="mb-3">
									<label class="form-label">Select Resources <small>(Yes or No)</small></label>
								<select class="form-control"  id="resources_json" multiple="multiple">
									
								</select>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">Schedule<small>(Show from)</small></label>
								<input type="date" name="" id="schedule" class="form-control">
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">Expiry <small>(Show upto)</small></label>
								<input type="date" name="" id="schedule" class="form-control">
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">Status <small>(active or inactive)</small></label>
								<select class="form-control"  id="resources_json" >
									<option value="0">active</option>
									<option value="1">inactive</option>
								</select>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="mb-3">
							<label class="form-label">Content Size <small>(active or inactive)</small></label>
								<select class="form-control"  id="resources_json" >
									<option value="col-md-3">1/4 part</option>
									<option value="col-md-4">1/3 part</option>
									<option value="col-md-6">1/2 part</option>
									<option value="col-md-8">2/3 part</option>
								</select>
								</div>
							</div>


                                </div>
                          
						</div>
<div class="p-2"><button class="btn btn-outline-success " onclick="submitForm()" id="submit"><i class="fa fa-plus"></i> Add Content</button>
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
	const submitForm =async () =>{
	var images_inputs = $(".banners_json");
let images = [];
await setTimeout(()=>{
	images_inputs.each(async function(){
        	var form = new FormData();
			var files = $(this)[0].files;
			if (files.length == 0) {
				notify({
								message: "Please Select valid image file"
							}, {
								type: 'danger',
								z_index: 10000,
								timer: 2000,
							});
			}
			else{
				loadoverlay($(".banners_json"))
				form.append("image", files[0]);
				form.append("table_name", "contents");
				form.append("table_model", "Content");
				form.append("folder_name", "contentimage");
				var settings = {
					"url": "/api/upload-image",
					"method": "POST",
					"timeout": 0,
					"processData": false,
					"mimeType": "multipart/form-data",
					"contentType": false,
					"data": form,

					statusCode: {
						400: function () {
							hideoverlay($(".banners_json"))
							notify({
								message: "Please upload valid image file"
							}, {
								type: 'danger',
								z_index: 10000,
								timer: 2000,
							});
						},
						500: function () {
							hideoverlay($(".banners_json"))
							//	response = JSON.parse(response);
							$.notify({
								message: "Something went wrong!"
							}, {
								type: 'danger',
								z_index: 10000,
								timer: 2000,
							})
						}
					}
				};
		await $.ajax(settings).done(function (response) {
					hideoverlay($(".banners_json"))
					var json_response = JSON.parse(response);
					var img_path = json_response.data;
					images.push(img_path);
					
				})
				
			}
			


        })
},100)
setTimeout(console.log("##"+images),5000);
  
  }
 


    $("#submit").on('click',async function(e){
   //     e.preventDefault();

      
     
    })



</script>
<script>
      $('#tags_json').select2({
          tags:true
      });
             const imageInput = () =>$(`<div class="mb-3">		
									<div class="input-group"><input class="form-control banners_json" type="file" placeholder="" data-bs-original-title=""  required>
									<div class="input-group-append border"><button class="btn removeImage bg-light text-danger"><i class="fa fa-minus"></i></button></div>			
								</div>
								</div>`)
const addImageInput = () => {
	$("#banner_holder").after(imageInput())
}
$("body").on('click','.removeImage',function(){
	$(this).closest('.mb-3').remove();
})
      $(document).ready(function(){

window.resource_type = "";

$("#resource_type").on('change',function(){
	resource_type =$(this).val();
})
      	$("#resources_json").select2({	
	placeholder:"search resources...",
        tags: false,
        ajax: {
            url: "/api/get-resources/",
            delay: 600,
            minimumResultsForSearch: -1,
             data: function (params) {
      var query = {
        search: params.term,
        resource_type: resource_type
      }
      return query;
    },
            processResults: function(response) {

                response = JSON.parse(response);

                return {
                    results: response.items
                };

            },
            sortResults: data => data.sort((a, b) => a.text.localeCompare(b.text))


        }
    })
      })

   
</script>
<script>
	
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\Projects\alliswell\Cuba\resources\views/adminpanel/offers/offerimport.blade.php ENDPATH**/ ?>