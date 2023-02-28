
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
								<div class="mb-3 mt-1  border shadow">
								
									<div class="ribbon ribbon-warning text-dark border-danger ribbon-bottom-left "><?php echo e(@$product->brand); ?></div>
									<?php if(empty($product->varient)): ?>
						<img src="/<?php echo e($product->image ?? 'storage/productimage/productdefault.png'); ?>" class="img-fluid " id="img_prv">
									<?php elseif(empty($product->image) && !empty($product->varient)): ?>
						<img src="/<?php echo e($product->varient->image ?? 'storage/productimage/productdefault.png'); ?>" class="img-fluid " id="img_prv">
						<?php else: ?>
						<img src="/<?php echo e($product->varient->image ?? 'storage/productimage/productdefault.png'); ?>" class="img-fluid " id="img_prv">
									<?php endif; ?>
										<div><span class="badge badge-danger"><?php echo e(@$product->short_name); ?></span></div>
								
								</div>
								<div class="mb-3 mt-3">
									<label class="form-label">Upload Image <small>*(jpg and png)</small></label>
									<input class="form-control" type="file" placeholder="Email" data-bs-original-title="" title="" id="image">
								</div>
							</div>
                            <div class="col-md-9">
                            <form id="product_form">
                                <input type="hidden" id="id" value="<?php echo e($product->id); ?>" >		
                                <div class="row">
                                	 <div class="col-md-12">
                                <div class="mb-3">
									<label class="form-label">Varient Of (Product)</label>
									<select class="form-control" id="varient_of" name="varient_of" >
										<?php if(!empty($product->varient)): ?>
										<option value="<?php echo e($product->varient->id); ?>"><?php echo e($product->varient->short_name); ?></option>
										<?php endif; ?>
									</select>
								</div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
									<label class="form-label">Varient Type</label>
									<select class="form-control" id="varient_type" name="varient_type" >
										 <?php $__currentLoopData = $varient_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $varient_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($varient_type); ?>" <?php if($product->varient_type == $varient_type): ?> selected <?php endif; ?>><?php echo e($varient_type); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
									<label class="form-label">Type Description</label>
									<input type="text" class="form-control" name="varient_type_desc" value="<?php echo e($product->varient_type_desc); ?>" id="varient_type_desc"> 
								</div>
                            </div>
                                <div class="col-md-12">
                                <div class="mb-3">
									<label class="form-label">Product Title</label>
									<input class="form-control" type="text" placeholder="Title/name" data-bs-original-title="" id="name" required value="<?php echo e($product->title); ?>">
								</div>
                            </div>
                              
                            <div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Category</label>
									<select class='form-control' required id="category">
                                        <option selected disabled>__Select__</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category); ?>" <?php if($product->category == $category): ?> selected <?php endif; ?>><?php echo e($category); ?></option>
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
                                        <option value="<?php echo e($category); ?>" <?php if($product->sub_category == $category): ?> selected <?php endif; ?>><?php echo e($category); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
								</div>
							</div>
                            <div class="col-sm-6 col-md-12">
								<div class="mb-3">
									<label class="form-label">Search Tags <small>(, Seperated tags)</small></label>
								<select class="form-control" multiple="multiple" id="tags_json">
									<?php if(!empty($product->tags_json)): ?>
                                    <?php $__currentLoopData = json_decode(@$product->tags_json,true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(@$tag); ?>"selected><?php echo e(@$tag); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
								</div>
							</div>
                                </div>
                            </form>
							</div>
                            <form class="row" id="product_form_2">
							
							<div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">M.R.P  <i class="fa fa-inr"></i> </label>
									<input class="form-control" type="number" placeholder="Current Price " data-bs-original-title="" title="" required id="pre_price" value="<?php echo e($product->pre_price); ?>" readonly>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">Customer Price <i class="fa fa-inr"></i></label>
									<input class="form-control" type="number" placeholder="Offer Price " data-bs-original-title="" title="" required id="price" value="<?php echo e($product->price); ?>">
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">Agent Price <i class="fa fa-inr"></i></label>
									<input class="form-control" type="number" placeholder="Offer Price " data-bs-original-title="" title="" required id="agent_price" value="<?php echo e(@$product->agent_price); ?>">
								</div>
							</div>
                            <div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">on Offer? </label>
									<select class='form-control' id="on_offer">
                                        <option value="0" <?php if($product->on_offer == 0): ?> selected <?php endif; ?>>No</option>
                                        <option value="1"  <?php if($product->on_offer == 1): ?> selected <?php endif; ?>>Yes</option>
                                    </select>
								</div>
							</div>
                            <div class="col-sm-6 col-md-4">
								<div class="mb-3">
									<label class="form-label">Size <small>(select size)</small></label>
									<select class='form-control' id="size">
                                        <option  selected disabled>__Selected__</option>
                                        <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($size); ?>" <?php if($product->size == $size): ?> selected <?php endif; ?>><?php echo e($size); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
								</div>
							</div>
                            <div class="col-sm-6 col-md-4">
								<div class="mb-3">
									<label class="form-label">Stock <small>(in units)*</small></label>
									<input class="form-control" type="number" placeholder="Stock in units" data-bs-original-title="" title="" value="10" min="0" id="stock" value="<?php echo e($product->stock); ?>">
								</div>
							</div>
                            <div class="col-sm-6 col-md-4">
								<div class="mb-3">
									<label class="form-label">Status <small>(default Active)*</small></label>
									<select class='form-control' id="status">
                                        <option value="0" <?php if($product->status == 0): ?> selected <?php endif; ?>>Inactive </option>
                                        <option value="1" <?php if($product->status == 1): ?> selected <?php endif; ?>> Active </option>
                                    </select>
								</div>
							</div>
							<!-- <div class="col-md-12 mb-3">
								<div>
									<label class="form-label">Product Description</label>
									<textarea class="form-control" rows="5" placeholder="Enter About your description" required id="description"> <?php echo e($product->description); ?></textarea>
								</div>
							</div> -->
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
					form.append("size", $("#size").val());
					form.append("varient_of", $("#varient_of").val());
					form.append("varient_type", $("#varient_type").val());
					form.append("varient_type_desc", $("#varient_type_desc").val());
					form.append("category", $("#category").val());
					form.append("image", img_path);
					form.append("tags_json", JSON.stringify($("#tags_json").val()));
					form.append("sub_category", $("#sub_category").val());
					form.append("pre_price", $("#pre_price").val());
					form.append("price", $("#price").val());
					form.append("agent_price", $("#agent_price").val());
					form.append("on_offer", $("#on_offer").val());
					form.append("stock", $("#stock").val());
					form.append("status", $("#status").val());
					form.append("sold_times", $("#sold_times").val());
                    form.append("id", $("#id").val());
					form.append("table_model", "Product");

					var settings = {
						"url": "/api/update-data",
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
						window.open("/management/product/edit/"+$("#id").val(),"_self");
					});


				

				});
			
			
				
			}
			else {
                loadoverlay($("#product_form"))
			
                var form = new FormData();
					form.append("table_name", "products");
					form.append("title", $("#name").val());
					form.append("description", $("#description").val());
					form.append("size", $("#size").val());
					form.append("varient_of", $("#varient_of").val());
					form.append("varient_type", $("#varient_type").val());
					form.append("varient_type_desc", $("#varient_type_desc").val());
					form.append("category", $("#category").val());
					form.append("tags_json", JSON.stringify($("#tags_json").val()));
					form.append("sub_category", $("#sub_category").val());
					form.append("pre_price", $("#pre_price").val());
					form.append("agent_price", $("#agent_price").val());
					form.append("price", $("#price").val());
					form.append("on_offer", $("#on_offer").val());
					form.append("stock", $("#stock").val());
					form.append("status", $("#status").val());
					form.append("sold_times", $("#sold_times").val());
                    form.append("id", $("#id").val());
					form.append("table_model", "Product");

					var settings = {
						"url": "/api/update-data",
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
						window.open("/management/product/edit/"+$("#id").val(),"_self");
					});

			}
		//	
		}
    
      
        else{
            hideoverlay($("#product_form"));
            alert("please check the form again")
        }
    })


