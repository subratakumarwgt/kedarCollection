
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<?php echo $__env->yieldPushContent("custom-css"); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Add New Content <i class="fas fa-plus"></i></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Contents</li>
<li class="breadcrumb-item active">Add Contents</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<input type="hidden" id="variant_id" value="<?php echo e(@$variant->id); ?>">

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 card">
  <div class="card-header">
		<div class="col-md-6">
			<label for="" class="form-label strong"><strong>Variant Name</strong> </label>
			<input type="text" class="form-control" name="variant_name" class="variant_name" id="variant_name" value="<?php echo e(@$variant->name); ?>">
		</div>

	</div>
	<table class="table">
		<thead>
			<tr>
				<th data-column="action"><label for="image">Value</label></th>
				<th data-column="action"><label for="image">Label</label></th>
				<th data-column="action"><label for="image">Image</label></th>
				<th data-column="action"><label for="image">Preview</label></th>
				<th data-column="action" class="text-center">Action</th>
			</tr>
		</thead>
		<tbody class="addVariantBody">		
			<?php if(isset($variant)): ?>
            <?php $__currentLoopData = $variant->variantValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
            <tr class="price_row border-bottom">
				<td class="text-center"> <input type="text" class="form-control variant_label col-md-10" value="<?php echo e($value->value); ?>"></td>
				<td class="text-center"> <input type="text" class="form-control variant_value col-md-10" value="<?php echo e($value->label); ?>"></td>
				<td class="text-center"><input type="hidden" class="image_path" value="<?php echo e($value->image); ?>"><small class="text-primary statusText"></small> <input type="file" class="form-control variant_image productImage"></td>
				<td class="text-center">
					<div class="p-2 m-1 border"><img src="/<?php echo e($value->image); ?>" width="70px" height="70px" alt="" class="img-fluid image-preview"></div>
				</td>
				<td class="text-center"><button class="btn btn-sm btn-danger  removeRow btn-pill"><i class="fa fa-minus-circle"></i></button></td>
			</tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
			<tr class="price_row border-bottom">
				<td class="text-center"> <input type="text" class="form-control variant_label col-md-10"></td>
				<td class="text-center"> <input type="text" class="form-control variant_value col-md-10"></td>
				<td class="text-center"><input type="hidden" class="image_path"><small class="text-primary statusText"></small> <input type="file" class="form-control variant_image productImage"></td>
				<td class="text-center">
					<div class="p-2 m-1 border"><img src="<?php echo e(asset('assets/images/product/1.png')); ?>" width="70px" height="70px" alt="" class="img-fluid image-preview"></div>
				</td>
				<td class="text-center"><button class="btn btn-sm btn-success addRow btn-pill"><i class="fa fa-plus-circle"></i></button></td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="3"></td>
				<td class="pt-2 text-center" colspan="2"><button class="btn btn-dark btn-sm addVariant" id="addVariant"><i class="fa fa-plus-circle"></i> Submit</button></td>
			</tr>
		</tfoot>
	</table>
    </div>
 </div>
