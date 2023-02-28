
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<style>
	.select2-container--open {
		z-index: 9999999
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Add New Product <i class="fas fa-pump-medical"></i></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Products</li>
<li class="breadcrumb-item active">Add Product</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Modal::class, []); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'setPriceModal','aria-labelledby' => 'setPriceModal']); ?>
	<table>
		<thead>
			<tr>
				<th data-column="quanity">Quantity</th>
				<th data-column="price">Price</th>
				<th data-column="action" class="text-center">Action</th>
			</tr>
		</thead>
		<tbody class="setPriceBody">
			<?php if(isset($product)): ?>
		    <?php $__currentLoopData = $product->quantities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr class="price_row border-bottom">
			    <td><input type="number" name="quantity[]" class="form-control quantity m-1 mr-4 ml-4" value="<?php echo e($qty->quantity); ?>"></td>
				<td><input type="number" name="price[]" class="form-control price m-1 mr-4 ml-4" value="<?php echo e($qty->price); ?>"></td>
				<td class="text-center"><button class="btn btn-sm btn-danger btn-pill removeRow" "><i class="fa fa-minus-circle"></i></button></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
			<tr class="price_row">
				<td><input type="number" name="quantity[]" class="form-control quantity m-1 mr-4 ml-4"></td>
				<td><input type="number" name="price[]" class="form-control price m-1 mr-4 ml-4"></td>
				<td class="text-center"><button class="btn btn-sm btn-success addRow btn-pill"><i class="fa fa-plus-circle"></i></button></td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="2"></td>
				<td class="pt-2 text-center"><button class="btn btn-dark btn-sm setData"><i class="fa fa-check-circle"></i> Set</button></td>
			</tr>
		</tfoot>
	</table>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c)): ?>
<?php $component = $__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c; ?>
<?php unset($__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Modal::class, []); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'setUploadModal','aria-labelledby' => 'setUploadModal']); ?>
	<table>
		<thead>
			<tr>
				<th data-column="productImage"><label for="image">Image</label></th>
				<th data-column="action"><label for="image">Preview</label></th>
				<th>Status</th>
				<th data-column="action" class="text-center">Action</th>
			</tr>
		</thead>
		<tbody class="setUploadBody">
		<?php if(isset($product)): ?>
			<?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr class="price_row p-2">
				<td><input type="file" class="form-control productImage varImage col-md-10 d-none"><input type="hidden" class="image_path" value="<?php echo e($image->image); ?>"><small class="text-primary statusText"></small></td>
				<td class="text-center">
					<div class="p-2 m-1 border"><img src="/<?php echo e($image->image); ?>" width="100px" height="100px" alt="" class="img-fluid image-preview"></div>
				</td>
				<td>
					<label class="switch">
						<input type="checkbox" checked="<?php echo e(!empty($image->status)); ?>" data-bs-original-title="" title="" id="" class="product_image_status"><span class="switch-state"></span>
					</label>
				</td>
				<td class="text-center"><button class="btn btn-sm btn-danger removeRow"><i class="fa fa-minus-circle"></i></button></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
			<tr class="price_row p-2">
				<td><input type="file" class="form-control productImage varImage col-md-10"><input type="hidden" class="image_path"><small class="text-primary statusText"></small></td>
				<td class="text-center">
					<div class="p-2 m-1 border"><img src="<?php echo e(asset('assets/images/product/1.png')); ?>" width="100px" height="100px" alt="" class="img-fluid image-preview"></div>
				</td>
				<td>
					<label class="switch">
						<input type="checkbox" checked="" data-bs-original-title="" title="" id="" class="product_image_status"><span class="switch-state"></span>
					</label>
				</td>
				<td class="text-center"><button class="btn btn-sm btn-success addRow"><i class="fa fa-plus-circle"></i></button></td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="2"></td>
				<td class="pt-2 text-center"><button class="btn btn-dark btn-sm " id="uploadFile"><i class="fa fa-upload"></i> Upload</button></td>
			</tr>
		</tfoot>
	</table>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c)): ?>
