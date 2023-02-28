
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Add New Product  <i class="fas fa-pump-medical"></i></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Products</li>
<li class="breadcrumb-item active">Add Product</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
         
         <div class="card-body">
        
						<div class="row">	
                        				
							<div class="col-sm-6 col-md-3">
								<div class="mb-3 mt-1  shadow">
									<img src="/storage/productimage/productdefault.png" class="img-fluid " id="img_prv">
								</div>
							</div>
                            <div class="col-md-9">
                            <form id="product_form">		
                                <div class="row">
                                <div class="col-md-12">
                                <div class="mb-3">
									<label class="form-label">Product Title</label>
									<input class="form-control" type="text" placeholder="Title/name" data-bs-original-title="" id="name" required>
								</div>
                            </div>
                              
                            <div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Category</label>
									<select class='form-control' required id="category">
                                        <option selected disabled>__Select__</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category); ?>" ><?php echo e($category); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
								</div>
							</div>
                            <div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label" >Subcategory</label>
									<select class='form-control' id="sub_category">
                                        <option selected disabled required> __Select__</option>
                                        <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category); ?>" ><?php echo e($category); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
								</div>
							</div>
                            <div class="col-sm-6 col-md-12">
								<div class="mb-3">
									<label class="form-label">Search Tags <small>(, Seperated tags)</small></label>
								<select class="form-control" multiple="multiple" id="tags_json"></select>
								</div>
							</div>
                                </div>
                            </form>
							</div>
                            <form class="row" id="product_form_2">
							<div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">Upload Image <small>*(jpg and png)</small></label>
									<input class="form-control" type="file" placeholder="Email" data-bs-original-title="" title="" id="image">
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">Current Price <i class="fa fa-inr"></i> </label>
									<input class="form-control" type="number" placeholder="Current Price " data-bs-original-title="" title="" required id="pre_price">
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">Offer Price <i class="fa fa-inr"></i></label>
									<input class="form-control" type="number" placeholder="Offer Price " data-bs-original-title="" title="" required id="price">
								</div>
							</div>
                            <div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">on Offer? </label>
									<select class='form-control' id="on_offer">
                                        <option value="0" selected>No</option>
                                        <option value="1">Yes</option>
                                    </select>
								</div>
							</div>
                            <div class="col-sm-6 col-md-4">
								<div class="mb-3">
									<label class="form-label">Source <small>(Select Soure)</small></label>
									<select class='form-control' id="centre_id">
                                        <option  selected disabled>__Selected__</option>
                                        <?php $__currentLoopData = $sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $src): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$src->id); ?>" ><?php echo e(@$src->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
								</div>
							</div>
                            <div class="col-sm-6 col-md-4">
								<div class="mb-3">
									<label class="form-label">Stock <small>(in units)*</small></label>
									<input class="form-control" type="number" placeholder="Stock in units" data-bs-original-title="" title="" value="10" min="0" id="stock">
								</div>
							</div>
                            <div class="col-sm-6 col-md-4">
								<div class="mb-3">
									<label class="form-label">Status <small>(default Active)*</small></label>
									<select class='form-control' id="status">
                                        <option value="0"> Inactive </option>
                                        <option value="1" selected> Active </option>
                                    </select>
								</div>
							</div>
							<div class="col-md-12 mb-3">
								<div>
									<label class="form-label">Product Description</label>
									<textarea class="form-control" rows="5" placeholder="Enter About your description" required id="description"></textarea>
								</div>
							</div>
                            <div class="col-md-12">
								<div>
									<button class="btn btn-block btn-primary" id="submit">Submit</button>
								</div>
							</div>
                            </form>
						</div>
                    
				 </div>  
                                
              </div>
       
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $("#submit").on('click',function(e){
        e.preventDefault();
        if ($("#product_form").valid() && $("#product_form_2").valid()) {
			var form = new FormData();
			var files = $('#image')[0].files;
			if (files.length > 0) {
				loadoverlay($("#product_form"))
				form.append("image", files[0]);
				form.append("table_name", "products");
				form.append("table_model", "Product");
				form.append("folder_name", "productimage");

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
							hideoverlay($("#product_form"))
							notify({
								message: "Please upload valid image file"
							}, {
								type: 'danger',
								z_index: 10000,
								timer: 2000,
							});
						},
						500: function () {
							hideoverlay($("#product_form"))
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

				$.ajax(settings).done(function (response) {
					hideoverlay($("#product_form"))
					var json_response = JSON.parse(response);
					var img_path = json_response.data;
					$.notify({
						message: json_response.message
					}, {
						type: 'success',
						z_index: 10000,
						timer: 2000,
					})
					var form = new FormData();
					form.append("table_name", "products");
					form.append("title", $("#name").val());
					form.append("description", $("#description").val());
					form.append("centre_id", $("#centre_id").val());
					form.append("category", $("#category").val());
					form.append("image", img_path);
					form.append("tags_json", JSON.stringify($("#tags_json").val()));
					form.append("sub_category", $("#sub_category").val());
					form.append("pre_price", $("#pre_price").val());
					form.append("price", $("#price").val());
					form.append("on_offer", $("#on_offer").val());
					form.append("stock", $("#stock").val());
					form.append("status", $("#status").val());
					form.append("sold_times", $("#sold_times").val());
					form.append("table_model", "Product");

					var settings = {
						"url": "/api/create-data",
						"method": "POST",
						"timeout": 0,
						"processData": false,
						"mimeType": "multipart/form-data",
						"contentType": false,
						"data": form,
						statusCode: {
							400: function () {
								hideoverlay($("#product_form"))
								//  = JSON.parse();
								$.notify({
									message: "Something went wrong while inserting doctor!"
								}, {
									type: 'danger',
									z_index: 10000,
									timer: 2000,
								});
							},
							500: function () {
								hideoverlay($("#product_form"))
								// response = JSON.parse(response);
								$.notify({
									message: "Something went wrong while inserting doctor!"
								}, {
									type: 'danger',
									z_index: 10000,
									timer: 2000,
								})
							}
						}
					};

					$.ajax(settings).done(function (response) {
						var response2 = JSON.parse(response)
						hideoverlay($("#product_form"));
						$.notify({
							message: response2.message
						}, {
							type: 'success',
							z_index: 10000,
							timer: 2000,
						})

						

					},function(){
						window.open("/management/product/import","_self");
					});


				

				});
			
			
				
			}
			else {
				hideoverlay($("#product_form"));
				$.notify({
					message: "Please select valid image"
				}, {
					type: 'danger',
					z_index: 10000,
					timer: 2000,
				})
			}
		//	
		}
    
      
        else{
            alert("please check the form again")
        }
    })


</script>
<script>
      $('#tags_json').select2({
          tags:true
      });
   
</script>
<script>
	
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\Projects\rollswallah\resources\views/adminpanel/products/productimport.blade.php ENDPATH**/ ?>