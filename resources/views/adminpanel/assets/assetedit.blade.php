@extends('adminpanel.master')
@section('title', 'Sample Page')

@section('css')
@endsection

@section('style')

@endsection

@section('breadcrumb-title')
<h3>Asset Edit</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Assets</li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-body">
            <form  id="asset_form" class="" novalidate="" enctype="multipart/form-data" method="post" action="/management/centre/import/data">
            <input type="hidden" id="asset_id" value="{{$asset->id}}">
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label mt-5" for="" >Asset Title</label>                                   
									<div class="col-sm-6">
										<input class="form-control mt-5" id="title" required  type="text" readonly placeholder="Asset Title" value="{{$asset->title}}">
                                       
									</div>
								</div>
                                <div class="mb-3 row">
									<label class="col-sm-3 col-form-label" for="">List</label>
									<div class="col-sm-6">
										<select multiple="multiple" class="form-control " id="asset_list" required> 
                                            @foreach(json_decode($asset->list_json) as $list)
                                            <option value="{{$list}}" selected>{{$list}}</option>
                                            @endforeach
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
@endsection

@section('script')
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

@endsection