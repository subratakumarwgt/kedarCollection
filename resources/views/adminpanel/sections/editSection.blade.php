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
<input type="hidden" id="section_id" value="{{@$section->id}}">

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="bg-white text-primary p-3  rounded">@if(isset($section))Update @else Add @endif Section</h4>
            <div class="row">
                <div class="col-md-12">
                    <form action="" id="sectionForm">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Section Name</label>
                                    <input class="form-control" type="text" placeholder="Caption" data-bs-original-title="" id="name" required value="{{@$section->name}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Section SLUG</label>
                                    <input class="form-control" type="text" placeholder="Caption" data-bs-original-title="" id="slug" required readonly value="{{@$section->slug}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Section Caption</label>
                                    <input class="form-control" type="text" placeholder="Caption" data-bs-original-title="" id="title" required value="{{@$section->title}}">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Section Sub-Caption</label>
                                    <input class="form-control" type="text" placeholder="Sub Caption" data-bs-original-title="" id="sub_title" required value="{{@$section->sub_title}}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 p-2">
                                <div class="mb-3 border border-right p-2">
                                    <label class="form-label p-1"> <strong>Section Background Image </strong></label>
                                    <div class="input-group"><input class="form-control banners_json varImage" type="file" placeholder="" data-bs-original-title="" required>
                                        <div class="input-group-append border"><button type="button" class="btn addImage bg-light text-primary" onclick="addImageInput()" disabled><i class="fa fa-plus"></i></button></div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6 col-md-2 p-2">
                                <div class="mb-3 border border-right p-2">
                                    <label for=""><strong>Status</strong> </label>
                                    <div class="icon-state switch-outline ">
                                        <label class="switch">
                                            <input type="checkbox" @if(!empty($section->status)) checked="" @endif data-bs-original-title="" title="" id="section_status"><span class="switch-state  bg-success shadow-sm"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 p-2">
                                <div class="mb-3 border border-right p-2">
                                    <label for=""><strong>Redirect URL</strong> </label>
                                    <input type="text" title="" id="redirect_url" class="form-control"  value="{{@$section->redirect_url}}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 p-2">
                                <div class="mb-3 border border-right p-2">
                                    <label for=""><strong>Redirect TEXT</strong> </label>
                                    <input type="text" title="" id="redirect_text" class="form-control" value="{{@$section->redirect_text}}">
                                </div>

                            </div>
                            <div class="col-sm-10 col-md-12 p-2  justify-content-center">
                                <div class="border table-responsive">
                                    <table class="table resourceTable">
                                        <thead>
                                            <tr>
                                                <th colspan="11" class="text-primary h6 text-center">
                                                    <i class="fa fa-file"></i> Resources
                                                </th>
                                                <th colspan="1">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="resource_body">
                                            @if(empty(array_keys($section->items->groupBy("model")->toArray())))
                                            <tr class="resourceTableRow">
                                        <td colspan="11">
                                        <div class="mb-3  p-2 border">
                                        <label class="form-label p-2"><strong class="p-2"> Select Resource </strong></label>   
                                        <div class="pull-right p-2">
                                        <x-modal  aria-labelledby="selectItemModal">
                                            <div class="p-2">
                                                <button type="button" class="setSelectedData btn btn-success btn-pill btn-sm"><i class="fa fa-check-circle"></i> Select</button>
                                            </div>
                                        </x-modal>
                                        <select name="" class="form-control select_resource" style="width: 300px;" id="">
                                            <option value="">Select a resource</option>
                                            <option value="Product">Product</option>
                                            <option value="Offer">Offer</option>
                                            <option value="Category">Category</option>
                                            <option value="Collection">Collection</option>
                                        </select>
                                        </div>                                   
                                        <table class="table itemtable">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Items</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="itemBody">
                                                <tr class="itemTableRow">                                                    
                                                    <td>
                                                        <select name="" id="" class="item_id m-1 form-control" >
                                                            <option value="0">Select a Item</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <div class="text-center text-end icon-state switch-outline switch-sm m-1 ">
                                                            <label class="switch">
                                                                <input type="checkbox" data-bs-original-title="" title="" class="item_status" id=""><span class="switch-state  bg-success shadow-sm"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-pill btn-success btn-sm m-1 addRow"><i class="fa fa-plus-circle"></i></button>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                </table>
                                                </div>
                                                </td>
                                                <td class="text-center" colspan="1">
                                                <button type="button" class="btn btn-pill btn-success btn-sm m-1 addRow"><i class="fa fa-plus-circle"></i></button>
                                                </td>
                                            </tr>
                                            @endif  
                                            @foreach(array_keys($section->items->groupBy("model")->toArray()) as $key => $model)
                                           
                                            <tr class="resourceTableRow">
                                                <td colspan="11">
                                                    <div class="mb-3  p-2 border">
                                                        <label class="form-label p-2"><strong class="p-2"> Select Resource </strong></label>
                                                        <div class="pull-right p-2">
                                                            <x-modal aria-labelledby="selectItemModal">
                                                                <div class="p-2">
                                                                    <button type="button" class="setSelectedData btn btn-success btn-pill btn-sm"><i class="fa fa-check-circle"></i> Select</button>
                                                                </div>
                                                            </x-modal>
                                                            <select name="" class="form-control select_resource" style="width: 300px;" id="">
                                                                <option value="">Select a resource</option>
                                                                @foreach($elements as $elem)
                                                                <option value="{{$elem}}" @if($elem == $model) selected @endif>{{$elem}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <table class="table itemtable">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th>Items</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="itemBody">
                                                               @php($ids = 0)
                                                               
                                                                @foreach($section->items->where("model",$model) as $key1 => $row)                                                              
                                                                <tr class="itemTableRow">
                                                                    <td>
                                                                        <select name="" id="" class="item_id m-1 form-control">
                                                                            <option value="0">Select a Item</option>
                                                                            @php($models = "\\App\\Models\\". $model)
                                                                            @php($models = new $models())
                                                                            @php($models = $models->all())
                                                                            @foreach($models as $el)
                                                                            <option value="{{$el->id}}" @if($row->model_id ==$el->id ) selected @endif>{{$el->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-center text-end icon-state switch-outline switch-sm m-1 ">
                                                                            <label class="switch">
                                                                                <input type="checkbox" @if(!empty($item->status))checked @endif data-bs-original-title="" title="" class="item_status" id=""><span class="switch-state  bg-success shadow-sm"></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        @if($ids == 0)
                                                                        <button type="button" class="btn btn-pill btn-success btn-sm m-1 addRow"><i class="fa fa-plus-circle"></i></button>
                                                                        @else
                                                                        <button type="button" class="btn btn-pill btn-danger btn-sm m-1 removeRow"><i class="fa fa-minus-circle"></i></button>
                                                                        
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                @php($ids++)
                                                                @endforeach
                                                               
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                                <td class="text-center" colspan="1">
                                                     @if($key == 0)
                                                    <button type="button" class="btn btn-pill btn-success btn-sm m-1 addRow"><i class="fa fa-plus-circle"></i></button>
                                                    @else
                                                    <button type="button" class="btn btn-pill btn-danger btn-sm m-1 removeRow"><i class="fa fa-minus-circle"></i></button>
                                                    @endif
                                                </td>
                                            </tr>                                      
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2 border-top pt-3">
                                <div class="mb-3">
                                    <button type="button" class="btn btn-sm btn-primary" id="createSection"><i class="fa fa-arrow-up"></i> @if(isset($section))Update @else Create @endif section</button>
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
    var model;
    $("#name").on("change", function() {
        $('#slug').val($(this).val().toLowerCase().replace(" ", "_"))
    })

    $(".resource_body").on("change", ".select_resource", async function() {
        let options = [];
        await $.get(`/api/select-2/${$(this).val()}/name`, function(response) {
            options = response.map((elem) => {
                return new Option(elem.text, elem.id);
            })
        })
        $(this).closest("tr").find(".itemtable").find(".item_id").html(options)
    })
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
    $(".selectProduct").on("click", function() {
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
    let items = []
    let details = {}
    let images = []
    images[0] = {
        image:"{{$section->background_image}}",
        status: "1"
    } 
    let  background_image ;
    background_image = "{{$section->background_image}}" 
    let section = {}
    $(".setSelectedData").on("click", function() {
        selectedProducts = getSelectedItems($(this).closest("table"))
        $(".removeRow").trigger("click")
        selectedProducts.forEach((value, key) => {
            $(".item_id").last().val(value).trigger("change")
            if ((selectedProducts.length - 1) > key)
                $(".addRow").trigger("click")
        })
    })
    $("table").on("change", ".item_id", function() {
        match = $(this).val()
        let selected = $(this).closest("tbody").find(".item_id").filter(function(num, elem) {
            return $(elem).val() == match
        })
        if (selected.length > 1) {
            $(this).val(0)
            $.notify({
                message: "Cannot select same item twice"
            }, {
                type: 'danger',
                z_index: 10000,
                timer: 2000,
            })
        }
    })
    $("#createSection").on("click", function(event) {
        event.preventDefault();
        if ($("#sectionForm").valid()) {
            $(this).prop("disabled", true)
            loadoverlay($(this))
            let section_has_images = []
            if ($(".item_id").filter(function(key, val) {
                    return $(val).val() != 0
                }).length == 0) {
                $.notify({
                    message: "No items selected. atlist select one item"
                }, {
                    type: 'danger',
                    z_index: 10000,
                    timer: 2000,
                })
                hideoverlay($(this))
                $(this).prop("disabled", false)
                return 0;
            }

            all_images = new Promise((resolve, reject) => {
                    $(".varImage").each(async function(key, val) {
                        var file = $(this)[0].files[0];
                        if (file) {
                            var form = new FormData();
                            form.append("image", file);
                            form.append("table_name", "sections");
                            form.append("table_model", "section");
                            form.append("folder_name", "section_variant_image");
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
                                                message: "Image uploading... " + percent + "%"
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
                                    xhr.addEventListener("error", function() {
                                        $.notify({
                                            message: "Image uploading failed"
                                        }, {
                                            type: 'danger',
                                            z_index: 10000,
                                            timer: 2000,
                                        })
                                        return 0
                                    }, false);
                                    xhr.addEventListener("abort", function() {
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
                            let row = $(val).closest("tr")
                        section_has_images.push({
                            image: response.data,
                            status: "1"
                        })
                        section_has_images = section_has_images.filter((elem, key) => {
                            return "" != elem.image
                        })
                        background_image = response.data 
                        }
                        

                        if ((key + 1) == $(".varImage").length)
                            resolve(section_has_images)

                        // $(val).closest("td").find(".statusText").append("<p class='text-success'>Image [" + (key + 1) + "] uploaded successfully:<br> image-url <a href='/" + response.data + "' target='blank'>Click to open image [" + (key + 1) + "]</p>")

                    })
                })
                .then((data) => {
                    // console.log(section_has_images,"section_has_images then",data,"data then")
                })
                .then((data) => {
                    images = section_has_images
                    // if (images.length == 0) {
                    //     $.notify({
                    //         message: "No images selected. atlist select one image"
                    //     }, {
                    //         type: 'danger',
                    //         z_index: 10000,
                    //         timer: 2000,
                    //     })
                    //     hideoverlay($(this))
                    //     $(this).prop("disabled", false)
                    //     return 0;
                    // }


                    items = $(".resourceTableRow").map(function(num, elem) {
                        let itemTableRow = $(elem).find(".itemTableRow")
                        let details = itemTableRow.map((key, val) => {
                            return {
                                item_id: $(val).find(".item_id").val(),
                                status: $(val).find(".item_status").prop("checked") ? "1" : "0",
                            }
                        }).get()
                        return {
                            model: $(elem).find(".select_resource").val(),
                            model_id_list: details

                        }
                    }).get()
                    section.name = $("#name").val()
                    section.title = $("#title").val()
                    section.sub_title = $("#sub_title").val()
                    section.slug = $("#slug").val()
                    section.background_image = background_image
                    section.user_id = $("#user_id").val()
                    section.redirect_url = $("#redirect_url").val()
                    section.redirect_text = $("#redirect_text").val()
                    section.items = items
                    section.status = $("#section_status").prop("checked") ? "1" : "0"
                    if ($("#section_id").val() != "")
                        section.section_id = $("#section_id").val()
                    console.log("section", section)

                    hideoverlay($(this))
                    $(this).prop("disabled", false)

                    $.post("/api/section/edit/" + $("#section_id").val(), section, function(response) {
                        $("#section_id").val(response.data.id)
                        $.notify({
                            message: response.message
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