</script>
<script>
      $('#tags_json').select2({
          tags:true
      });
      $("#varient_of").select2(
      	{
            tags: false,
            ajax: {
                "url": "/api/product/varient",
                "method":"post",                
                delay: 600,
                minimumResultsForSearch: -1,
                data: function (params) {
            var query = {
                searchValue:params.term
            }
            return query;
         },
           processResults: function(response) {
                   // response = JSON.parse(response);
                    return {
                        results: response
                    };

                },

            },

        });
      $("#varient_of").on('change',(e)=>{
      	 $.get("/api/product/get/"+$("#varient_of").val(), function(data, status){
      	 	$("#name").val(data.data.title);
      	 	$.each($("#category").children('option'),function(){
      	 		console.log($(this).attr('value'));
      	 		if ($(this).attr('value') == data.data.category) {
      	 			$(this).prop('selected',true);
      	 		}
      	 	})
      	 	$.each($("#sub_category").children('option'),function(){
      	 		console.log($(this).attr('value'));
      	 		if ($(this).attr('value') == data.data.sub_category) {
      	 			$(this).prop('selected',true);
      	 		}
      	 	})
      	 	$("#tags_json").val(JSON.parse(data.data.tags_json))
      	 	$("#tags_json").select2()
      	 	// $.each(JSON.parse(data.data.tags_json),function(key,val){
      	 	// 	console.log(val);

      	 	// 	// if ($(this).attr('value') == data.data.tags_json) {
      	 	// 	// 	$(this).prop('selected',true);
      	 	// 	// }
      	 	// })
      	 	$("#img_prv").attr('src','/'+data.data.image);
      	 	//window.image_src = 
      	
      });
      })
   
</script>
<script>
	
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\Projects\alliswell\Cuba\resources\views/adminpanel/products/productedit.blade.php ENDPATH**/ ?>