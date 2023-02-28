@extends('adminpanel.master')
@section('title', 'Sample Page')

@section('css')
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Role Setup  <i class="fa fa-users"></i></h3>



@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Settings</li>
<li class="breadcrumb-item active">Role Setup</li>
@endsection

@section('content')
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="roleSetupModal">
                  <div class="modal-dialog modal-dialog-center">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="myLargeModalLabel">Add new <strong>Role</strong> </h5>
                           <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
<form action="/management/role/create" id="create_form" method="POST">
    @csrf
    <input type="hidden" name="id" value="0" id="role_id">
    <div class="form-group p-1 m-1">
        <input type="text" class="form-control" id="role_name" name="name" required placeholder="Type a role name">
    </div>
    <div class="form-group p-1 m-1">
        <button class="btn btn-sm btn-outline-dark" type="submit" id="saveBtn"><i class="fa fa-save"></i> Save</button>
    </div>
</form>

                        </div>
                     </div>
                  </div>
               </div>

<div class="container-fluid">
    <div class="row">
        <!-- <div class="col-md-12 mb-3">
<a href="import/excel" class="btn btn-primary btn-sm mr-3"><i class="fas fa-plus-square"></i> Mass Import</a></div> -->
        <div class="col-sm-12">
            <div class="card">

                <div class="card-body">
                <a href="#" class="btn btn-outline-dark btn-sm mr-3" id="addNewRole"> <i class="fas fa-plus-square"></i>Add New Role</a>
                    <div class="table-responsive">
                        <table class="table" id="datatable">
                            <thead>
                                <tr><th>Id</th>
                                    <th>Role Name</th>
                                    <th>Users</th>
                                    <th>Permissions</th>
                                    <th>Actions</th>
                                  
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
@endsection

@section('script')

<script>
    $(function() {

        var dataTable = $('#datatable').DataTable({
            'processing': true,
            serverSide: true,
            language: {
                processing: '<div class="loader-box"><div class="loader-2"></div></div>'
            },
            ajax: {
                'url': '/management/role/bind',
                'data': function(data) {
                    // Read values
                    var category = $('#category').val();
                    var sub_category = $('#sub_category').val();
                    var status = $('#status').val();

                    // Append to data
                    data.category = category;
                    data.sub_category = sub_category;
                    data.status = status;

                }
            },
            columns: [{
                    data: 'Id',
                    Orderable: false
                },
                {
                    data: 'Role Name',
                    Orderable: false
                },
                {
                    data: 'Users',
                    Orderable: false
                },
                {
                    data: 'Permissions',
                    Orderable: false
                },                
                {
                    data: 'Actions',
                    Orderable: false
                },

               
            ],
        });



        $('#category').on('change', function() {
            dataTable.draw();
        });
        $('#sub_category').on('change', function() {
            dataTable.draw();
        });
        $('#status').on('change', function() {
            dataTable.draw();
        });

        $("#addNewRole").on("click",function(e){
            e.preventDefault()
            $("#roleSetupModal").modal("show")
        })
       $("#create_form").on("submit",async function(e){
           e.preventDefault()
           loadoverlay($(this))
           var form = new FormData(this);


var settings = {
  "url": "/management/role/create",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form,
  error:function(){
    hideoverlay($(this))
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
 $("#role_id").val(response.data.id)
 dataTable.draw()
 $("#saveBtn").prop("disabled",true)

});
$.notify({
      message: response.message
   },{
    type:'success',
    z_index:10000,
    timer:500,
   });
hideoverlay($(this))

       })
       $("#datatable").on("click",".edit_role",function(e){
        e.preventDefault()
         $("#roleSetupModal").modal("show")
         $("#role_id").val($(this).data("id"))
         $("#role_name").val($(this).data("name"))

         $("#saveBtn").prop("disabled",true)

       })
       $("#role_name").on("change",function(){
        $("#saveBtn").prop("disabled",false)
       })


    });
</script>


<!-- <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script> -->
@endsection
