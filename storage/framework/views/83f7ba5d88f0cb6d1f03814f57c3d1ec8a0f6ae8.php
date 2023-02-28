
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Assets</li>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="modal fade modal-bookmark" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Asset</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-bookmark needs-validation" id="contact-form" novalidate="">
                    <div class="row g-2">
                        <div class="mb-3 col-md-12 mt-0">
                            <label for="con-name">Asset Name</label>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input class="form-control" type="text" required="" id="asset_name" placeholder="Asset Name (use '_' intead of spaces. eg: product_category)" autocomplete="off">
                                </div>

                            </div>
                        </div>
                        <div class="mb-3 col-md-9 mt-0">
                            <label for="con-mail">Asset List</label>
                            <select class="form-control" required="" multiple="multiple" id="asset_list" placeholder="Asset List (use ',' as seperator. eg: baby , adult )"></select>
                        </div>
                        <div class="mb-3 col-md-3 mt-0">
                            <label for="con-mail">Key Type</label>
                            <select class="form-control" required=""  id="asset_key" placeholder="Asset List (use ',' as seperator. eg: baby , adult )">
                                <option value="int"> Integer</option>
                                <option value="str" default> String</option>
                            </select>
                        </div>
                    
                    </div>
                    <button class="btn btn-secondary" id="addAsset" type="submit">Save</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">           
         <div class="card-body">
         <h4 class="bg-white p-2 text-primary">Static Assets <button class="btn btn-primary pull-right btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus-circle"></i> Add New Asset</button>

</h4>
                   <div class="table-responsive">
                        <table class="table" id="datatable">
                            <thead>
                                <tr> 
                                    <th>Asset Title</th>
                                     <th>Asset List</th> 
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $("#asset_list").select2({
  tags: true,
  tokenSeparators: [',', ' '],
  dropdownParent: $('#exampleModal')
});


$(document).ready(function(){
    var dataTable = $('#datatable').DataTable({
            'processing': true,
            serverSide: true,
            language: {
                processing: '<div class="loader-box"><div class="loader-2"></div></div>'
            },
            ajax: {
                'url': '/management/asset/bind',
                'data': function(data) {
                    // Read values
                

                }
            },
            columns: [{
                    data: 'Asset Title'
                },
               
                {
                    data: 'Asset List',
                    Orderable: false
                },
                {
                    data: 'Action',
                    Orderable: false
                }
              
            ],
        });
    $('#addAsset').on('click', function(e) {
            e.preventDefault();
            var form = new FormData();
            form.append("table_name", "static_assets");
            form.append("field", "title");
            form.append("field_value", $("#asset_name").val());
            form.append("table_model", "StaticAsset");

            var settings = {
                "url": "/api/distinct-data",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form,
                statusCode: {
                    400: function() {
                        $.notify({
                            message: "Sorry asset title you provided already exists"
                        }, {
                            type: 'danger',
                            z_index: 10000,
                            timer: 2000,
                        });
                    }
                }
            };

            $.ajax(settings).done(function(response) {
              
                $.notify({
                    message: "Data validated successfully"
                }, {
                    type: 'success',
                    z_index: 10000,
                    timer: 2000,
                });
                dataTable.draw();
                console.log(response);
            },function(){
                var form = new FormData();
            form.append("table_name", "static_assets");
            form.append("title", $("#asset_name").val());
            form.append("asset_key", $("#asset_key").val());
            form.append("list_json",JSON.stringify( $("#asset_list").val()));           
            form.append("table_model", "StaticAsset");

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
                response = JSON.parse(response);
                $.notify({
                    message: response.message
                }, {
                    type: 'success',
                    z_index: 10000,
                    timer: 2000,
                });
               
            },function(){
                dataTable.draw();
                console.log(response);
            });
        });
            });
        });
          

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/adminpanel/assets/assetlist.blade.php ENDPATH**/ ?>