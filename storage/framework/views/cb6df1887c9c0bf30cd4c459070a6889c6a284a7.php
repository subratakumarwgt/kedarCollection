
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
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
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Module</li>
<li class="breadcrumb-item active">Module List</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<input type="hidden" id="created_by" value="<?php echo e(Auth::User()->id); ?>">
<input type="hidden" id="status" value="1">

<div class="modal fade modal-bookmark" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Add Module</h5>
                                          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>
                                       <div class="modal-body">
                                          <form class="form-bookmark needs-validation" id="contact-form" novalidate="">
                                             <div class="row g-2">
                                                <div class="mb-3 col-md-6 mt-0">
                                                   <label for="con-name">Name</label>
                                                   <div class="row">
                                                      <div class="col-sm-12">
                                                        <input type="hidden" id="module_id" value="">
                                                         <input class="form-control"  type="text" required="" id="name" placeholder="Module name" autocomplete="off">
                                                      </div>                                                    
                                                   </div>
                                                </div>
                                                <div class="mb-3 col-md-6 mt-0">
                                                   <label for="con-mail">Slug</label>
                                                 <input class="form-control" type="text" required="" autocomplete="off" id="slug" placeholder="Slug name"  readonly="">
                                                </div>
                                                 <div class="mb-3 col-md-6 mt-0">
                                                   <label for="con-mail">Route Name</label>
                                                 <input class="form-control" type="text" required="" onchange="checkRoute(this.value)"  autocomplete="off" id="route_name" placeholder="Route name" >
                                                </div>
                                                <div class="mb-3 col-md-6 mt-0">
                                                   <label for="con-mail">Url</label>
                                                 <input class="form-control" type="text" required="" autocomplete="off" id="url" placeholder="Url will be auto selected" readonly="" >
                                                </div>
                                               
                     
         
     
                                                <div class="mb-3 row mt-0">
                                                <div class="col-md-4 mb-3 border-right border-success">
                                                      <label for="con-phone">Has Child?</label>
                                                        <div class="col">
              <div class="m-t-15 m-checkbox-inline custom-radio-ml">
                <div class="form-check form-check-inline radio radio-primary">
                  <input class="form-check-input has_child" id="has_child_yes" type="radio" name="has_child" value="1" data-bs-original-title="" title="">
                  <label class="form-check-label mb-0" for="has_child_yes"><span class="digits"> Yes</span></label>
                </div>
                <div class="form-check form-check-inline radio radio-primary">
                  <input class="form-check-input has_child" id="has_child_no" type="radio" name="has_child" value="0" data-bs-original-title="" title="">
                  <label class="form-check-label mb-0" for="has_child_no"><span class="digits"> No</span></label>
                </div>
               
              </div>
            </div>
                                                      </div>
                                                       <div class="col-md-4 mb-3 border-right border-success">
                                                         <label for="con-phone">Is Header?</label>
                                                        <div class="col">
              <div class="m-t-15 m-checkbox-inline custom-radio-ml">
                <div class="form-check form-check-inline radio radio-primary">
                  <input class="form-check-input is_header" id="is_header" type="radio" name="is_header" value="1" data-bs-original-title="" title="">
                  <label class="form-check-label mb-0" for="is_header"><span class="digits"> Yes</span></label>
                </div>
                <div class="form-check form-check-inline radio radio-primary">
                  <input class="form-check-input is_header" id="radioinline2" type="radio" name="is_header" value="0" data-bs-original-title="" title="">
                  <label class="form-check-label mb-0" for="radioinline2"><span class="digits"> No</span></label>
                </div>
               
              </div>
            </div></div>
             <div class="col-md-4 mb-3 border-right border-success">
                                                      <label for="con-phone">Has Parent?</label>
                                                        <div class="col">
              <div class="m-t-15 m-checkbox-inline custom-radio-ml">
                <div class="form-check form-check-inline radio radio-primary">
                  <input class="form-check-input has_parent" id="has_parent_yes" type="radio" name="has_parent" value="1" data-bs-original-title="" title="">
                  <label class="form-check-label mb-0" for="has_parent_yes"><span class="digits"> Yes</span></label>
                </div>
                <div class="form-check form-check-inline radio radio-primary">
                  <input class="form-check-input has_parent" id="has_parent_no" type="radio" name="has_parent" value="0" data-bs-original-title="" title="">
                  <label class="form-check-label mb-0" for="has_parent_no"><span class="digits"> No</span></label>
                </div>
               
              </div>
            </div>
                                                      </div><div class="mb-3 col-md-6 mt-0">
                                                   <label for="con-mail">Parent Module</label>
                                                 <select class="form-control" id="parent_id">
                                                  <option value="">Select parent module</option>
                                                  <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <option value="<?php echo e($module->id); ?>"><?php echo e($module->name); ?></option>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                 </select>
                                                </div> 
