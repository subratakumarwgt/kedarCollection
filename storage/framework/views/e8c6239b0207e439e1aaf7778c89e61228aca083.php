
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Contact List</h3>

<button class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus-circle"></i> New Customer</button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Customers</li>
<li class="breadcrumb-item active">List</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="modal fade modal-bookmark" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
                                          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>
                                       <div class="modal-body">
                                          <form class="form-bookmark needs-validation" id="contact-form" novalidate="">
                                             <div class="row g-2">
                                                <div class="mb-3 col-md-12 mt-0">
                                                   <label for="con-name">Name</label>
                                                   <div class="row">
                                                      <div class="col-sm-6">
                                                         <input class="form-control"  type="text" required="" id="fname" placeholder="First Name" autocomplete="off">
                                                      </div>
                                                      <div class="col-sm-6">   
                                                         <input class="form-control"  type="text" required="" id="lname" placeholder="Last Name" autocomplete="off">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="mb-3 col-md-12 mt-0">
                                                   <label for="con-mail">Address</label>
                                                   <input class="form-control" type="text" required="" autocomplete="off" id="address">
                                                </div>
                                                <div class="mb-3 row mt-0">
                                                <div class="col-md-6">
                                                      <label for="con-phone">Phone</label>
                                                         <input class="form-control"  type="number" required="" autocomplete="off" id="number" minlength="10">
                                                      </div>
                                                   <div class="col-md-6">
                                                   <label for="con-mail">Region</label>
                                                 
                                                         <select class="form-control" id="region1">
                                                         <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($region); ?>"><?php echo e($region); ?></option>
                                                            
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                         </select>
                                                   
                                                      </div>
                                                     
                                                </div>                                             
                                             </div>                                           
                                             <button class="btn btn-secondary" id="addContact" type="submit" >Save</button>
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
									<th>Contact</th>
									<th>Region</th>
									<th>Address</th>
									<th>Notes</th>
									<th>Entry Date</th>
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
     $(function() {
        $('#addContact').on('click',function(e){
     e.preventDefault();
     var form = new FormData();
form.append("table_name", "contacts");
form.append("name", $("#fname").val()+" "+$("#lname").val());
form.append("address", $("#address").val());
form.append("region", $("#region1").val());
form.append("number", $("#number").val());
form.append("table_model", "Contact");

var settings = {
  "url": "/api/create-data",
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
      message:response.message
   },{
    type:'danger',
    z_index:10000,
    timer:2000,
   });
        }
      }
};

$.ajax(settings).done(function (response) {
    response = JSON.parse(response);
    $.notify({
      message:response.message
   },{
      type:'success',
    z_index:10000,
    timer:2000,
   });
   dataTable.draw();
  console.log(response);
});
        });
        var dataTable = $('#datatable').DataTable({
         'processing': true,
        serverSide: true,
        language: {
      processing: '<div class="loader-box"><div class="loader-2"></div></div>'},
      ajax: {
            'url':'/management/contact/bind',
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
                {data:'Contact',Orderable:false},
                {data:'Region',Orderable:false},
                {data:'Address',Orderable:false},
                {data:'Notes',Orderable:false},
                {data:'Entry Date',Orderable:false},
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
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/adminpanel/contacts/contactlist.blade.php ENDPATH**/ ?>