<?php $component = $__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c; ?>
<?php unset($__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Modal::class, []); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'setVariantModal','aria-labelledby' => 'setVariantModal']); ?>
	<table>
		<thead>
			<tr>
				<th data-column="productImage"><label for="image">Select Variant</label></th>
				<th data-column="action"><label for="image">Values</label></th>
				<th data-column="action" class="text-center">Action</th>
			</tr>
		</thead>
		<tbody class="setVariantBody">
		    <?php if(isset($product) && !empty($product->variants->count())): ?>
			<?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variantElem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr class="price_row price_row p-2">
				<td>
				<select name="variant" id="" class="form-control variant">
					<?php $__currentLoopData = $variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e(@$variant->id); ?>" <?php if($variantElem->variant->id == $variant->id): ?> selected <?php endif; ?>><?php echo e($variant->name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
			    </td>
				<td class="text-center">
					<select name="variant_values[]" id="" class="variant_values" multiple="multiple">
						<?php $__currentLoopData = $variantElem->variant->productVariantValues->where("product_id",$product->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $elem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($elem->value->id); ?>" selected><?php echo e($elem->value->label); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</td>
				<td class="text-center"><button class="btn btn-sm btn-danger btn-pill removeRow"><i class="fa fa-minus-circle"></i></button></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
			<tr class="price_row price_row p-2">
				<td>
				<select name="variant" id="" class="form-control variant">
					<?php $__currentLoopData = $variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($variant->id); ?>"><?php echo e($variant->name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
			    </td>
				<td class="text-center">
					<select name="variant_values[]" id="" class="variant_values" multiple="multiple">
						<option value="black">Black</option>
						<option value="Blue">Blue</option>
						<option value="Green">Green</option>
					</select>
				</td>
				<td class="text-center"><button class="btn btn-sm btn-success addRow btn-pill"><i class="fa fa-plus-circle"></i></button></td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="1"></td>
				<td class="pt-2 text-center"><button class="btn btn-dark btn-sm" id="addNewVariant"><i class="fa fa-plus-circle"></i> Add new variant</button></td>
				<td class="pt-2 text-center"><button class="btn btn-dark btn-sm setVariant btn-pill"><i class="fa fa-check-circle"></i> Set</button></td>
			</tr>
		</tfoot>
	</table>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c)): ?>
