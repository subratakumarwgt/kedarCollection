
<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('banner'); ?>
<div class="" style="height: 200px;position:fixed;filter: blur(90px);-webkit-filter: blur(20px);background:rgba(0, 0, 0, 0.7)"><img src="/images/banner.webp" alt="" style="min-width: 900px;"></div>
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

<div class="row justify-content-center mt-3">
    <div class="col-md-10 bg-white shadow-sm p-4 mb-4 mt-5 rounded  ">

        <div class="row pl-3 pr-3 wish-list mt-3">
            <div class="col-md-4 order-md-2 mb-4  ">
            <h4 class="mb-3">Item Details</h4>
                <ul class="list-group mb-3  shadow-sm p-1" id="cartrowx">
                    <?php echo $item_html; ?>


                    <li class="list-group-item d-flex justify-content-between align-items-center  p-1">
                        Subtotal
                        <span><i class="fa fa-inr"></i><strong id="carttotal"><?php echo e($subtotal); ?></strong> </span>
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

                            <h6 class="mb-1 text-secondary">Expected Delivery</h6>
                            <p class="mb-0 text-secondary">in 4-5 Days (approx) </p>
                            <p class="mb-0 text-secondary"> <?php echo e(date("H:i, d M",strtotime("+4 days"))); ?> - <?php echo e(date("H:i, d M",strtotime("+5 days"))); ?></p>
                        </div>
                        <div class="col-md-12 pt-4">

                            <h5 class=" ">We accept</h5>

                            <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg" alt="Visa">
                            <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg" alt="American Express">
                            <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg" alt="Mastercard">
                            <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png" alt="PayPal acceptance mark">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing & Shipping Details</h4>
                <form class="needs-validation" novalidate="" id="checkOutForm" onsubmit="">
                <div class="container-fluid <?php if(Auth::check() && !empty(Auth::User()->address)): ?> d-none  <?php else: ?>  <?php endif; ?> " id="formDetails">
                <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Full name</label>
                            <input type="text" class="form-control" id="user_name" placeholder="Your full name" value="<?php echo e(strtoupper(@Auth::User()->name)); ?>" required="">
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
                    <div class="mb-3 row">
                        <div class="col-sm-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Address line 1 <small>*(required)</small></label>
                                <input class="form-control" type="text" placeholder="Address line 1" data-bs-original-title="" title="" required id="address_line_1" required value="<?php echo e(@$user->address->address_line_1); ?>">
                                <div class="invalid-feedback">
                                       Please enter a Address for delivery .
                                 </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-7">
                            <div class="mb-3">
                                <label class="form-label">Address line 2 </label>
                                <input class="form-control" type="text" placeholder="Address line 2" data-bs-original-title=""  title="" id="address_line_2" value="<?php echo e(@$user->address->address_line_2); ?>">
                            </div>
                            
                        </div>
                        <div class="col-sm-6 col-md-5">
                            <div class="mb-3">
                                <label class="form-label">Landmark (*)</label>
                                <input class="form-control" type="text" placeholder="Address Landmark" data-bs-original-title="" required title="" id="landmark" value="<?php echo e(@$user->address->landmark); ?>">
                                <div class="invalid-feedback">
                                   Please enter a Landmark for delivery updates.
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Country (*)</label>
                                <input class="form-control" type="text" placeholder="Shipping Country" data-bs-original-title="" required title="" id="country" value="<?php echo e(@$user->address->country); ?>">   
                                <div class="invalid-feedback">
                                      Please enter a Country for delivery updates.
                                </div>                      
                            </div>
                            
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="mb-3">
                                <label class="form-label">State (*)</label>
                                <input class="form-control" type="text" placeholder="Shipping State" data-bs-original-title="" required title="" id="state" value="<?php echo e(@$user->address->state); ?>">  
                                <div class="invalid-feedback">
                                    Please enter a State for delivery updates.
                                </div>                       
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="mb-3">
                                <label class="form-label">District (*)</label>
                                <input class="form-control" type="text" placeholder="Shipping District" data-bs-original-title="" required title="" id="district" value="<?php echo e(@$user->address->district); ?>">   
                                <div class="invalid-feedback">
                                    Please enter a District for delivery updates.
                                </div>                      
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="zip">Zip<span class="text-muted">(*)(Enter PIN to qualify for delivery)</span></label>
                            <input type="text" class="form-control" id="zip" placeholder="Enter Your PIN to qualify for Service" placeholder="" required="" value="<?php echo e(@Auth::User()->pin); ?>">
                            <div class="invalid-feedback" id="loader">
                              Enter correct ZIP code of delivery
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-success " id="saveDetails"> <i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
                <div class="container-fluid  <?php if(Auth::check() && !empty(Auth::User()->address)): ?> <?php else: ?> d-none <?php endif; ?>" id="savedDetails">
                    <div class="row">
                        <div class="col-md-12">
                        <h6> Contact Details <span class="pull-right badge badge-outline-success badge-light text-dark shadow-sm showForm"><i class="fa fa-pencil"></i></span></h6>
                        </div>
                         <div class="col-md-12">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span>Name:</span>
                                    <span class="pull-right" id="savedName"><?php echo e(@Auth::User()->name ?? ""); ?></span>
                                </li>
                                <li class="list-group-item">
                                    <span>Email:</span>
                                    <span class="pull-right" id="savedEmail"><?php echo e(@Auth::User()->email ?? ""); ?></span>
                                </li>
                                <li class="list-group-item">
                                    <span>Mobile Number:</span>
                                    <span class="pull-right" id="savedContact"><?php echo e(@Auth::User()->contact ?? ""); ?></span>
                                </li>
                            </ul>
                            </div>
                    </div>
                  
                    <div class="row mt-4">
                        <div class="col-md-12">
                        <h6>Address Details <span class="pull-right badge badge-outline-success badge-light text-dark shadow-sm showForm"><i class="fa fa-pencil"></i></span></h6>
                        </div>
                         <div class="col-md-12">
                            <ul class="list-group">
                                <li class="list-group-item">                                   
                                    <span >
                                        <p id="savedAddress"><?php echo e(!empty($address) ? $address->address_line_1 . ", " . $address->address_line_2 . ", ". $address->landmark.", ".$address->district.", ".$address->zip_code : ""); ?></p>                                                                             
                                    </span>
                                </li>
                              
                            </ul>
                            </div>
                    </div>

                </div>
                

                    <hr class="mb-4">

                    <h4 class="mb-3">Payment</h4>
                    <div class="d-block my-3">
                        <div class="custom-control custom-radio mb-2">
                            <input id="credit" name="paymentMethod" disabled type="radio" class="custom-control-input" value="online_payment" required=""  >
                            <label class="custom-control-label" for="credit">Online Payment <small class="text-danger">*(use this for<strong> Faster delivery. </strong>)</small></label>
                        </div>
                        <div class="custom-control custom-radio mb-2">
                            <input id="gpay" name="paymentMethod"  type="radio" class="custom-control-input" value="google_pay" required=""  >
                            <label class="custom-control-label" for="gpay">Google Pay<small class="text-danger">*(use this for<strong> Faster delivery. </strong>)</small></label>
                        </div>
                        <div class="custom-control custom-radio mb-2">
                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="" value="cash_on_delivery" checked>
                            <label class="custom-control-label" for="debit">Pay On Delivery</label>
                        </div>
                    </div>



                    <hr class="mb-4">
                    <div class="row justify-content-center">
                        <div id="orderMessage"></div>
                    </div>
                    <input type="hidden" name="token" id="token" value="<?php echo e(csrf_token()); ?>">
                    <input type="hidden" name="amount" value="<?php echo e(@array_sum(array_column($charges, 'amount')) + @$subtotal); ?>" id="fTotal">
                    <button class="btn btn-warning border shadow-sm text-dark btn-lg btn-block" id="orderButton" onclick="continueOrder()"> Continue to Order <i class="fa fa-arrow-right"></i></button>
                </form>
            </div>

        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>
