
@extends('adminpanel.master')
@section('title', 'Sample Page')

@section('css')
<style type="text/css">
  .float{
    position: absolute;
    right: 5px;
    top:0px;
    margin: 1px;
  }
  .action_label{
    cursor: pointer;
  }
  .select2-dropdown {
  z-index: 9001 !important;
}
</style>
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Modules & Permissions</h3>


@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Module</li>
<li class="breadcrumb-item active">Modules & Permissions</li>
@endsection

@section('content')
<input type="hidden" id="view_type_in"  value="{{$view_type}}">
<input type="hidden" id="view_type_id_in"  value="{{$view_type_id}}">
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                     <form action="" id="config_form">
                       <div class="modal-header">
                         <h5>   <i class="fa fa-cogs"></i> Setup
                    </h5>
                       </div>
                        <div class="modal-body">
                         
                            <div class="form-group p-1 mt-2">
                              <label for="view_type">
                              Permission type
                              </label>
                              <select class="form-control" name="view_type" id="view_type" >
                              <option value="" selected disabled>Select permission type</option>
                                <option value="role">Role</option>
                                <option value="user">User</option>
                              </select>
                            </div>
                            <div class="form-group p-1 mt-2">
                              <label for="view_type">
                             Select type
                              </label>
                              <select class="form-control" name="view_type_id" id="view_type_id" >
                              <option value="" selected disabled>Select a resource</option>
                              
                              </select>
                            </div>
                           
                         
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-dark shadow-sm btn-block" type="submit"> Proceed <i class="fa fa-arrow-right"></i> </button>
                        </div>
                        </form>
                     </div>
                  </div>
               </div>
<div class="row justify-content-center">
<div class="col-md-12 p-0">
    <div class="card">
  
        <div class="card-body table-responsive" id="module_chart">
        <button class="btn btn-outline-dark  btn-sm shadow"  data-bs-toggle="modal" data-bs-target="#exampleModalCenter"> <i class="fa fa-cogs"></i> Setup</button>

          <div class="row ">
          <div class="m-2 p-3"> Showing permissions for: <strong id="view_type_view">{{@$resource->name}} ({{ucfirst(@$view_type)}})</strong></div>
          </div>
          
            <table class="table table-bordered  shadow" id="module_permission_table">
                <tr>
                    <th class="shadow text-center bg-warning text-dark ">Modules & Permissions

                    <div class="text-center switch-sm icon-state">
								<label class="switch">
								<input type="checkbox"  data-bs-original-title="" title="" class="module_permission_switch" ><span class="switch-state shadow-sm"></span>
								</label>
							</div>
                    </th>
                    @foreach($unique_permissions as $unique_permission)
                    <th class=" bg-light ">{{str_replace("_"," ",ucfirst($unique_permission))}}
                    <span class="text-left align-bottom switch-sm icon-state switch-outline">
								<label class="switch">
								<input type="checkbox"  data-bs-original-title="" title="" class="unique_permission_switch" data-unique_permission = "{{$unique_permission}}"><span class="switch-state shadow-sm bg-dark"></span>
								</label>
							</span>
                    </th>
                    @endforeach
                </tr>
                @foreach($modules as $module)
                <tr>
                    <td  class="shadow-sm  bg-light" style="width: 250px;">
                      <i class="{{$module->icon}}"></i>  {{$module->name}}
                      <span class="text-right switch-sm icon-state switch-outline align-bottom">
								<label class="switch">
								<input type="checkbox"  data-bs-original-title="" title="" class="unique_module_switch" data-module = "{{$module->slug}}" data-unique_permission = "{{$unique_permission}}" ><span class="switch-state shadow-sm bg-dark"></span>
								</label>
							</span>
                    </td>
                    @foreach($unique_permissions as $unique_permission)
                   
                    @if(!empty($module->{$unique_permission}->name))
                    <th class="text-center text-end icon-state switch-outline p-1 pt-3 pb-3 shadow-sm bg-light">
                    <label class="switch ">
				<input type="checkbox" data-bs-original-title="" title="" data-permission="{{$module->{$unique_permission}->name}}" id="{{$module->{$unique_permission}->name}}" data-module = "{{$module->slug}}" class="permission_switch" data-unique_permission = "{{$unique_permission}}"><span class="switch-state bg-success shadow"></span>
								</label>    </th>
                @else
                <th class="bg-light"></th>

                    @endif
                
                    @endforeach
                </tr>

                @endforeach
            </table>
            <div class="p-4 bg-light"> <button class="btn btn-primary btn-sm " id="save_permission"><i class="fa fa-check"></i> Save</button>
        <button class="btn btn-secondary btn-sm " id="reset_permission"><i class="fa fa-refresh"></i> Reset</button></div>
    </div>
 
