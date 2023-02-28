
<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h5> Cart Items</h5>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">dashboard</li>
<li class="breadcrumb-item active">Cart </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('banner'); ?>
<div class="" style="height: 200px;position:fixed;filter: blur(90px);-webkit-filter: blur(20px);background:rgba(0, 0, 0, 0.7)"><img src="/images/banner.webp" alt="" style="min-width: 900px;"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Font Awesome -->
<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"> -->
<!-- Google Fonts -->

<div class="row justify-content-center  mt-4">
  <div class="col-md-10 p-4  mb-4 ">

    <!--Section: Block Content-->
    <section>
      <?php if($items->count() == 0): ?>
      <div class="row pl-3 pr-3 pt-0 mt-0 justify-content-center">

        <!--Grid column-->
        <div class="col-lg-8">
          <div class="alert alert-info text-center"> Your cart is empty!</div>


        </div>
      </div>

    </section>
    <?php else: ?>

    <!--Grid row-->
    <div class="row pl-3 pr-3  mt-5 ">

      <!--Grid column-->
      <div class="col-lg-8 mt-4">
           
        <!-- Card -->
        <div class="mb-3 ">
       
          <div class="p-3 wish-list">
          <h5 class="mb-3 text-dark"><i class="fa fa-shopping-cart" aria-hidden="true"></i> (<span><?php echo e(count($items)); ?></span> items)</h5>
    
             <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php ($set = !empty($item->offer_details) ? json_decode($item->offer_details) : ["variants" => null]); ?>
            <div class="row mb-2 wow fadeInLeft bg-light p-3 rounded">
      
              <div class="col-md-5 col-lg-3 col-xl-3">
              <?php if(!empty($item->onOffer)): ?> <div class="discount_tag"><?php echo e(@$item->offer->detail->value); ?><?php if($item->offer->detail->type == 2): ?>% <?php else: ?> <i class="fa fa-inr"></i> <?php endif; ?> OFF</div> <?php endif; ?>
                <div class="view zoom prod-image z-depth-1 rounded mb-3 mb-md-0 p-1">
             
                  <img class="img-fluid " src="/<?php echo e($item->product->image); ?>" alt="Sample">
                  <!-- <a href="#!">
                  <div class="mask">
                    <img class="img-fluid w-100"
                      src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12.jpg">
                    <div class="mask rgba-black-slight"></div>
                  </div>
                </a> -->
                </div>
              </div>
              <div class="col-md-7 col-lg-9 col-xl-9 ">
                <div>

                  <div class="d-flex justify-content-between row">
                    <div class="col-md-6">
                      <h5 class="h6"><?php echo e($item->product->name); ?>  <?php if(!empty($item->onOffer)): ?>  <?php endif; ?></h5>
                     
                      <h6 class="h5">
                        <?php if($item->variants): ?>
                        <?php $__currentLoopData = $item->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="badge badge-light text-dark border p-1 m-1 "><?php echo e($variant["variant"]); ?> <strong class="text-primary"><?php echo e(strtoupper($variant["value"])); ?></strong></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <?php if(isset($item->setOf)): ?>
                        <span class="badge badge-light text-dark border p-1 m-1"> set of <strong class="text-primary"><?php echo e($item->setOf); ?><small><?php echo e($item->product->unit ?? "pc"); ?></small></strong> </span>
                        <?php endif; ?>
                        </h6>
                     
                      <p class="mb-0 p-1 m-1 bg-light rounded"><span><strong id="summary" class="   "><i class="fa fa-inr"></i> <?php echo e(@$item->price); ?></strong></span>
                        <span class="text-danger"><?php if($item->pre_price > $item->price): ?><del><i class="fa fa-inr"></i> <?php echo e($item->pre_price); ?></del><?php endif; ?> </span>
                        <span class=" text-danger"><?php echo e((!empty($item->onOffer) ? "You saved Rs. ".($item->pre_price - $item->price) : "" )); ?></span>
                        <a href="#!" type="button" class="btn btn-danger   btn-sm  text-uppercase m-1" onclick="deletecart('<?php echo e($item->id); ?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></i> </a>
                   
                      </p>
                     
                      </div>
                    <div class="col-md-6 col-12  ">

                      <div class="def-number-input number-input safari_only">

                        <div class="qty-box pl-2 pr-2 pt-2">
                          <div class="input-group "><span class="input-group-prepend">
                              <button class="btn bg-dark text-white quantity-left-minus cart_dec" type="button" data-type="minus" data-field="" data-value="<?php echo e($item->id); ?>"><i data-feather="minus"></i></button></span>
                            <input class="form-control input-number" type="text" name="quantity" id="quantity_<?php echo e($item->id); ?>" readonly value="<?php echo e($item->quantity); ?>"><span class="input-group-append">
                              <button class="btn bg-dark text-white quantity-right-plus cart_inc" type="button" data-type="plus" data-field="" data-value="<?php echo e($item->id); ?>"><i data-feather="plus"></i></button></span>
                          </div>
                        </div>



                      </div>


                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
            <hr class="">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




          </div>
        </div>
       

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-4 mt-4">

        <!-- Card -->
        <div class="mb-3">
          <div class="p-3">

            <h5 class="mb-3">Charges</h5>

            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between p-2 mb-1 rounded align-items-center border-0 px-0 pb-0">
                Subtotal
                <span><i class="fa fa-inr"></i><strong id="carttotal"><?php echo e($subtotal_total); ?></strong> </span>
              </li>
              <li class="list-group-item d-flex justify-content-between p-2 mb-1 rounded align-items-center  px-0 pb-0">
                Discount
                <span class="text-danger"><i class="fa fa-inr"></i><strong id="carttotal"> - <?php echo e($discount); ?></strong> </span>
              </li>
              <?php $__currentLoopData = $charges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $charge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="list-group-item d-flex justify-content-between p-2 mb-1 rounded align-items-center p-1">
                <?php echo e($charge["charge_label"]); ?>

                <span><i class="fa fa-inr"></i><strong id="delivery"><?php echo e($charge["amount"] ?? 0); ?></strong></span>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <li class="list-group-item border-none d-flex justify-content-between p-2 mb-1 rounded ">
                <span>Total (INR)</span>
                <strong class="badge badge-dark badge-xl"><i class="fa fa-inr"></i><text id=""> <?php echo e(@array_sum(array_column($charges, 'amount')) + @$subtotal - $discount); ?></text></strong>
              </li>
            </ul>

            <button type="button" class="btn btn-primary btn-block" onclick="confirm('You want to go for checkout?'),window.open('/checkout','_self')">GO TO CHECKOUT</button>

          </div>

        </div>
        <!-- Card -->

        <!-- Card -->
        <!-- <div class="mb-3">
          <div class="pt-4">

            <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              Add a discount code (optional)
              <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
            </a>

            <div class="collapse" id="collapseExample">
              <div class="mt-3">
                <div class="md-form md-outline mb-0">
                  <input type="text" id="discount-code" class="form-control font-weight-light" placeholder="Enter discount code">
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <!-- Card -->

      </div>

      <!-- Grid row -->
      <?php endif; ?>
      </section>
      <!--Section: Block Content-->
    </div>
  </div>
  <!-- JQuery -->
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <!-- Bootstrap tooltips -->
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script> -->
  <!-- Bootstrap core JavaScript -->
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
  <!-- MDB core JavaScript -->
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.15.0/js/mdb.min.js"></script> -->
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('script'); ?>
  <script>
    $(".cart_inc").on('click', function() {
      var id = $(this).data('value');
      var quantity = $("#quantity_" + id).val();
      loadoverlay($("#quantity_" + $(this).data('value')));
      if ((parseInt(quantity) + 1) >= 9) {
        $.notify({
          message: "Quantity can not be 10"
        }, {
          type: 'danger',
          z_index: 10000,
          timer: 5000,
        })
        hideoverlay($("#quantity_" + id));
        return 0;
      } else
        $.ajax({

          url: '/api/cart/change-quantity',

          type: 'post',

          data: {
            'cart_id': id,
            'quantity': (parseInt(quantity) + 1)
          },

          success: function(response)

          {
            //  response = JSON.parse(response);
            $("#quantity_" + id).val(function(i, val) {
              hideoverlay($("#quantity_" + id));
              if (val >= 9) {
                $.notify({
                  message: "Quantity can not be 10"
                }, {
                  type: 'danger',
                  z_index: 10000,
                  timer: 5000,
                })
                return 8;
              }
              return ++val;
            });

            hideoverlay($("#quantity_" + id));
            $.notify({
              message: response.message
            }, {
              type: 'success',
              z_index: 10000,
              timer: 5000,
            })
            // showcart();

          }

        });


    })
    $(".cart_dec").on('click', function() {
      var id = $(this).data('value');
      var quantity = $("#quantity_" + id).val();
      loadoverlay($("#quantity_" + $(this).data('value')));
      if ((parseInt(quantity) - 1) <= 0) {
        hideoverlay($("#quantity_" + id));
        $.notify({
          message: "Quantity can not be 0"
        }, {
          type: 'danger',
          z_index: 10000,
          timer: 5000,
        })
        return 0;
      } else
        $.ajax({

          url: '/api/cart/change-quantity',

          type: 'post',

          data: {
            'cart_id': id,
            'quantity': (parseInt(quantity) - 1)
          },

          success: function(response)

          {
            //  response = JSON.parse(response);
            $("#quantity_" + id).val(function(i, val) {
              if (val >= 9) {
                toastr.warning("Max 9 plates at one order");
                return 8;
              }
              return --val;
            });

            hideoverlay($("#quantity_" + id));


            $.notify({
              message: response.message
            }, {
              type: 'success',
              z_index: 10000,
              timer: 5000,
            })
            // showcart();

          }

        });


    })
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('userpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/userpanel/cart.blade.php ENDPATH**/ ?>