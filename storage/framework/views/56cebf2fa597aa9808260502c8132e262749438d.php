
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Online Users</h3>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">User</li>
<li class="breadcrumb-item active">Online Users</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
               
               
                <div class="card-body">
                
                <div class="table-responsive">
						<table class="table text-center" id="datatable">
							<thead>
							<tr>	<th>Name</th>
									<th>Contact</th>								
									<th>Status</th>
                                    <th>Actions</th>
								</tr>
							</thead>
                            <tbody id="tableBody">

                            </tbody>
                           
							
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
    const showOnlineUsers = (user) => {
        
    }
     $(function() {
       let selected_users = []
       $("#tableBody").html("")
       setTimeout(()=>{
           console.log("setting_table")
        if (online_users.length > 0) {
           let rows = online_users.map((user)=>{
               return $(`<tr id="user_row_${user.id}">
    <td>${user.name}</td>
    <td>${user.contact}</td>
    <td id="user_status_${user.id}"><i class="fa fa-circle shadow-sm text-success"></i></td>
    <td> <button class="btn btn-sm btn-outline-dark user_action shadow-sm" data-action="notify" data-user_id="${user.id}"><i class="fa fa-envelope"></i> Notify </button>
</td>
</tr>`)
           })

           $("#tableBody").html(rows) 
       }
       },2000)

       
       
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
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\Projects\alliswell\Cuba\resources\views/adminpanel/users/onlineusers.blade.php ENDPATH**/ ?>