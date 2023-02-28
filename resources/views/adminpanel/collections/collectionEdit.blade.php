@extends('adminpanel.master')
@section('title', 'Sample Page')

@section('css')
@stack("custom-css")
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Add New Content <i class="fas fa-plus"></i></h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Contents</li>
<li class="breadcrumb-item active">Add Contents</li>
@endsection

@section('content')
<input type="hidden" id="collection_id" value="{{@$collection->id}}">
<x-modal id="selectProductModal" aria-labelledby="selectProductModal">
    <x-select-product/>
    <div class="p-2">
        <button type="button" class="setSelectedData btn btn-success btn-pill btn-sm"><i class="fa fa-check-circle"></i> Select</button>
    </div>
</x-modal>
<div class="container-fluid">
    <div class="card">
                <div class="card-body">
                <div class="row"><div class="col-md-9 pull-left"><h4  class="bg-white text-primary p-3  rounded">Add Collection</h4></div>  <div class="col-md-3 pull-right"><a href="{{route('collection-list')}}" class="btn btn-primary btn-sm mr-3"><i class="fas fa-list"></i> Collection list</a></div></div>
                
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" id="collectionForm">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label">Collection Name</label>
                                        <input class="form-control" type="text" placeholder="Name" data-bs-original-title="" id="name" required value="{{@$collection->name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Collection Caption</label>
                                        <input class="form-control" type="text" placeholder="Caption" data-bs-original-title="" id="caption" required value="{{@$collection->title}}">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Collection Sub-Caption</label>
                                        <input class="form-control" type="text" placeholder="Sub Caption" data-bs-original-title="" id="sub_caption" required value="{{@$collection->sub_title}}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-5 p-2">
                                    <div class="mb-3 border border-right p-2" id="banner_holder">
                                        <label class="form-label p-1"> <strong> Collection Images </strong></label>
                                        @if(isset($collection))
                                        <table class="table">
                                            <tbody>
                                            @foreach($collection->images as $image)                                                                                  
                                                <tr>
                                                    <td class=""><img src="/{{$image->image}}" alt="" class="img-thumbnail exist_image" data-image = "{{$image->image}}" width="60px"></td>
                                                    <td><a href="/{{$image->image}}" class="link a m-1" target="blank" ><i class="fa fa-image"></i> View image</a></td>
                                                    <td> <div class="text-center text-end icon-state switch-sm switch-outline m-1 ">
                                                            <label class="switch">
                                                                <input type="checkbox" class="image_status" @if($image->status == "1")checked @endif data-bs-original-title="" title="" id=""><span class="switch-state  bg-success shadow-sm"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td><button class="btn btn-pill btn-sm btn-danger removeRow"><i class="fa fa-minus-square"></i></button></td>
                                                </tr>                                           
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @endif
                                        <div class="input-group"><input class="form-control banners_json varImage" type="file" placeholder="" data-bs-original-title="" required>
                                            <div class="input-group-append border"><button type="button" class="btn addImage bg-light text-primary" onclick="addImageInput()"><i class="fa fa-plus"></i></button></div>
                                        </div>
                                    </div>
                                     
                                </div>

                                <div class="col-sm-8 col-md-7 p-2 borer-left justify-content-center">
                                    <div class="mb-3  p-2 border">
                                        <label class="form-label p-2"> <strong class="p-2">Select Products  </strong>  </label>
                                        <div class="pull-right p-2"><button type="button" class="btn btn-pill btn-outline-dark shadow-sm btn-sm  selectProduct"> <i class="fa fa-check-square"></i> Select all products </button> </div> 
                                        <table class="table">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Product</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="productBody">
                                                @if(isset($collection))
                                                @foreach($collection->products as $key => $productE)
                                                @if($key == 0)
                                                <tr>
                                                    <td>
                                                        <select name="" id="" class="product_id m-1 form-control" >
                                                            <option value="0"> Select a product</option>
                                                            @foreach($products as $product)
                                                            <option value="{{$product->id}}" @if($productE->product_id == $product->id)selected @endif>{{$product->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <div class="text-center text-end icon-state switch-outline switch-sm m-1 ">
                                                            <label class="switch">
                                                                <input type="checkbox" class="product_status" id="" @if($productE->status == "1")checked @endif data-bs-original-title="" title="" ><span class="switch-state  bg-success shadow-sm"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-pill btn-success btn-sm m-1 addRow"><i class="fa fa-plus-circle"></i></button>
                                                    </td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <td>
                                                        <select name="" id="" class="product_id m-1 form-control" >
                                                            <option value="0"> Select a product</option>
                                                            @foreach($products as $product)
                                                            <option value="{{$product->id}}" @if($productE->product_id == $product->id)selected @endif>{{$product->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <div class="text-center text-end icon-state switch-outline switch-sm m-1 ">
                                                            <label class="switch">
                                                                <input type="checkbox" @if($productE->status == "1")checked @endif data-bs-original-title="" title="" class="product_status" id=""><span class="switch-state  bg-success shadow-sm"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-pill btn-danger btn-sm m-1 removeRow"><i class="fa fa-minus-circle"></i></button>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label for="">Status</label>
                                    <div class="icon-state switch-outline m-1 ">
                                        <label class="switch">
                                            <input type="checkbox" @if(isset($collection) && $collection->status == "1") checked="" @endif data-bs-original-title="" title="" id="collection_status"><span class="switch-state  bg-success shadow-sm"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 mt-2 border-top pt-3">
                                    <div class="mb-3">
                                       <button type="button" class="btn btn-sm btn-primary" id="createCollection"><i class="fa fa-arrow-up"></i> @if(isset($collection))Update @else Create @endif collection</button>
                                       <button type="button" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i> Preview</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>
          </div>
</div>

                    @endsection
                   
                    @section('script')

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

                        let selectedProducts = []
                        let products = []
                        let details = {}
                        let images = []
                        let collection = {}
$(".setSelectedData").on("click",function(){
    selectedProducts = getSelectedItems()
    $(".removeRow").trigger("click")
    selectedProducts.forEach((value,key)=>{
      
        $(".product_id").last().val(value).trigger("change")
        if((selectedProducts.length-1) > key)
        $(".addRow").trigger("click")

    })
})
$("table").on("change",".product_id",function(){
    match = $(this).val()
   let selected = $(".product_id").filter(function(num,elem){
    return $(elem).val() == match
   })
   if(selected.length > 1)
   {
    $(this).val(0)
    $.notify({
        message: "Cannot select same product twice"
    }, {
        type: 'danger',
        z_index: 10000,
        timer: 2000,
    })
   }
})
$("#createCollection").on("click",function(event) {
		event.preventDefault();
        if($("#collectionForm").valid()){     
        $(this).prop("disabled",true)
		loadoverlay($(this))
		let collection_has_images = []
        if($(".product_id").filter(function(key,val){
            return $(val).val() != 0
        }).length == 0)
       { 
        $.notify({
                    message: "No products selected. atlist select one product"
                }, {
                    type: 'danger',
                    z_index: 10000,
                    timer: 2000,
                })
                hideoverlay($(this))
                $(this).prop("disabled",false)
        return 0;    
        }

        all_images = new Promise((resolve,reject) => {
            $(".varImage").each(async function(key, val) {
			var file = $(this)[0].files[0];
            let response = {}
		if(file){
            console.log("hello1")
			var form = new FormData();
			form.append("image", file);
			form.append("table_name", "collections");
			form.append("table_model", "collection");
			form.append("folder_name", "collection_variant_image");
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
							$.notify({
                                message: "Image uploading... "+percent+"%"
                            }, {
                                type: 'warning',
                                z_index: 10000,
                                timer: 2000,
                            })
						},
						false
					);
					xhr.addEventListener("load", function(e) {
						// loadHandler(e)
						console.log(JSON.parse(e.target.responseText).data, "response")
						response = JSON.parse(e.target.responseText)


					}, false);
					xhr.addEventListener("error", function(){
                        $.notify({
                            message: "Image uploading failed"
                        }, {
                            type: 'danger',
                            z_index: 10000,
                            timer: 2000,
                        })
                        return 0
                    }, false);
					xhr.addEventListener("abort", function(){
                        $.notify({
                            message: "Image uploading aborted"
                        }, {
                            type: 'danger',
                            z_index: 10000,
                            timer: 2000,
                        })
                        return 0
                    }, false);

					return xhr;
				}
			});
			collection_has_images.push({
				image: response.data,
				status: "1"
			})
			collection_has_images = collection_has_images.filter((elem,key)=>{
                return "" != elem.image
			})
		}		
			
            if((key+1) == $(".varImage").length)
            resolve(collection_has_images)
			
			// $(val).closest("td").find(".statusText").append("<p class='text-success'>Image [" + (key + 1) + "] uploaded successfully:<br> image-url <a href='/" + response.data + "' target='blank'>Click to open image [" + (key + 1) + "]</p>")

		 })
        })
        .then((data) => {
            console.log(collection_has_images,"collection_has_images then",data,"data then")
        })
        .then((data)=>{
            let existImage = []
            existImages = $(".exist_image").map((key,val)=>{
                return {
                    image:$(val).data("image"),
                    status:$(val).closest("tr").find(".image_status").prop("checked") ? "1" : "0"
                }
            }).get()
            images = collection_has_images.concat(existImages)
        if(images.length == 0)
        { 
        $.notify(
                {
                message: "No images selected. atlist select one image"
                }, 
                {
                type: 'danger',
                z_index: 10000,
                timer: 2000,
                })
            hideoverlay($(this))
            $(this).prop("disabled",false)
            return 0;    
            }

       
        products = $(".productBody tr").map(function(num,elem){
            return {
                product_id:$(elem).find(".product_id").val(),
                status:$(elem).find(".product_status").prop("checked") ? "1" : "0",
            }
        }).get()
        collection.name = $("#name").val()
        collection.title = $("#caption").val()
        collection.sub_title = $("#sub_caption").val()
        collection.images = images
        collection.user_id = $("#user_id").val()
        collection.products = products
        collection.status = $("#collection_status").prop("checked") ? "1": "0"
        if($("#collection_id").val() != "")
        collection.collection_id = $("#collection_id").val()
        console.log("collection",collection)

		hideoverlay($(this))
        $(this).prop("disabled",false)

         $.post("/api/collection/edit/"+$("#collection_id").val(),collection,function(response){
            $("#collection_id").val(response.data.id)
                $.notify({
                    message: "Collection updated successfully"
                }, {
                    type: 'success',
                    z_index: 10000,
                    timer: 2000,
                })
         })
        
        })

		

        }
		
	});
 
   
   
</script>

@endsection