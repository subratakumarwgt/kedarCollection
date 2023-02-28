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
<input type="hidden" id="page_id" value="{{@$page->id}}">

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="bg-white text-primary p-3  rounded">@if(isset($page))Update @else Add @endif Page</h4>
            <div class="row">
                <div class="col-md-12">
                    <form action="" id="pageForm">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Page Name</label>
                                    <input class="form-control" type="text" placeholder="Caption" data-bs-original-title="" id="name" required value="{{@$page->name}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Page SLUG</label>
                                    <input class="form-control" type="text" placeholder="Caption" data-bs-original-title="" id="slug" required readonly value="{{@$page->slug}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Page Caption</label>
                                    <input class="form-control" type="text" placeholder="Caption" data-bs-original-title="" id="title" required value="{{@$page->title}}">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Page Description</label>
                                    <input class="form-control" type="text" placeholder="description" data-bs-original-title="" id="description"  value="{{@$page->description}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="">Page Content</label>
                                        <textarea name="" id="text-box-body" class="form-control" rows="12">
                                            {!!$page->content!!}
                                        </textarea>
                                    </div>
                                </div>
                           
                            <div class="col-sm-6 col-md-2 p-2">
                                <div class="mb-3 border border-right p-2">
                                    <label for=""><strong>Status</strong> </label>
                                    <div class="icon-state switch-outline ">
                                        <label class="switch">
                                            <input type="checkbox" @if(!empty($page->status)) checked="" @endif data-bs-original-title="" title="" id="page_status"><span class="switch-state  bg-success shadow-sm"></span>
                                        </label>
                                    </div>
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
                                            @foreach(array_keys($page->items->groupBy("model")->toArray()) as $key => $model)
                                           
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
                                                            <option value="Section">Section</option>
                                                            <option disabled value="Offer">Offer</option>
                                                            <option disabled value="Category">Category</option>
                                                            <option disabled value="Collection">Collection</option>
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
                                                                @foreach($page->items->where("model",$model) as $key1 => $row)                                                              
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
                                                    <button type="button" class="btn btn-pill btn-success btn-sm m-1 addRow" disabled><i class="fa fa-plus-circle"></i></button>
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
                                    <button type="button" class="btn btn-sm btn-primary" id="createPage"><i class="fa fa-arrow-up"></i> @if(isset($page))Update @else Create @endif section</button>
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
<script src="{{asset('assets/js/editor/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('assets/js/editor/ckeditor/adapters/jquery.js')}}"></script>
<script src="{{asset('assets/js/email-app.js')}}"></script>

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
  
   
    let page = {}
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
    $("#createPage").on("click", function(event) {
        event.preventDefault();
        if ($("#pageForm").valid()) {
            $(this).prop("disabled", true)
            loadoverlay($(this))
            let page_has_images = []
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
                    page.name = $("#name").val()
        page.title = $("#title").val()
        page.slug = $("#slug").val()  
        page.description = $("#description").val()    
        page.user_id = $("#user_id").val()       
        page.items = items
        page.content = editor.getData()
        page.status = $("#page_status").prop("checked") ? "1": "0"
        if($("#page_id").val() != "")
        page.page_id = $("#page_id").val()
        console.log("page",page)

                    hideoverlay($(this))
                    $(this).prop("disabled", false)

                    $.post("/api/page/edit/" + $("#page_id").val(), page, function(response) {
                        $("#page_id").val(response.data.id)
                        $.notify({
                            message: response.message
                        }, {
                            type: 'success',
                            z_index: 10000,
                            timer: 2000,
                        })
                    })
                }

                })



    

  
</script>

@endsection