<div class="mb-3 col-md-6 mt-0">
                                                   <label for="con-mail">ICON short code : <i class="fa fa-check" id="test_icon"></i></label>
<input type="text" name="icon" class="form-control" placeholder="enter icon. eg: fa fa-check " id="icon">
                                                 </div>


                                                      </div>   <div class="mb-3 col-md-8 mt-0">
                                                  <div class="row">
                                                  
                                                   <div class="mb-3">
                                                    <label for="con-mail">Add actions</label>
                                                    <div class="input-group">
      <input id="action_name" name="action_name" class="form-control btn-square" placeholder="Action name" type="text" data-bs-original-title="" title="" required="">
       <input class="form-control form-control-sm col-2" id="action_slug" type="text" placeholder="slug" aria-label="Recipient's username" data-bs-original-title="" title="" readonly=" required">
      <span class="input-group-text btn btn-warning text-dark btn-right add_action"><i class="fa fa-plus-circle"></i></span>
    </div>
                  
                  </div>
                </div>
                                                  </div>
            <h5>Select Actions </h5>
        
            <div class="row" id="action_row">
              <div class="col-3 p-4 shadow-sm  rounded border action_label border-bottom-success mb-3 " data-for="see_module">
              <input class="checkbox_animated actions" value="see_module" id="see_module" type="checkbox" data-bs-original-title="" title="">      
                                                        See Options 
                                                        <button class="btn btn-square btn-outline-danger btn-xs rounded float"><i class="fa fa-times"></i></button>
              </div>
              <div class="col-3 p-4 shadow-sm  rounded border action_label border-bottom-success mb-3 " data-for="create">
              <input class="checkbox_animated actions" value="create" id="create" type="checkbox" data-bs-original-title="" title="">      
                                                        Create 
                                                        <button class="btn btn-square btn-outline-danger btn-xs rounded float"><i class="fa fa-times"></i></button>
              </div>
              <div class="col-3 p-4 shadow-sm rounded border action_label border-bottom-success mb-3" data-for="create_own">
              <input class="checkbox_animated actions" value="create_own" id="create_own" type="checkbox" data-bs-original-title="" title="">                                                Create Own
               <button class="btn btn-square btn-outline-danger btn-xs rounded float"><i class="fa fa-times"></i></button>
              </div>
              <div class="col-3 p-4 shadow-sm rounded border action_label border-bottom-success mb-3" data-for="edit">
              <input class="checkbox_animated actions" value="edit" id="edit" type="checkbox"  data-bs-original-title="" title="">                                                Edit
               <button class="btn btn-square btn-outline-danger btn-xs rounded float"><i class="fa fa-times"></i></button>
              </div>
              <div class="col-3 p-4 shadow-sm rounded border action_label border-bottom-success mb-3" data-for="edit_own">
              <input class="checkbox_animated actions" value="edit_own" id="edit_own" type="checkbox" data-bs-original-title="" title="">                                                Edit Own
               <button class="btn btn-square btn-outline-danger btn-xs rounded float"><i class="fa fa-times"></i></button>
              </div>
              <div class="col-3 p-4 shadow-sm rounded border action_label border-bottom-success mb-3" data-for="delete">
              <input class="checkbox_animated actions" value="delete" id="delete" type="checkbox"  data-bs-original-title="" title="">                                                Delete
               <button class="btn btn-square btn-outline-danger btn-xs rounded float"><i class="fa fa-times"></i></button>
              </div>
              <div class="col-3 p-4 shadow-sm rounded border action_label border-bottom-success mb-3" data-for="delete_own">
              <input class="checkbox_animated actions" value="delete_own" id="delete_own" type="checkbox" data-bs-original-title="" title="">                                                Delete Own
               <button class="btn btn-square btn-outline-danger btn-xs rounded float"><i class="fa fa-times"></i></button>
              </div>
              <div class="col-3 p-4 shadow-sm rounded border action_label border-bottom-success mb-3" data-for="view">
              <input class="checkbox_animated actions" value="view" id="view" type="checkbox"  data-bs-original-title="" title="">                                                View
               <button class="btn btn-square btn-outline-danger btn-xs rounded float"><i class="fa fa-times"></i></button>
              </div>
              <div class="col-3 p-4 shadow-sm rounded border action_label border-bottom-success mb-3" data-for="view_own">
              <input class="checkbox_animated actions" value="view_own" id="view_own" type="checkbox" data-bs-original-title="" title="">                                                View Own
               <button class="btn btn-square btn-outline-danger btn-xs rounded float"><i class="fa fa-times"></i></button>
              </div>
            </div>     </div>  
                                                       <button class="btn btn-outline-secondary" id="addModule" type="submit" ><i class="fa fa-save"></i> Save</button>
                                             <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                             <button class="btn btn-outline-dark" type="button" onclick="resetForm(document.getElementById('contact-form'))"><i class="fa fa-refresh"></i> Reset</button>                                    
                                             </div>                                           
                                            
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                           

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="bg-white">
              <div class="card-body p-3">
              <h3>Module List   <button class="btn btn-primary btn-sm pull-right"  id="add_new_module" onclick="add_module()"><i class="fa fa-plus-circle"></i> New Module</button>
        </h3>
                      </div>
               
                <div class="card-body">
                  <div class="row">
               
                      <div class="col-md-6 p-3 border-right-sm">
