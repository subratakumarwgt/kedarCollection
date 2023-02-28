
<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('banner'); ?>
<div class="" style="height: 200px;position:fixed;filter: blur(12px);-webkit-filter: blur(12px);"><img src="<?php echo e(asset('assets/images/bg_3-33.jpg')); ?>" alt="" style="min-width: 1000px;"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb-title'); ?>
<h5> Checkout</h5>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/cart-items">Cart</a></li>
                    <li class="breadcrumb-item active"><a href="/checkout-order">Checkout</a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row justify-content-center">
    <div class="col-md-10 bg-white shadow-sm p-4 mb-4">
     
        <div class="row pl-3 pr-3 wish-list">
            <div class="col-md-4 order-md-2 mb-4  p-2">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted p-3 h-3">Your cart</span>
                    <span class="badge badge-primary badge-pill" id="item_count">3</span>
                </h4>
                <ul class="list-group mb-3 bg-white shadow-sm p-1" id="cartrowx">
                 <?php echo $item_html; ?>

                    <!-- <li class="list-group-item d-flex justify-content-between bg-primary-light">
                        <div class="text-dark">
                            <h6 class="my-0 text-dark">Promo code</h6>
                            <strong>EXAMPLECODE</strong>
                        </div>
                        <span class="text-dark">-<i class="fa fa-inr"></i> 5</span>
                    </li> -->
                    <li class="list-group-item d-flex justify-content-between align-items-center  p-1">
                Subtotal
                <span><i class="fa fa-inr"></i><strong id="carttotal"><?php echo e($subtotal_total); ?></strong> </span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center  p-1">
                Discount
                <span class="text-danger"><i class="fa fa-inr"></i><strong id="carttotal"> - <?php echo e($discount); ?></strong> </span>
              </li>
              <?php $__currentLoopData = $charges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $charge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="list-group-item d-flex justify-content-between align-items-center p-1">
               <?php echo e($charge["charge_label"]); ?>

                <span><i class="fa fa-inr"></i><strong id="delivery"><?php echo e($charge["amount"] ?? 0); ?></strong></span>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
                    <li class="list-group-item border-none d-flex justify-content-between ">
                        <span>Total (INR)</span>
                        <strong class="badge badge-dark badge-xl"><i class="fa fa-inr"></i><text id=""> <?php echo e(@array_sum(array_column($charges, 'amount')) + @$subtotal); ?></text></strong>
                    </li>
                </ul>

                <form>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary btn-sm">Redeem</button>
                        </div>
                    </div>
                </form>
                   <div class="col-md-12">
                                                <div class="row">
                                                <div class="pt-4 col-md-12">
        
            <h5 class="mb-1">Expected Delivery</h5>
            <p class="mb-0">in 40 Minutes (approx) </p>            
            <p class="mb-0"> <?php echo e(date("H:i, d M",strtotime("+40 minutes"))); ?> - <?php echo e(date("H:i, d M",strtotime("+1 hour"))); ?></p>
          </div>
           <div class="col-md-12 pt-4">

            <h5 class=" ">We accept</h5>

            <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg" alt="Visa">
            <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg" alt="American Express">
            <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg" alt="Mastercard">
            <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png" alt="PayPal acceptance mark">
          </div>
        </div></div>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing Details</h4>
                <form class="needs-validation" novalidate="" id="checkOutForm" onsubmit="">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Full name</label>
                            <input type="text" class="form-control" id="user_name" placeholder="" value="<?php echo e(strtoupper(@Auth::User()->name)); ?>" required="">
                            <div class="invalid-feedback">
                                Valid name is required.
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email">Email <span class="text-muted">(*)</span></label>
                            <input type="email" class="form-control required" id="user_email" required="" placeholder="you@example.com" value="<?php echo e(@Auth::User()->email); ?>">
                            <div class="invalid-feedback">
                                Please enter a valid email address for delivery updates.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">Contact <span class="text-muted">(*)</span></label>
                            <input type="text" class="form-control required" id="user_contact" required="" placeholder="7005006004" value="<?php echo e(@Auth::User()->contact); ?>">
                            <div class="invalid-feedback">
                                Please enter a Contact Number for delivery updates.
                            </div>
                        </div>
                    </div>
                        <div class="mb-3">
                        <label for="address">Address <span class="text-muted">(*)</span></label>
                        <input type="text" class="form-control" id="user_address" placeholder="1234 Main St" required="" value="<?php echo e(@Auth::User()->address); ?>">
                        <div class="invalid-feedback">
                            Please enter your delivery address.
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="zip">Zip<span class="text-muted">(*)(Enter PIN to qualify for delivery)</span></label>
                            <input type="text" class="form-control" id="pin" placeholder="Enter Your PIN to qualify for Service" placeholder="" required="" value="<?php echo e(@Auth::User()->pin); ?>">
                            <div class="invalid-feedback" id="loader">

                            </div>
                        </div>
                    </div>

                    <hr class="mb-4">

                    <h4 class="mb-3">Payment</h4>
                    <div class="d-block my-3">
                                                <div class="custom-control custom-radio mb-2">
                                                
                                                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input"value="razor_pay" required="" onclick="proceedOrder('rzr')" disabled>
                                                    <span class="text-dark small ml-5 mr-2 border p-1 rounded">Coming soon</span>
                                                    <label class="custom-control-label" for="credit">Online Payment <small class="text-danger">*(use this for<strong> 100% TOUCH FREE DELIVERY. </strong>)</small></label>
                                                </div>
                                                 <div class="mb-1 col-md-6">
         
        </div>
                                                <div class="custom-control custom-radio mb-2">
                                                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="" value="cash_on_delivery" checked>
                                                    <label class="custom-control-label" for="debit" >Pay On Delivery</label>
                                                </div>

        
                                                
                                            </div>

                  

                    <hr class="mb-4">
                    <div class="row justify-content-center">
                        <div id="orderMessage"></div>
                    </div>
                    <input type="hidden" name="token" id="token" value="<?php echo e(csrf_token()); ?>">
                    <input type="hidden" name="amount" value="<?php echo e(@array_sum(array_column($charges, 'amount')) + @$subtotal); ?>" id="fTotal">
                    <button class="btn btn-secondary btn-lg btn-block"  id="orderButton"  onclick="placeOrder()" >Continue to Order</button>
                </form>
            </div>

        </div>
         
    </div>