<?php $component = $__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c; ?>
<?php unset($__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Modal::class, []); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'addVariantModal','aria-labelledby' => 'addVariantModal']); ?>
	<div class="card-header">
		<div class="col-md-6">
			<label for="" class="form-label strong"><strong>Variant Name</strong> </label>
			<input type="text" class="form-control" name="variant_name" class="variant_name" id="variant_name">
		</div>

	</div>
	<table>
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c)): ?>
<?php $component = $__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c; ?>
<?php unset($__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c); ?>
<?php endif; ?>
<div class="container-fluid">
	<div class="row">
	    <div class="col-sm-12 mt-1">
			<div class="card">
			
				<div class="card-body">
				<h4  class="bg-white text-primary p-3  rounded"><?php if(isset($product)): ?>Update <?php else: ?> Add <?php endif; ?> Product</h4>
					<div class="row">
						<div class="col-sm-6 col-md-3">
							<div class="mb-3 mt-1  shadow">
								<img src=" <?php if(isset($product)): ?>	/<?php echo e($product->image); ?> <?php else: ?> <?php echo e(asset('assets/images/product/1.png')); ?> <?php endif; ?>" class="img-thumbnail" id="img_prv">
							</div>
						</div>
						<div class="col-md-9">
							<form id="product_form">
								<div class="row">
									<div class="col-md-12">
										<div class="mb-3">
											<label class="form-label">Product Title</label>
											<input class="form-control" type="text" value="<?php echo e(@$product->name); ?>" placeholder="Title/name" data-bs-original-title="" id="name" required>
										</div>
									</div>

									<div class="col-sm-6 col-md-6">
										<div class="mb-3">
											<label class="form-label">Category</label>
											<select class='form-control' required id="category">
												<option selected disabled>__Select__</option>
												<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($category->id); ?>" <?php if(isset($product) && $category->id == $product->category): ?>selected <?php endif; ?>><?php echo e($category->name); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
									</div>
									<div class="col-sm-6 col-md-6">
										<div class="mb-3">
											<label class="form-label">Subcategory</label>
											<select class='form-control' id="sub_category">
												<option selected disabled required> __Select__</option>
												<?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($category); ?>"  <?php if(isset($product) && $category == $product->sub_category): ?>selected <?php endif; ?>><?php echo e($category); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
									</div>
									<div class="col-sm-6 col-md-12">
										<div class="mb-3">
											<label class="form-label">Search Tags <small>(, Seperated tags)</small></label>
											<select class="form-control" multiple="multiple" id="tags_json">
												<?php if(isset($product)): ?>
												<?php $__currentLoopData = json_decode($product->tags_json); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($tag); ?>" selected><?php echo e($tag); ?></option>
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
									<label class="form-label">Upload Main Image <small>*(jpg and png) </small></label>
									<input class="form-control" type="file" placeholder="Email" data-bs-original-title="" title="" id="image">
								</div>
							</div>
							
							<div class="col-sm-6 col-md-2 text-center justify-content-center">
								<div class="mb-3">
									<label class="form-label">on Offer? </label><br>
									<label class="switch">
										<input type="checkbox" checked="" data-bs-original-title="" title="" id="on_offer"><span class="switch-state"></span>
									</label>
								</div>
							</div>
							<div class="col-sm-6 col-md-2">
								<div class="mb-3">
									<label class="form-label">Current Price <i class="fa fa-inr"></i> </label>
									<input class="form-control" type="number" placeholder="Current Price " value="<?php echo e(@$product->pre_price); ?>" data-bs-original-title="" title="" required id="pre_price">
								</div>
							</div>
							<div class="col-sm-6 col-md-2">
								<div class="mb-3">
									<label class="form-label">Offer Price <i class="fa fa-inr"></i></label>
									<input class="form-control" type="number" placeholder="Offer Price " value="<?php echo e(@$product->price); ?>" data-bs-original-title="" title="" required id="price">
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">Stock <small>(in units)*</small></label>
									<input class="form-control" type="number" placeholder="Stock in units" data-bs-original-title="" title="" value="<?php echo e(@$product->stock); ?>" min="0" id="stock">
								</div>
							</div>
							<div class="col-sm-6 col-md-2">
								<div class="mb-3">
									<label class="form-label" for="status">Status <small>(default Active)*</small></label><br>
									<label class="switch">
										<input type="checkbox" checked="<?php echo e(@!empty($product->status)); ?>" data-bs-original-title="" title="" id="status"><span class="switch-state bg-success"></span>
									</label>
								</div>
							</div>
							<div class="col-sm-6 col-md-2 pt-4  justify-content-center">
								<div class="mb-3">
									<button class="btn  btn-outline-primary btn-rounded btn-pill shadow btn-block" id="setUpload" type="button"><i class="fa fa-image"></i> Add images</button>
								</div>
							</div>
							<div class="col-sm-6 col-md-2 pt-4  justify-content-center">
								<div class="mb-3">
									<button class="btn btn-outline-primary btn-rounded btn-pill shadow btn-block" type="button" id="setPrice"><i class="fa fa-inr"></i> Add prices</button>
								</div>
							</div>
							<div class="col-sm-6 col-md-3 pt-4  justify-content-center">
								<div class="mb-3">
									<button class="btn btn-outline-primary btn-rounded btn-pill shadow btn-block" type="button" id="setVariant"><i class="fa fa-code-fork"></i> Add varients</button>
								</div>
							</div>
							<div class="col-md-12 mb-3">
								<div>
									<label class="form-label">Product Description</label>
									<textarea class="form-control" rows="4" placeholder="Enter About your description" required id="description" >
									<?php echo e(@$product->description); ?>										
									</textarea>
								</div>
							</div>
							<div class="row">
							
								<div class="col-md-6">
									<button class="btn btn-block btn-primary " id="submit"><i class="fa fa-arrow-up">  <?php if(isset($product)): ?> Update <?php else: ?> Create <?php endif; ?> product</i>  </button>
									<button class="btn btn-block btn-dark " ><i class="fa fa-eye"> Preview</i> </button>
									<a href="/management/product/list" class="btn btn-success"> <i class="fa fa-eye"> See all products</i></a>
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
	let product_has_images;
	let response;
	let product_has_variants;
	let variant_values;
	let product_has_quantities;
	let img_path;

	img_path = "<?php echo e(@$product->image); ?>"
	$("#setPrice").on("click", function() {
		$("#setPriceModal").modal("show")
	})
	$("#setUpload").on("click", function() {
		$("#setUploadModal").modal("show")
	})
	$("#addNewVariant").on("click", function() {
		$("#setVariantModal").modal("hide")
		$("#addVariantModal").modal("show")
	})

	$("#setVariant").on("click", function() {
		$("#setVariantModal").modal("show")
	})
	
	$(".modal-content").on("click", ".setData", function() {
		let tableData = []
		let tableColumn = []
		let table = $(this).closest("table")
		tableData = $($(table).find("tbody").find("tr")).map(function(index, elem) {
			let row = {};
			row.quantity = $(this).find(".quantity").val()
			row.price = $(this).find(".price").val()
			return row
		}).get()
		
		product_has_quantities = tableData.filter((elem,key)=>{
			return "" != elem.quantity ||  "" != elem.price
		})
		$("#setPrice").addClass("active").append("<i class='fa fa-check-circle></i>'")
		console.log("product_has_quantities", product_has_quantities)
	})
	$(".modal-content").on("click", ".setVariant", function() {
		let tableData = []
		let tableColumn = []
		let table = $(this).closest("table")
		tableData = $(table).find("tbody").find("tr").map(function(index, elem) {
			let row = {};
			row.varient_id = $(elem).find(".variant").val()
			row.variant_value_list = $(elem).find(".variant_values").val()
			return row
		}).get()
		
		product_has_variants = tableData.filter((elem,key)=>{
			return elem.variant_value_list.length > 0
		})
		$("#setVariant").addClass("active")
		console.log("product_has_variants", product_has_variants)
	})




	// $(".variant").select2()
	$("#tags_json").select2({
		tags: true,
		tokenSeparators: [','],
	})
	$(".variant_values").select2({
		tags: true,
		tokenSeparators: [','],
	})
	$(".modal-content").on("change", ".variant", function() {
		let variant_id = $(this).val()
		try {
			$(this).closest("tr").find(".variant_values").closest("td").html($(this).closest("tr").find(".variant_values").clone())
		} catch (error) {
			
		}
		
		$(this).closest("tr").find(".variant_values").select2({
			tags: false,
			ajax: {
				"url": "/api/select-2/variantHasValue/label",
				"method": "get",
				delay: 600,
				minimumResultsForSearch: -1,
				data: function(params) {
					var query = {
						search: params.term,
						filters: [
							{
								field:"variant_id",
								value:variant_id
							}
						]
					}
					return query;
				},
				processResults: function(response) {
					return {
						results: response
					};

				},

			},

		})
	})


	$("#submit").on('click', async function(e) {
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
						400: function() {
							hideoverlay($("#product_form"))
							notify({
								message: "Please upload valid image file"
							}, {
								type: 'danger',
								z_index: 10000,
								timer: 2000,
							});
						},
						500: function() {
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

			await	$.ajax(settings).done(async function(response) {
					hideoverlay($("#product_form"))	
					var json_response = JSON.parse(response);
				    img_path = json_response.data;
						$.notify({
							message: "Image uploaded successfully"
						}, {
							type: 'success',
							z_index: 10000,
							timer: 2000,
						})
			    	});
			} else {
				hideoverlay($("#product_form"));
							
			}
			
					var form = new FormData();
					// form.append("table_name", "products");
					form.append("name", $("#name").val());
					form.append("description", $("#description").val());
					// form.append("centre_id", $("#centre_id").val());
					form.append("category", $("#category").val());
					form.append("image", img_path);
					form.append("tags_json", JSON.stringify($("#tags_json").val()));
					form.append("sub_category", $("#sub_category").val());
					form.append("pre_price", $("#pre_price").val());
					form.append("price", $("#price").val());
					form.append("on_offer", $("#on_offer").prop("checked") ? "1" : "0");
					form.append("stock", $("#stock").val());
					form.append("status", $("#status").prop("checked") ? "1" : "0");
					// form.append("sold_times", $("#sold_times").val());
					form.append("product_has_images", JSON.stringify(product_has_images));
					form.append("product_has_variants", JSON.stringify(product_has_variants));
					form.append("product_has_quantities", JSON.stringify(product_has_quantities));
					// form.append("table_model", "Product");

					var settings = {
						"url":  "<?php if(isset($product)): ?> /api/update-product/<?php echo e(@$product->id); ?>  <?php else: ?> /api/create-product <?php endif; ?>",
						"method": "POST",
						"timeout": 0,
						"processData": false,
						"mimeType": "multipart/form-data",
						"contentType": false,
						"data": form,
						statusCode: {
							400: function() {
								hideoverlay($("#product_form"))
								//  = JSON.parse();
								$.notify({
									message: "Something went wrong !"
								}, {
									type: 'danger',
									z_index: 10000,
									timer: 2000,
								});
							},
							500: function() {
								hideoverlay($("#product_form"))
								// response = JSON.parse(response);
								$.notify({
									message: "Something went wrong !"
								}, {
									type: 'danger',
									z_index: 10000,
									timer: 2000,
								})
							}
						}
					};

					await $.ajax(settings).done(function(response) {
						var response2 = JSON.parse(response)
						hideoverlay($("#product_form"));
						$.notify({
							message: response2.message
						}, {
							type: 'success',
							z_index: 10000,
							timer: 2000,
						})
						// window.open("/management/product/edit/"+response2.data.id,"_self");
					}, function() {
						
					});
			//	
		} else {
			alert("please check the form again")
		}
	})


	function uploadProgressHandler(event) {
		// $("#loaded_n_total").html("Uploaded " + event.loaded + " bytes of " + event.total);
		var percent = (event.loaded / event.total) * 100;
		var progress = Math.round(percent);
		// $("#uploadProgressBar").html(progress + " percent na ang progress");
		$("#uploadProgressBar").css("width", progress + "%");
		$("#statusText").append(progress + "% uploaded... please wait");
	}

	function loadHandler(event) {
		// $("#statusText").html("Uploaded successfully");
		$("#uploadProgressBar").animate("width", "100%");
	}

	function errorHandler(event) {
		$(".statusText").html("Upload Failed");
	}

	function abortHandler(event) {
		$(".statusText").html("Upload Aborted");
	}
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
			var image_path;
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
			form.append("image", image_path);
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

	$("#uploadFile").click(function(event) {
		event.preventDefault();
		loadoverlay($("#setUploadModal"))
		product_has_images = []
		$(".varImage").each(async function(key, val) {
			var file = $(this)[0].files[0];
			if(file){
			var form = new FormData();
			form.append("image", file);
			form.append("table_name", "products");
			form.append("table_model", "Product");
			form.append("folder_name", "product_variant_image");
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
							$(val).closest("td").find(".statusText").html(progress + "% uploaded");
						},
						false
					);
					xhr.addEventListener("load", function(e) {
						// loadHandler(e)
						console.log(JSON.parse(e.target.responseText).data, "response")
						response = JSON.parse(e.target.responseText)


					}, false);
					xhr.addEventListener("error", errorHandler, false);
					xhr.addEventListener("abort", abortHandler, false);

					return xhr;
				}
			});
			$(val).closest("td").find(".image_path").val(response.data)
			}		
			let row = $(val).closest("tr")
			product_has_images.push({
				image:  row.find(".image_path").val(),
				status: row.find(".product_image_status").prop("checked") ? "1" : "0"
			})
			product_has_images = product_has_images.filter((elem,key)=>{
                return "" != elem.image
			})
			
			// $(val).closest("td").find(".statusText").append("<p class='text-success'>Image [" + (key + 1) + "] uploaded successfully:<br> image-url <a href='/" + response.data + "' target='blank'>Click to open image [" + (key + 1) + "]</p>")

		})
		console.log(product_has_images,"product_has_images")
		hideoverlay($("#setUploadModal"))
		$("#setUpload").addClass("active").append("<i class='fa fa-check-circle></i>'")
	});
	<?php if(isset($product)): ?>
	$(".setData , #uploadFile , .setVariant").trigger("click")
	<?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/adminpanel/products/productedit.blade.php ENDPATH**/ ?>