<label class="p-2">From</label>
<input type="date" class="form-control shadow-sm mr-1 col-md-4" id="from_date" max="<?php echo e(date('Y-m-d')); ?>" min="<?php echo e(date('Y-m-d',strtotime('july 1,2021'))); ?>" >
<label class="p-2">To</label>
<input type="date" class="form-control shadow-sm mr-1 col-md-4" id="to_date"  max="<?php echo e(date('Y-m-d')); ?>">

</div>
                 
                  <div class="col-md-6 p-3">
                  <label class="p-2">Filter by Status</label>
                      <select class="form-control" id="status">                   
                      <option value="" default>Choose your option</option>
                       <option value="unchecked">Unchecked</option>
                       <option value="called">Called</option>
                       <option value="texted">Texted</option>
                       <option value="registered">Registered</option>
                   </select>

                   <label class="p-2">Filter by Region</label>
                      <select class="form-control" id="region">                   
                      <option value="" default>Choose your option</option>
                       <option value="assam">Assam</option>
                       <option value="coochbehar">Coochbehar Town</option>
                       <option value="texted">Coochbehar Rural</option>
                      
                   </select>
                      </div>
                      </div>
                   
                   
                   
                </div>
                <div class="card-body">
                <div class="table-responsive">
						<table class="table" id="datatable">
							<thead>
								<tr>
									<th>Name</th>
									<th>Slug</th>
									<th>Route</th>
									<th>Icon</th>
									<th>Actions</th>
									<th>Sub Modules</th>
                  <th>Action</th>
								</tr>
							</thead>
                           
							
						</table>
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
    const deletes = (name) => {
      if (confirm("Do you want to delete this action?")) {
        $("#"+name).closest(".action_label").remove();
      }

      }

    const resetForm = (formObj) => {
      $(formObj)[0].reset();
      $(".actions").prop("checked",false).trigger("change")


  //    $('input').val('').removeAttr('checked').removeAttr('selected');

    }
    const add_module = ( ) => {
        resetForm(document.getElementById("contact-form"))
        $("#exampleModalLabel").html("Add Module")
        $("#module_id").val(null)
         $("#exampleModal").modal("show")
      }
      const edit_module = (obj) => {
        resetForm(document.getElementById("contact-form"))
        $("#exampleModalLabel").html("Edit Module")
        let actions = $(obj).data("actions_json")
   //     console.log(actions);

   $("#icon").val($(obj).data("icon")).trigger("change")
   $("#parent_id").val($(obj).data("parent_id")).trigger("change")
   $("#name").val($(obj).data("name")).trigger("change")
   $("#route_name").val($(obj).data("route_name")).trigger("change")
   $("#slug").val($(obj).data("slug")).trigger("change")
   $("#module_id").val($(obj).data("id")).trigger("change")

   $(".actions").filter(function(){
        return  actions.includes($(this).val())
        }).closest(".action_label").trigger("click")
        $("#exampleModal").modal("show")

        $(".has_child").filter(function(){
       //   console.log($(this).val(),"child?")
        return  $(obj).data("has_child") == $(this).val()
        }).prop("checked",true)
        $(".is_header").filter(function(){
        return  $(obj).data("is_header") == $(this).val()
        }).prop("checked",true)
     
        $(".has_parent").filter(function(){
        return  $(obj).data("has_parent") == $(this).val()
        }).prop("checked",true)
    let  pre_exist_actions = $(".actions").map(function(){
       $(this).val()
     }).get()

     actions.filter(elem => !pre_exist_actions.includes(elem)).forEach(element => {
      $("#action_name").val(element).trigger("keyup")
      $(".add_action").trigger("click")
     });

     //  console.log(actions,"hello")
      }
   //   let has_child = $()
    
    //  let extra_actions =  actions.filter(e => $(".actions"))

     
    const checkRoute =async (route_name) => {
      loadoverlay($("#contact-form"))
 var form = new FormData();
form.append("route_name", route_name);

var settings = {
  "url": "/management/check-route",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form,
  statusCode: {
        400: function(response) {
           response = JSON.parse(response);
      $.notify({
      message:"Something went wrong"
   },{
    type:'danger',
    z_index:10000,
    timer:1000,
   });
        }
      }
};

await $.ajax(settings).done(function (response) {
    response = JSON.parse(response);
    $("#url").val(response.data)
     
});

hideoverlay($("#contact-form"))
}
       
 

     $(function() {
      
      //  $("#add_new_module").on("click",function(){
       
      //  })
 const action_elem = (action_name,action_slug) =>  $(`
                 <div class="col-3 p-4 shadow-sm rounded border action_label border-bottom-success border-success mb-3" data-for="${action_slug}">
              <input class="checkbox_animated actions" value="${action_slug}" id="${action_slug}" type="checkbox" data-bs-original-title="" title="" checked readonly>                                               ${action_name}
               <button class="btn btn-square btn-outline-danger btn-xs rounded float" onclick="deletes('${action_slug}')"><i class="fa fa-times"></i></button>
              </div>`);

 $("#icon").on("change",function(){
  $("#test_icon").prop("class","")
  $("#test_icon").addClass($(this).val())
 })
 

  $("#name").on("keyup",function(){
    let value = $(this).val();
        $("#slug").val(value.replace(" ","_").toLowerCase())
      })


      $("#action_row").on("click",".action_label",function(e){
        let action_label = $(this).data("for");
        console.log("action:",action_label)
        $("#"+action_label).prop("checked",!$("#"+action_label).prop("checked") );
       $("#"+action_label).prop("checked") ? $(this).addClass("border-success") : $(this).removeClass("border-success")
      })
      $(".action_label").on("change",".actions",function(e) {
        var box = $(this).closest(".action_label");
        $(this).prop("checked") ? box.addClass("border-success") : box.removeClass("border-success")
        // body...
      })
      $(".float").on("click",function(e){
        if (confirm("Do you want to delete this action?")) {
          $(this).closest(".action_label").remove();
        }
      })
      $("#action_name").on("keyup",function(){
        let value = $(this).val();
        //console.log("val",value.replace(" ","_").toLowerCase())

        $("#action_slug").val(value.replace(" ","_").toLowerCase())
      })
  //    let elems = 
      $(".add_action").on("click",function(e){
        e.preventDefault();
        let action_name = $("#action_name").val()
        let action_slug = $("#action_slug").val()
      

      if (action_name != "" && $(".actions").filter(function(){
            return $(this).val() === action_slug 
          }).length == 0) {
          $("#action_row").append(action_elem(action_name,action_slug))
        }
      })




      $('#addModule').on('click',async function(e){
     e.preventDefault();
     loadoverlay($("#exampleModal"))
     // if ($("#moduleForm").valid()) {

     // }
    
     let actions = $(".actions")
 actions = $.map(actions,function(elem){
  if ($(elem).prop("checked")) {
    return elem.value;
    }
  })

// console.log("actions",actions)
     var form = new FormData();
// form.append("table_name", "modules");
form.append("id", $("#module_id").val());
form.append("name", $("#name").val());
form.append("slug", $("#slug").val());
form.append("has_child", $("input[name='has_child']:checked").val());
form.append("has_parent",  $("input[name='has_parent']:checked").val());
form.append("is_header", $("input[name='is_header']:checked").val());
form.append("actions_json", JSON.stringify(actions));
form.append("url", $("#url").val());
form.append("parent_id", $("#parent_id").val());
form.append("icon", $("#icon").val());
form.append("route_name", $("#route_name").val());
form.append("status", $("#status").val());
form.append("created_by", $("#created_by").val());

// form.append("table_model", "Module");

var settings = {
  "url": "/management/module/create",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form,
  statusCode: {
        400: function(response) {
           response = JSON.parse(response);
      $.notify({
      message:"Something went wrong"
   },{
    type:'danger',
    z_index:10000,
    timer:2000,
   });
   hideoverlay($("#exampleModal"))
        },
      500: function(){
        hideoverlay($("#contact-form"))
        $.notify({
      message:"Something went wrong"
   },{
    type:'danger',
    z_index:10000,
    timer:2000,
   });
   hideoverlay($("#exampleModal"))

      }
      }
};

await $.ajax(settings).done(function (response) {
    response = JSON.parse(response);
    $.notify({
      message:response.message
   },{
      type:'success',
    z_index:10000,
    timer:2000,
   });
   dataTable.draw();
//  console.log(response);
});
hideoverlay($("#exampleModal"))




        });
        var dataTable = $('#datatable').DataTable({
         'processing': true,
        serverSide: true,
        language: {
      processing: '<div class="loader-box"><div class="loader-2"></div></div>'},
      ajax: {
            'url':'/management/module/bind',
            'data': function(data){
                // Read values
              var Featured = $('#status').val();
              var toDate = $('#to_date').val();
              var fromDate = $('#from_date').val();
              var region = $('#region').val();
    
                // Append to data
              data.status = Featured;
              data.region = region;
             
              data.toDate = toDate;
              data.fromDate = fromDate;
            }
        },
        columns: [
                {data:'Name'},
                {data:'Slug',Orderable:false},
                {data:'Route',Orderable:false},
                {data:'Icon',Orderable:false},
                {data:'Actions',Orderable:false},
                {data:'Sub Modules',Orderable:false},
                {data:'Action',Orderable:false},
                  ],
        });
      
     
        $('#status').on('change',function(){
          dataTable.draw();
        });
        $('#region').on('change',function(){
          dataTable.draw();
        });
        $('#to_date').on('change',function(){
          dataTable.draw();
        });
        $('#from_date').on('change',function(){
          dataTable.draw();
        });
       
    });
</script>
<script>
    $("#from_date").prop('max',$("#to_date").val());
$("#to_date").change(function(){
  $("#from_date").prop('max',$("#to_date").val());
});
$("#from_date").change(function(){
  $("#to_date").prop('min',$("#from_date").val());
});
</script>

<!-- <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/adminpanel/modules/modules_list.blade.php ENDPATH**/ ?>