</div>
<script>
    document.getElementById("checkOutForm").addEventListener("submit", function(event){
    event.preventDefault()
  });
    const placeOrder = async () => {
        if($("#checkOutForm").valid()){
      loadoverlay($("#checkOutForm"))
      var form = new FormData();
      form.append("table_name", "orders");
      form.append("order_type", "website");
      form.append("payment_type", $("#checkOutForm input[name='paymentMethod']:checked").val());
      form.append("total", $("#fTotal").val());
      form.append("item_count", $(".cart_row_item").length);
      form.append("product_qty_json", "")
      form.append("status", "pending")
      form.append("user_contact", $("#user_contact").val());
      form.append("user_name", $("#user_name").val());
      form.append("user_id", "<?php echo e(Auth::check() ? Auth::User()->id : Session::getId()); ?>");
      form.append("user_address", $("#user_address").val());
      form.append("table_model", "Order");

      var settings = {
        "url": "/api/place-online-order",
        "method": "POST",
        "timeout": 0,
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form,
        statusCode: {
          400: function() {
            hideoverlay($("#checkOutForm"))
            //  = JSON.parse();
            $.notify({
              message: "Something went wrong while accepting order!"
            }, {
              type: 'danger',
              z_index: 10000,
              timer: 2000,
            });
          },
          500: function() {
            hideoverlay($("#checkOutForm"))
           
            $.notify({
              message: "Something went wrong while placing order!"
            }, {
              type: 'danger',
              z_index: 10000,
              timer: 2000,
            })
          }
        }
      };

    
      await $.ajax(settings).done(function(response) {
        response = JSON.parse(response)
       hideoverlay($("#checkOutForm"));
       window.open("/track-order/"+response.details.order_id)
      })
 
        }
        
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\rollswallah\resources\views/userpanel/newcheckout.blade.php ENDPATH**/ ?>