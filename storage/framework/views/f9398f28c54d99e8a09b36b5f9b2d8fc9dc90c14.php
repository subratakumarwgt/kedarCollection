
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<style>
  .select2-dropdown {
    z-index: 9001;
  }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>User List</h3>
<a href="register" class="btn btn-primary btn-sm"><i class="fas fa-plus-square"></i> New User</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">User</li>
<li class="breadcrumb-item active">User List</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="roleSetupModal">
  <div class="modal-dialog modal-dialog-center">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Assign <strong>Role</strong> </h5>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/management/role/assign-users" id="create_form" method="POST">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="id" value="0" id="role_id">
          <div class="form-group p-1 m-1">
            <select name="role_id_list" id="role_id_list" multiple="multiple">
              <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <input type="hidden" value="" id="user_list" name="user_list">
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
    <div class="col-sm-12">
      <div class="card">

        <div class="card-body">
          <div class="row">

            <div class="col-md-6 p-3 border-right-sm">
              <label class="p-2">From</label>
              <input type="date" class="form-control shadow-sm mr-1 col-md-4" id="from_date" max="<?php echo e(date('Y-m-d')); ?>" min="<?php echo e(date('Y-m-d',strtotime('july 1,2021'))); ?>">
              <label class="p-2">To</label>
              <input type="date" class="form-control shadow-sm mr-1 col-md-4" id="to_date" max="<?php echo e(date('Y-m-d')); ?>">

            </div>

            <div class="col-md-6 p-3">
              <label class="p-2">Filter by Type</label>
              <select class="form-control" id="status">
                <option value="" default>Choose your option</option>
                <option value="user">Clients</option>
                <option value="agent">Agents</option>
                <option value="admin">Admins</option>
              </select>


            </div>
          </div>



        </div>
        <div class="card-body">
          <div class="row mb-1 border-bottom-light">
            <div class="col-sm-2 p-1">
              <button class="btn btn-sm btn-outline-dark"><i class="fa fa-trash"></i> Delete Selected</button>
            </div>
            <div class="col-sm-2 p-1">
              <button class="btn btn-sm btn-outline-dark " onclick="assign_modal()"><i class="fa fa-users"></i> Assign Role</button>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table" id="datatable">
              <thead>
                <tr>
                  <th>
                    <div class="text-center text-end icon-state switch-sm switch-outline m-1 ">
                      <label class="switch ">
                        <input type="checkbox" data-bs-original-title="" title="" id="select_all"><span class="switch-state  bg-success shadow-sm"></span>
                      </label>
                    </div>
                  </th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Contact</th>
                  <th>Profile</th>
                  <th>Address</th>
                  <th>Joined</th>
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
  let selected_users = []
  const getSelectedUsers = () => {
    selected_users = $(".user_row").filter(function() {
      return $(this).prop("checked")
    }).map(function() {
      return $(this).data("user_id")
    }).get()
    return selected_users
  }



  $(".user_row").on("change", function() {
    selected_users = $(".user_row").filter(function() {
      return $(this).prop("checked")
    }).map(function() {
      return $(this).data("user_id")
    }).get()
  })



  $("#select_all").on("change", function(e) {
    e.preventDefault()
    $(".user_row").prop("checked", $(this).prop("checked")).trigger("change")
    console.log("Selected Users", getSelectedUsers())
  })

  $('#addContact').on('click', function(e) {
    e.preventDefault();
    var form = new FormData();
    form.append("table_name", "contacts");
    form.append("name", $("#fname").val() + " " + $("#lname").val());
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
            message: response.message
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
      dataTable.draw();
      console.log(response);
    });
  });
  var dataTable = $('#datatable').DataTable({
    'processing': true,
    serverSide: true,
    language: {
      processing: '<div class="loader-box"><div class="loader-2"></div></div>'
    },
    ajax: {
      'url': '/management/user/bind',
      'data': function(data) {
        // Read values

        var toDate = $('#to_date').val();
        var fromDate = $('#from_date').val();
        var type = $('#type').val();

        // Append to data

        data.type = type;

        data.toDate = toDate;
        data.fromDate = fromDate;
      }
    },
    columns: [{
        data: "Select",
        orderable: false
      },
      {
        data: 'Image'
      },
      {
        data: 'Name'
      },
      {
        data: 'Contact',
        Orderable: false
      },
      {
        data: 'Profile',
        Orderable: false
      },
      {
        data: 'Address',
        Orderable: false
      },
      {
        data: 'Joined',
        Orderable: false
      },
      {
        data: 'Action',
        Orderable: false
      },
    ],
  });



  $('#type').on('change', function() {
    dataTable.draw();
  });
  $('#to_date').on('change', function() {
    dataTable.draw();
  });
  $('#from_date').on('change', function() {
    dataTable.draw();
  });
  $("#from_date").prop('max', $("#to_date").val());
  $("#to_date").change(function() {
    $("#from_date").prop('max', $("#to_date").val());
  });
  $("#from_date").change(function() {
    $("#to_date").prop('min', $("#from_date").val());
  });
  $("#role_id_list").select2()
  const assign_modal = () => {
    $("#roleSetupModal").modal("show")
    // console.log(selected_users)
    $("#user_list").val(getSelectedUsers())
  }
</script>
<script>


</script>

<!-- <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/adminpanel/users/userlist.blade.php ENDPATH**/ ?>