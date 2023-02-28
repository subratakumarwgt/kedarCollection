
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
<div class="" style="height: 200px;position:fixed;filter: blur(12px);-webkit-filter: blur(12px);"><img src="<?php echo e(asset('assets/images/bg_3-33.jpg')); ?>" alt="" style="min-width: 1000px;"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Font Awesome -->
<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"> -->
<!-- Google Fonts -->

<div class="row justify-content-center  mt-4">
  <div class="col-md-10  p-4 bg-white mb-4 shadow-sm">

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
    <div class="row pl-3 pr-3 pt-0 mt-0">

      <!--Grid column-->
      <div class="col-lg-8">

        <!-- Card -->
        <div class="mb-3">
          <div class="pt-4 wish-list">

            <h5 class="mb-4 text-primary"><i class="fa fa-shopping-cart" aria-hidden="true"></i> (<span>2</span> items)</h5>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row mb-4">

              <div class="col-md-5 col-lg-3 col-xl-3">
                <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0 p-3">
                <?php if(!empty($item->product->on_offer)): ?>
                        <div class="ribbon ribbon-danger text-white border-danger ribbon-bottom-left ">Offer!</div>
                        <?php endif; ?>
                  <img class="img-fluid w-100" src="/<?php echo e($item->product->image); ?>" alt="Sample">
                  <!-- <a href="#!">
                  <div class="mask">
                    <img class="img-fluid w-100"
                      src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12.jpg">
                    <div class="mask rgba-black-slight"></div>
                  </div>
                </a> -->
                </div>
              </div>
              <div class="col-md-7 col-lg-9 col-xl-9">
                <div>

                  <div class="d-flex justify-content-between">
                    <div class="col-md-6">
                      <h5 class="h5"><?php echo e($item->product->title); ?></h5>
                      <p class="mb-0"><span><strong id="summary" class=" text-secondary  "><i class="fa fa-inr"></i> <?php echo e((!empty($item->product->on_offer) ? $item->product->price : $item->product->pre_price )); ?></strong></span>
                        <span class="text-danger"><?php if(!empty($item->product->on_offer)): ?><del><i class="fa fa-inr"></i> <?php echo e($item->product->pre_price); ?></del><?php endif; ?> </span></p class="mb-0">
                         <span class=" text-danger"><?php echo e((!empty($item->product->on_offer) ? "You saved Rs. ".($item->product->pre_price - $item->product->price) : "" )); ?></span></span>
                    </div>
                    <div>

                      <div class="def-number-input number-input safari_only mb-0 w-100">

                        <div class="qty-box">
                          <div class="input-group"><span class="input-group-prepend">
                              <button class="btn quantity-left-minus cart_dec" type="button" data-type="minus" data-field="" data-value="<?php echo e($item->id); ?>"><i data-feather="minus"></i></button></span>
                            <input class="form-control input-number" type="text" name="quantity" id="quantity_<?php echo e($item->id); ?>" readonly value="<?php echo e($item->quantity); ?>"><span class="input-group-prepend">
                              <button class="btn quantity-right-plus cart_inc" type="button" data-type="plus" data-field="" data-value="<?php echo e($item->id); ?>"><i data-feather="plus"></i></button></span>
                          </div>
                        </div>




                      </div>


                    </div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <a href="#!" type="button" class="btn btn-outline-danger btn-sm  text-uppercase m-1" onclick="deletecart('<?php echo e($item->id); ?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></i>  </a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <hr class="">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




          </div>
        </div>
        <!-- Card -->

        <!-- Card -->
       
        <!-- Card -->

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-4 mt-4">

        <!-- Card -->
        <div class="mb-3">
          <div class="p-3">

            <h5 class="mb-3">Charges</h5>

            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Subtotal
                <span><i class="fa fa-inr"></i><strong id="carttotal"><?php echo e($subtotal_total); ?></strong> </span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center  px-0 pb-0">
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
    }
    else
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
<?php echo $__env->make('userpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\rollswallah\resources\views/userpanel/cart.blade.php ENDPATH**/ ?>