</div>


                    <?php $__env->stopSection(); ?>
                   
                    <?php $__env->startSection('script'); ?>

                    <script>
                        $('#tags_json').select2({
                            tags: true
                        });
                        const imageInput = () => $(`	
									<div class="input-group mt-2"><input class="form-control banners_json varImage" type="file" placeholder="" data-bs-original-title=""  required>
									<div class="input-group-append border"><button type="button" class="btn removeImage bg-light text-danger"><i class="fa fa-minus"></i></button></div>			
								</div>`)
                        const addImageInput = () => {
                            $("#banner_holder").append(imageInput())
                         }
                        $(".selectProduct").on("click",function(){
                            $("#selectProductModal").modal("show")
                        })
                        $(document).ready(function() {

                            window.resource_type = "";

                            $("#resource_type").on('change', function() {
                                resource_type = $(this).val();
                            })
                            $("#resources_json").select2({
                                placeholder: "search resources...",
                                tags: false,
                                ajax: {
                                    url: "/api/get-resources/",
                                    delay: 600,
                                    minimumResultsForSearch: -1,
                                    data: function(params) {
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
                        let selectedProducts = []
                        let products = []
                        let details = {}
                        let images = []
                        let variant = {}
$(".setSelectedData").on("click",function(){
    selectedProducts = getSelectedItems()
    $(".removeRow").trigger("click")
    selectedProducts.forEach((value,key)=>{
      
        $(".product_id").last().val(value).trigger("change")
        if((selectedProducts.length-1) > key)
        $(".addRow").trigger("click")

    })
})
$("#addVariant").click(async function(event) {
		event.preventDefault();
		loadoverlay($(this))
		let table = $(this).closest("table")
		let body_rows = $(this).closest(".modal-content").find("tbody").find("tr")
		var form = new FormData();
		form.append("table_name", "variants");
		form.append("name", $("#variant_name").val());
		form.append("variant_model", "Product");
		form.append("table_model", "Variant");
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
					hideoverlay($(this))
					//  = JSON.parse();
					$.notify({
						message: "Something went wrong ! External Error"
					}, {
						type: 'danger',
						z_index: 10000,
						timer: 2000,
					});
					return 0;
				},
				500: function() {
					hideoverlay($(this))
					// response = JSON.parse(response);
					$.notify({
						message: "Something went wrong !Internal Error: "
					}, {
						type: 'danger',
						z_index: 10000,
						timer: 2000,
					})
					return 0;
				}
			}
		};

		response = await $.ajax(settings).done(function(response) {
			var response2 = JSON.parse(response)
			// hideoverlay($("#product_form"));
			$.notify({
				message: "Variant created. Adding values..."
			}, {
				type: 'success',
				z_index: 10000,
				timer: 2000,
			})
			return response


		}, function() {
			// window.open("/management/product/import","_self");
		});
		response = JSON.parse(response)
		let varient_id = response.data.id
		

		$(".variant").append(`<option value="${response.data.id}">${response.data.name}</option>`)
		body_rows.each(async function(key, val) {
			// $(val).find(".statusText").html("<p class='text-danger'>Uploading image ["+(key+1)+"]</p>")
			var file = $(this).find(".variant_image")[0].files[0];

			if (file) {
				var form = new FormData();
				form.append("image", file);
				form.append("table_name", "variants");
				form.append("table_model", "Variant");
				form.append("folder_name", "variant_image");
				response = await $.ajax({
					url: '/api/upload-image',
					method: 'POST',
					type: 'POST',
					async: false,
					data: form,
					contentType: false,
					processData: false,
					xhr: function() {
						var xhr = new window.XMLHttpRequest();
						xhr.upload.addEventListener("progress",
							function(event) {
								var percent = (event.loaded / event.total) * 100;
								var progress = Math.round(percent);
								$(val).find(".statusText").html(progress + "% uploaded");
							},
							false
						);
						xhr.addEventListener("load", function(e) {
							// loadHandler(e)
							$.notify({
								message: "Uploaded image: [" + (key + 1) + "]"
							}, {
								type: 'success',
								z_index: 10000,
								timer: 2000,
							})

						}, false);
						xhr.addEventListener("error", errorHandler, false);
						xhr.addEventListener("abort", abortHandler, false);

						return xhr;
					}

				});
				//  response = JSON.parse(response)
				image_path = response.data;
				$(this).find(".image_path").val(image_path)

			}
			var form = new FormData();
			form.append("table_name", "variant_has_values");
			form.append("variant_id", varient_id);
			form.append("value", $(this).find(".variant_value").val());
			form.append("label", $(this).find(".variant_label").val());
			form.append("image", $(this).find(".image_path").val());
			form.append("table_model", "variantHasValue");
			response = await $.ajax({
				url: '/api/create-data',
				method: 'POST',
				type: 'POST',
				async: true,
				data: form,
				contentType: false,
				processData: false,
				xhr: function() {
					var xhr = new window.XMLHttpRequest();
					xhr.addEventListener("load", function(e) {
						// loadHandler(e)
						$.notify({
							message: "Added variant value: [" + (key + 1) + "]"
						}, {
							type: 'success',
							z_index: 10000,
							timer: 2000,
						})

					}, false);
					// xhr.addEventListener("error", errorHandler, false);
					// xhr.addEventListener("abort", abortHandler, false);

					return xhr;
				}

			});
		})
		hideoverlay($(this))


	})
 
   
   
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/adminpanel/variants/variantEdit.blade.php ENDPATH**/ ?>