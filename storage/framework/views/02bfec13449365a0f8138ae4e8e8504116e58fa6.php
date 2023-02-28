
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<style>
    .scrollers::-webkit-scrollbar {
    display: none;
    }
    .scrollers{
        height: 550px;
        overflow-x: hidden;
        overflow-y: scroll;
        scrollbar-width: none;
        
    }
    .timeline-steps {
        display: flex;
        justify-content: center;
        flex-wrap: wrap
    }

    .timeline-steps .timeline-step {
        align-items: center;
        display: flex;
        flex-direction: column;
        position: relative;
        margin: 1.45rem
    }

    @media (min-width:768px) {
        .timeline-steps .timeline-step:not(:last-child):after {
            content: "";
            display: block;
            border-top: .25rem dotted darkolivegreen;
            width: 3.46rem;
            position: absolute;
            left: 7.5rem;
            top: .3125rem
        }

        .timeline-steps .timeline-step:not(:first-child):before {
            content: "";
            display: block;
            border-top: .25rem dotted darkolivegreen;
            width: 3.8125rem;
            position: absolute;
            right: 7.5rem;
            top: .3125rem
        }
    }

    .timeline-steps .timeline-content {
        width: 6rem;
        text-align: center
    }

    .timeline-steps .timeline-content .inner-circle {
        border-radius: 1.5rem;
        height: 0.8rem;
        width: 0.8rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: green
    }

    .timeline-steps .timeline-content .inner-circle:before {
        content: "";
        background-color: darkolivegreen;
        display: inline-block;
        height: 3rem;
        width: 3rem;
        min-width: 3rem;
        border-radius: 6.25rem;
        opacity: .5
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<input type="hidden" id="order_id" value="">
<div class="modal fade" id="acceptModal" tabindex="-1" role="dialog" aria-labelledby="acceptModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="" id="add_item_form" onsubmit="return confirmOrder(event,this)">
        <div class="modal-header">
          <h5> <i class="fa fa-plus-square"></i> Confirm Order
          </h5>
        </div>
        <div class="modal-body">
          <div class="form-group p-1 mt-2">
          <label for="view_type">
              Items 
            </label>
            <div id="order_details_row"></div>
            <label for="view_type">
              Preparation time (in Minutes)
            </label>
            <input type="number" class="form-control" id="prep_time" required name="prep_time" value="35">
            
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success shadow-sm" type="submit"> Confirm  <i class="fa fa-check-circle"></i> </button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="readyModal" tabindex="-1" role="dialog" aria-labelledby="readyModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="" id="add_item_form" onsubmit="return readyOrder(event,this)">
        <div class="modal-header">
          <h5> <i class="fa fa-plus-square"></i> Ready Order  </h5>
        
        </div>
        <div class="modal-body">
          <div class="form-group p-1 mt-2">
            <label for="view_type">
             Mark order as ready?
            </label><br>
           <small class="text-danger">This customer may also be notified </small><br>
           <small class="text-danger" id="readyMessage"></small><br>
           <small class="text-danger">( This action can not be undo )</small>
            <input type="hidden" id="order_id" value="">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success shadow-sm" type="submit"> Confirm  <i class="fa fa-check-circle"></i> </button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="container-fluid">
    <div class="row border-bottom bg-white">
        <div class="col-md-4 pl-5 pt-4 border-right">
            <div class="text-center text-primary">
                <h4 class="">Orders</h4>
                <div class="col-md-12 p-1">
                    <?php $__currentLoopData = $order_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="<?php echo e($type); ?>">
                    <label class="form-check-label" for="inlineRadio1"><?php echo e($type); ?></label>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 p-1">
            <div class="row m-0">
                <div class="col-md-6 p-1 border-right-sm">
                    <label class="p-2">From </label>
                    <input type="date" name="" id="from_date" class="form-control">

                </div>
                <div class="col-md-6 p-1 border-right-sm">
                    <label class="p-2">To </label>
                    <input type="date" name="" id="to_date" class="form-control">
                </div>

            </div>
        </div>
        <div class="col-md-4 p-1">
            <label class="p-2 small text-secondary"> Options</label>
            <div class="p-1 text-right">
                <button class="btn btn-outline-dark"><i class="fa fa-file"></i> Export to PDF </button>
                <button class="btn btn-outline-dark"><i class="fa fa-envelope"></i> Send Invoice </button>
            </div>

        </div>
    </div>
    <div class="row">

        <div class="col-sm-4 p-1 scrollers">
            <div class="">
                <!-- <div class="card-body">
                    <h6>Orders list</h6>
               </div> -->
                <div class="p-0">
                    <ul id="order_coupon_holder">
                        <li class="p-2 border  mb-2 bg-white">
                            <div class="card-body chart-block">
                                <div class="chart-overflow" id="column-chart2">
                                    <div class="loader-box">
                                        <div class="loader-2"></div>
                                    </div>
                                </div>
                            </div>                           
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 p-1 scrollers">
            <div class="bg-white mb-2 border">
                <h6 class="text-primary border-bottom p-2">
                    Order Info <i class="fa fa-info"></i>
                </h6>
                <div class="row p-2" id="order_info_holder">
                    
                </div>
            </div>
            <div class="bg-white mb-2 border">
                <h6 class="text-primary border-bottom p-2">
                    Order Timeline  <i class="fa fa-clock"></i>
                </h6>
                <div class="row p-2" id="order_timeline_holder">
                  
                </div>
            </div>
            <div class="bg-white mb-2 border">
                <h6 class="text-primary border-bottom p-2">
                    Order Details <i class="fa fa-cutlery"></i>
                </h6>
                <div class="row justify-content-center p-2" id="order_details_holder">                   

                </div>
            </div>
            <div class="bg-white mb-2 border">
                <h6 class="text-primary border-bottom p-2">
                    Order Rating & Feedback  <i class="fa fa-star"></i>
                </h6>
                <div class="row justify-content-center p-2" id="order_ratings_holder">
                   
                </div>
            </div>

        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="https://cdn.datatables.net/plug-ins/1.12.1/api/sum().js"></script>
<script>
    jQuery.fn.dataTable.Api.register('sum()', function() {
        return this.flatten().reduce(function(a, b) {
            if (typeof a === 'string') {
                a = a.replace(/[^\d.-]/g, '') * 1;
            }
            if (typeof b === 'string') {
                b = b.replace(/[^\d.-]/g, '') * 1;
            }

            return a + b;
        }, 0);
    });
    $(function() {

        var dataTable = $('#datatable').DataTable({
            'processing': true,
            serverSide: true,
            drawCallback: function() {
                var api = this.api();
                $(api.table().footer()).html("<td colspan='3'>Total</td><td colspan='7'><i class='fas fa-inr'></i>" +
                    (0 - parseInt(api.column(3, {
                        page: 'current'
                    }).data().sum())) +
                    "</td>");
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

    
    
    const acceptOrder =async (order_id) =>{

        $("#acceptModal").modal("show");
        
    }
    const confirmOrder = async (e,form) => {
        e.preventDefault()
        loadoverlay($(form))
        let order_id =$("#order_id").val()
        let confirmOrder =await $.post("/api/confirm-order/"+order_id,{preparation_time:$("#prep_time").val()})
                            .then((data)=>{
                                hideoverlay($(form))
                                $("#acceptModal").modal("hide");
                                getOrderHistory(order_id)
                            })
                            .error(error =>{
                                hideoverlay($(form))
                                getOrderHistory(order_id)
                            })
    }
    const openReadyModal = () =>{
        $("#readyModal").modal("show");
    }
    
    const readyOrder = async (e,form) => {
        e.preventDefault()
        loadoverlay($(form))
        let order_id =$("#order_id").val()
        let readyOrder =await $.post("/api/ready-order/"+order_id)
                            .then((data)=>{
                                hideoverlay($(form))
                                $("#readyModal").modal("hide");
                                getOrderHistory(order_id)
                            })
                            .error(error =>{
                                hideoverlay($(form))
                                getOrderHistory(order_id)
                            })
    }
    const packOrder = async (e,form) => {
        e.preventDefault()
        loadoverlay($(form))
        let order_id =$("#order_id").val()
        let packOrder =await $.post("/api/pack-order/"+order_id)
                            .then((data)=>{
                                hideoverlay($(form))
                                getOrderHistory(order_id)
                            })
                            .error(error =>{
                                hideoverlay($(form))
                                getOrderHistory(order_id)
                            })
    }
    const deliverOrder = async (e,form) => {
        e.preventDefault()
        loadoverlay($(form))
        let order_id =$("#order_id").val()
        let packOrder =await $.post("/api/deliver-order/"+order_id)
                            .then((data)=>{
                                hideoverlay($(form))
                                getOrderHistory(order_id)
                            })
                            .error(error =>{
                                hideoverlay($(form))
                                getOrderHistory(order_id)
                            })
    }
    const getOrderCoupons =async () => {
        let loader = $(`<div class="card-body chart-block">
                                <div class="chart-overflow" id="column-chart2">
                                    <div class="loader-box">
                                        <div class="loader-2"></div>
                                    </div>
                                </div>
                            </div>`); 
          
           
           $("#order_coupon_holder").html(loader)
        let data = {}
        data.from_date = $('#from_date').val() ?? null;
                    data.to_date = $('#to_date').val() ?? null;
                    data.searchKey = $('#searchKey').val() ?? null;
        $orderHTML = await $.get("/management/sales/orders/bind",data)
                         .then((data)=>{
                           $("#order_coupon_holder").html(data)
                           })
    }
    const getOrderHistory =async (order_id) => {
        $("#order_id").val(order_id)
        let loader = $(`<div class="card-body chart-block">
                                <div class="chart-overflow" id="column-chart2">
                                    <div class="loader-box">
                                        <div class="loader-2"></div>
                                    </div>
                                </div>
                            </div>`); 
          
           
           $("#order_info_holder").html(loader)
           $info =await $.get("/management/sales/orders/info",{order_id}).then((data)=>{
           
           $("#order_info_holder").html(data)
           $("#order_details_row").html($("#order_details").html())
        })
        $("#order_timeline_holder").html(loader)
        $timeline = await $.get("/management/sales/orders/timeline",{order_id}).then((data)=>{
           
            $("#order_timeline_holder").html(data)
        })
        $("#order_details_holder").html(loader)
        $details =await  $.get("/management/sales/orders/details",{order_id}).then((data)=>{
           
           $("#order_details_holder").html(data)
        })
       
    }
    getOrderCoupons()
    $('#from_date').on('change', function() {
        getOrderCoupons()
        });
        $('#to_date').on('change', function() {
            getOrderCoupons()
        });
        $('#searchKey').on('change', function() {
            getOrderCoupons()
        });

        $("#order_coupon_holder").on("click",".see_details",function(){
          
            $(".coupon_row").removeClass("shadow border border-success bg-light bg-white")
           $(this).parent("div").parent("li").addClass("shadow border border-success bg-white") 
        })
</script>


<!-- <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\rollswallah\resources\views/adminpanel/expenses/onlineOrders.blade.php ENDPATH**/ ?>