<script src="<?php echo e(asset('/js/paymentInterface.js')); ?>"></script>
<?php echo $__env->make("userpanel.js.googlePay", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make("userpanel.js.razorPay", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    document.getElementById("checkOutForm").addEventListener("submit", function(event) {
        event.preventDefault()
    });
    $(".showForm").on("click",function(e){
        e.preventDefault();
        $("#formDetails, #savedDetails").toggleClass("d-none")        
    })
    let addressbag = []
    let fullAddress;
    let address_1;
    let address_2 ;
    let landmark;
    let country;
    let district;
    let state;
    let zip ;
    
    const makeAddress = () => {
        addressbag = []
        address_1 = $("#address_line_1").val();
        address_2 = $("#address_line_2").val();
        landmark = $("#landmark").val();
        country = $("#country").val();
        district = $("#district").val();
        state = $("#state").val();
        zip = $("#zip").val();

           if(address_1)
           addressbag.push(address_1)
           if(address_2)
           addressbag.push(address_2)
           if(landmark)
           addressbag.push(landmark)          
           if(district)
           addressbag.push(district)
           if(state)
           addressbag.push(state)
           if(zip)
           addressbag.push(zip)
           if(country)
           addressbag.push(country)

          fullAddress = addressbag.join(", ")
    }
    const isAddressGiven = () => {
       makeAddress();
       if(address_1 &&
        landmark &&
        country &&
        district &&
        state &&
        zip){
            return true;
           }
           else return false;
    }
    $("#saveDetails").on("click",function(e){
        e.preventDefault()
        if ($("#checkOutForm").valid() && isAddressGiven()){         
            $("#savedAddress").html(fullAddress)
            $("#savedName").html($("#user_name").val())
            $("#savedEmail").html($("#user_email").val())
            $("#savedContact").html($("#user_contact").val())
            $("#formDetails, #savedDetails").toggleClass("d-none")     
        }     
        else{
            $.notify({
                message: "Please fill out the form properly!"
            }, {
                type: 'danger',
                z_index: 10000,
                timer: 2000,
            })
        }  
    })
    
    const placeOrder = async () => {       
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
            $.notify({
                        message: "Order placed successfully"
                    }, {
                        type: 'success',
                        z_index: 10000,
                        timer: 2000,
                    })
            window.open("/track-order/" + response.details.order_id)
        })
    }
    const continueOrder = async () => {
        let paymentGateway;
        if ($("#checkOutForm").valid() && isAddressGiven()) {
            let payment_method = $("#checkOutForm input[name='paymentMethod']:checked").val()
           if(payment_method == "online_payment"){
            paymentGateway = new razorPay()
            paymentGateway.initiatePayment();
           }
           else if(payment_method == "google_pay"){
            paymentGateway = new googlePay()
            paymentGateway.initiatePayment();
            // onGooglePaymentButtonClicked()
           }
           else{
            await placeOrder()
           }
        }
        else {
            $.notify({
                message: "Please fill out the form properly!"
            }, {
                type: 'danger',
                z_index: 10000,
                timer: 2000,
            })
        }

    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/userpanel/newcheckout.blade.php ENDPATH**/ ?>