</div>
</div>
</div>
@endsection
@section("script")
<script>

    let permissions = ["create_centre_management","delete_centre_management"];

    let view_type = $("#view_type_in").val(); // can be either user wise or role wise

    let view_type_id = $("#view_type_id_in").val();// if user then user->id/ else role->id

    const setPermission = (permissions) => {
        permissions.forEach((element)=>{
        $("#"+element).prop("checked",true);
    })
    
    } 

    $(document).ready(function(){
     

    // $("#module_permission_table").DataTable({
    //         'processing': true})
      $(".unique_permission_switch").on("change",function(e){
        let unique_permission = $(this).data("unique_permission");
        let switch_state = $(this).prop("checked")
        switches = $(".permission_switch").filter(function(elem){
          return $(this).data("unique_permission") === unique_permission
        })
        switches.prop("checked",switch_state)
      })
      $(".unique_module_switch").on("change",function(e){
        let module_name = $(this).data("module");
        let switch_state = $(this).prop("checked")
        switches = $(".permission_switch").filter(function(elem){
          return $(this).data("module") === module_name
        })
        switches.prop("checked",switch_state)
      })
      $(".module_permission_switch").on("change",function(e){
      
        let switch_state = $(this).prop("checked")
        switches = $(".unique_module_switch");
        switches.prop("checked",switch_state).trigger("change")
        switches = $(".unique_permission_switch");
        switches.prop("checked",switch_state).trigger("change")
      })
      


      $("#view_type").on("change",function(){
  let view_type = $(this).val();
 console.log("hello",view_type)
  switch (view_type) {
    case "user":
    //  $("#view_type_id").select2().destroy();
    if ($('#view_type_id').hasClass("select2-hidden-accessible")) {
    $("#view_type_id").select2("destroy")
     }
      $("#view_type_id").select2(
        {
            tags: false,
            ajax: {
                "url": "/management/get-view-type",
                "method":"get",                
                delay: 600,
                minimumResultsForSearch: -1,
                data: function (params) {
                  var query = {
                      searchValue:view_type
                  }
                  return query;
           },
           processResults: function(response) {
                    response = JSON.parse(response);
                    console.log(response)
                    return {
                        results: response
                    };

                },

            },

      })
      
      break;

  case "role":
   // $("#view_type_id").select2().destroy();
   if ($('#view_type_id').hasClass("select2-hidden-accessible")) {
    $("#view_type_id").select2("destroy")
}
      $("#view_type_id").select2(
        {
            tags: false,
            ajax: {
                "url": "/management/get-view-type",
                "method":"get",                
                delay: 600,
                minimumResultsForSearch: -1,
                data: function (params) {
                  var query = {
                      searchValue:"role"
                  }
                  return query;
           },
           processResults: function(response) {
                    response = JSON.parse(response);
                    return {
                        results: response
                    };

                },

            },

      })
      
      break;
    break;
  
    default:
      break;
  }

  


})
  
  $("#exampleModalCenter").modal({
    backdrop: 'static',
    keyboard: false
  });
  $("#exampleModalCenter").modal("show")

  $("#config_form").on("submit",async function(e){
    e.preventDefault()
    if ($(this).valid()) {    
    loadoverlay($("#config_form"))
    if ($("#view_type_id").val() != "" && $("#view_type_id").val() != null ) {
      view_type_id = $("#view_type_id").val();
    }
    else{
      view_type_id = $("#view_type_id_in").val();
    }
    var form = new FormData();
form.append("view_type", $("#view_type").val());
form.append("view_type_id", view_type_id);
$("#view_type_id_in").val(view_type_id)


var settings = {
  "url": "/management/get-module-view-type",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form,
  error:function(){
    hideoverlay($("#config_form"))
    $.notify({
      message:"Something went wrong!"
   },{
    type:'danger',
    z_index:10000,
    timer:2000,
   });
  }
};

await $.ajax(settings).done(function (response) {
 response = JSON.parse(response)
 view_type =  $("#view_type").val()
 view_type_id =  $("#view_type_id_in").val()
 permissions = response.data
$("#view_type_view").html(`${response.resource.name} (${view_type})`)
 


});
setPermission(permissions)
hideoverlay($("#config_form"))
$("#exampleModalCenter").modal("hide")
}
  })

  if (view_type != "" && view_type != null) {
        $("#view_type").val(view_type).trigger("change")
        if (view_type_id != "" && view_type_id != null) {
         
          $("#view_type_id").val(view_type_id)
           $("#config_form").trigger("submit")
        }
      }



})

    

    $("#reset_permission").on("click",function(e){
        e.preventDefault()
        $(".permission_switch").each(function(){
            $(this).prop("checked",false);
        })
        setPermission(permissions)
    })

    $("#save_permission").on("click",async function(){
      if (!confirm("Are you sure?")) {
        return 0;
      }
      else
      loadoverlay($("#module_chart"))
    let has_access =  $(".permission_switch").filter(function(){
      return  $(this).prop("checked") 
    })
    let has_no_access =  $(".permission_switch").filter(function(){
      return  !$(this).prop("checked") 
    })
    has_access = has_access.map(function(elem){
        return $(this).data("permission")
    }).get()
   // console.log(has_access)
    
    has_no_access = has_no_access.map(function(elem){
        return $(this).data("permission")
    }).get()
      //  console.log(has_no_access)
var form = new FormData();
form.append("view_type", view_type);
form.append("view_type_id", $("#view_type_id_in").val());
form.append("has_access", has_access);
form.append("has_no_access", has_no_access);

var settings = {
  "url": "/management/modules-permission-update",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form,
  error:function(){
    hideoverlay($("#config_form"))
    $.notify({
      message:"Something went wrong!"
   },{
    type:'danger',
    z_index:10000,
    timer:2000,
   });
  }
};

await $.ajax(settings).done(function (response) {
  response = JSON.parse(response)
  permissions = response.permissions_given;
  $.notify({
      message:response.message
   },{
    type:'success',
    z_index:10000,
    timer:2000,
   });
});

hideoverlay($("#module_chart"))



    })

    
</script>
@endsection