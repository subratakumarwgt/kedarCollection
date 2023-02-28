
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3 class="ml-2">Quick Expense <button class="btn btn-outline-dark" id="add_new_item" onclick="add_item()"><i class="fa fa-plus-circle"></i> New Item</button></h3>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Expense</li>
<li class="breadcrumb-item active">quick expense</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-sm-8">
            <div class="card">
                <form  id="add_item_form" class="form" method="post" action="/management/expense/quick-expense/add">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">

                        <div class="modal-header">
                            <h5>Add Quick Expense </h5>
                        </div>
                        <div class="modal-body">

                            <div class="form-group p-1 mt-2">
                                <label for="view_type">
                                    Expense Description
                                </label>
                                <input type="text" class="form-control" id="description" required name="description" value="<?php echo e(@$item->description); ?>">
                            </div>
                            <div class="form-group p-1 mt-2">
                                <label for="view_type">
                                    Amount
                                </label>
                                <input type="text" class="form-control" id="amount" required name="amount" value="<?php echo e(@$item->amount); ?>">
                            </div>

                            <div class="form-group p-1 mt-2">
                                <label for="view_type">
                                    Date
                                </label>
                               <input type="date" value="<?php echo e(date('Y-m-d')); ?>" name="created_at" id="created_at" class="form-control" required>
                            </div>
                            <div class="form-group p-1 mt-2">
                                <label for="view_type">
                                    Created By:  <strong><?php echo e(Auth::User()->name); ?></strong>
                                </label>
                               <input type="hidden" readonly value="<?php echo e(Auth::User()->id); ?>" name="created_by" id="created_by" class="" required>
                            </div>
                            <!-- <?php if(@$item->type == "product" ): ?>
                            <div class="form-group p-1 mt-2">
                                <label for="view_type">
                                    Sub category
                                </label>
                                <select name="sub_category" id="sub_category" class="form-control">
                                    <option value="ice_cream" <?php if($item->type == "ice_cream"): ?> selected <?php endif; ?>>Ice Cream</option>
                                    <option value="fast_food" <?php if($item->type == "fast_food"): ?> selected <?php endif; ?>>Fast Food</option>
                                </select>
                            </div>
                            <?php endif; ?> -->
                            <div class="form-group p-1 mt-2">
                                <label for="view_type">
                                    Type
                                </label>
                                <input type="text" class="form-control" id="item_price" required name="type" value="<?php echo e(@$item->type ?? 'Other Expenses'); ?>" required readonly>
                            </div>
                            <div class="form-group p-1 mt-2">
                                <label for="view_type">
                                    Category
                                </label>
                                <input type="text" class="form-control" id="category" required name="category" value="<?php echo e(@$item->category ?? 'Sallary'); ?>" required>
                            </div>


                        </div>


                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-dark shadow-sm btn-block" type="submit"> Update <i class="fa fa-upload"></i> </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="https://cdn.datatables.net/plug-ins/1.12.1/api/sum().js"></script>
<script>
    jQuery.fn.dataTable.Api.register( 'sum()', function ( ) {
    return this.flatten().reduce( function ( a, b ) {
        if ( typeof a === 'string' ) {
            a = a.replace(/[^\d.-]/g, '') * 1;
        }
        if ( typeof b === 'string' ) {
            b = b.replace(/[^\d.-]/g, '') * 1;
        }
 
        return a + b;
    }, 0 );
} );
    $(function() {
       
        var dataTable = $('#datatable').DataTable({
            'processing': true,
            serverSide: true,
            drawCallback: function () {
                var api = this.api();
                $( api.table().footer() ).html("<td colspan='3'>Total</td><td colspan='7'><i class='fas fa-inr'></i>"+
                 (  0 - parseInt(api.column( 3, {page:'current'} ).data().sum()))
                    +"</td>");
            },
            language: {
                processing: '<div class="loader-box"><div class="loader-2"></div></div>'
            },
            ajax: {
                'url': '/management/expense/items/bind',
                'data': function(data) {
                    // Read values
                    var from_date = $('#from_date').val();
                    var to_date = $('#to_date').val();
                    var item_type = $('#item_type').val();              

                    // Append to data
                    data.from_date = from_date;
                    data.to_date = to_date;
                    data.item_type = item_type;
                    data.type = "product";
                    

                }
            },
            columns: [{
                    data: 'Item Id',
                    Orderable: true
                },
                {
                    data: 'Title',
                    Orderable: false
                },
                {
                    data: 'Item Type',
                    Orderable: false
                },                
                {
                    data: 'Price',
                    Orderable: false
                },
                {
                    data: 'Unit',
                    Orderable: false
                },              
                {
                    data: 'Action',
                    Orderable: false
                },
            ],
        });



        $('#from_date').on('change', function() {
            dataTable.draw();
        });
        $('#to_date').on('change', function() {
            dataTable.draw();
        });
        $('#item_type').on('change', function() {
            dataTable.draw();
        });


    });
    const add_item = () => {
    $("#itemModal").modal("show")
  }
const addItemForm = (e, form) => {
    e.preventDefault()
    loadoverlay($("#add_item_form"))
    var form = new FormData();
    form.append("table_name", "items");
    form.append("name", $("#item_name").val());
    form.append("unit", $("#item_unit").val());
    form.append("type", $("#type").val());
    form.append("price", $("#item_price").val());
    form.append("table_model", "Item");

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
          hideoverlay($("#add_item_form"))
          //  = JSON.parse();
          $.notify({
            message: "Something went wrong while inserting Item!"
          }, {
            type: 'danger',
            z_index: 10000,
            timer: 2000,
          });
        },
        500: function() {
          hideoverlay($("#add_item_form"))
          // response = JSON.parse(response);
          $.notify({
            message: "Something went wrong while inserting doctor!"
          }, {
            type: 'danger',
            z_index: 10000,
            timer: 2000,
          })
        }
      }
    };

    $.ajax(settings).done(function(response) {
      var response2 = JSON.parse(response)
      hideoverlay($("#add_item_form"));
      $.notify({
        message: response2.message
      }, {
        type: 'success',
        z_index: 10000,
        timer: 2000,
      })



    }, function() {
    //   getItemDetails()
    });

  }
</script>


<!-- <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/adminpanel/expenses/quickExpense.blade.php ENDPATH**/ ?>