
<div class="col-md-7 p-2">
    <div class=" p-2" style="text-align: left;"><span class="badge badge-<?php echo e($order->current_status == 'pending'? 'warning text-dark border-dark' : 'primary'); ?>"><?php echo e(strtoupper($order->current_status)); ?></span></div>
    <div class=" m-2">ID: <?php echo e($order->order_id); ?></div>
</div>
<div class="col-md-5 p-1">
    <div class=" p-2" style="text-align: right;"><?php echo e(date("h:i A | d M",strtotime($order->created_at))); ?></div>
    <div class=" m-2" style="text-align: right;"><i class="fa fa-phone"></i> : <?php echo e($order->user_contact); ?></div>
</div>
<?php if($order->current_status == 'pending'): ?>

<div class="col-md-12 pl-5">
    <ul class="mb-3" id="order_details">
        <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="p-1 border-bottom">
           <?php echo e($item->quantity); ?> x <?php echo e($item->product->title); ?> <strong class="pull-right mr-5">₹<?php echo e($item->subtotal); ?></strong>

        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <div class="container">
        <div class="row">           
            <div class="col-md-8">
            <button class="btn btn-sm acceptOrder btn-success text-right" data-order_id="<?php echo e($order->order_id); ?>" onclick="acceptOrder(<?php echo e($order->order_id); ?>)"><i class="fa fa-check-circle"></i> Accept</button>
            <button class="btn btn-sm rejectOrder btn-danger text-right" data-order_id="<?php echo e($order->order_id); ?>"><i class="fa fa-times-circle"></i> Reject</button>  
            </div>  
        </div>
        </div>
    </div>
    <?php elseif($order->current_status == 'confirmed'): ?>

    <div class="col-md-12 pl-5">   
        <input type="hidden" id="remaining_second" value="<?php echo e(strtotime($order->step_two->details->estimated_delivery) - strtotime('now')); ?>"> 
    <div class="container">
        <div class="row justify-content-center">  
            <div class="col-md-12 text-center text-primary">Time left : <strong id="time_left"><?php echo e(date("i : s",(strtotime($order->step_two->details->estimated_delivery) - strtotime("now")))); ?></strong></div> 
        </div>
        <div class="row justify-content-center">           
            <div class="col-md-7 ">
            <div class="progress" style="height: 35px;">
            <div id="progress_bar" class="progress-bar progress-bar-striped progress-bar-animated"  role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 75%;height:35px"></div>
            </div>
              </div> 
              <div class="col-md-5">
              <button class="btn  readyOrder btn-success text-right" data-order_id="<?php echo e($order->order_id); ?>" onclick="openReadyModal(<?php echo e($order->order_id); ?>)"><i class="fa fa-check-circle"></i> Order ready</button>
              </div> 
        </div>
        </div>
    </div>
    <script>
       var countDownDate = new Date("<?php echo e($order->step_two->details->estimated_delivery); ?>").getTime();
       var orderConfirmed = new Date("<?php echo e($order->step_two->details->confirmed_on); ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;
  var total_distance = countDownDate - orderConfirmed

  // Time calculations for days, hours, minutes and seconds

  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
//   console.log(Math.floor((distance * 100) / total_distance),"done")

  $("#progress_bar").width(Math.floor((distance * 100) / total_distance)+"%")

  // Display the result in the element with id="demo"
 $("#time_left").html(`${minutes}:${seconds}`)

 minutes > 1 ? $("#readyMessage").html(`We still have ${minutes} minutes left.`) : ""

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    $("#time_left").html(`Please ready order ASAP !`)
  }
}, 1000);
    </script>

        <?php elseif($order->current_status == 'food_ready'): ?>

<div class="col-md-12 pl-5">   
    <input type="hidden" id="remaining_second" value="<?php echo e(strtotime($order->step_two->details->estimated_delivery) - strtotime('now')); ?>"> 
<div class="container">
    <div class="row justify-content-center">  
        <div class="col-md-12 text-center text-primary">Time left : <strong id="time_left"><?php echo e(date("i : s",(strtotime($order->step_two->details->estimated_delivery) - strtotime("now")))); ?></strong></div> 
    </div>
    <div class="row ">  
    <div class="col-9 p-2">
            <div class="p-2">
                <ul class="list m-1 p-1">
                    <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($item->quantity); ?> x <?php echo e($item->product->title); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="col-3 p-2">

            <div class="p-1 mr-2  text-success" style="text-align: right;">
                <div class="small text-dark">total</div>
                <h6> ₹ <?php echo e($order->total); ?></h6>
            </div>
        </div>   
    <div class="col-md-7">
            <div class="progress" style="height: 35px;">
            <div id="progress_bar" class="progress-bar progress-bar-striped progress-bar-animated"  role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 75%;height:35px"></div>
            </div>
              </div>    
          <div class="col-md-5">
          <button class="btn  readyOrder btn-success text-right" data-order_id="<?php echo e($order->order_id); ?>" onclick="packOrder(event,this)"><i class="fa fa-check-circle"></i> Order packed & handed over</button>
          </div> 
    </div>
    </div>
</div>
<script>
       var countDownDate = new Date("<?php echo e($order->step_two->details->estimated_delivery); ?>").getTime();
       var orderConfirmed = new Date("<?php echo e($order->step_two->details->confirmed_on); ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;
  var total_distance = countDownDate - orderConfirmed

  // Time calculations for days, hours, minutes and seconds

  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
//   console.log(Math.floor((distance * 100) / total_distance),"done")

  $("#progress_bar").width(Math.floor((distance * 100) / total_distance)+"%")

  // Display the result in the element with id="demo"
 $("#time_left").html(`${minutes}:${seconds}`)

 minutes > 1 ? $("#readyMessage").html(`We still have ${minutes} minutes left.`) : ""

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    $("#time_left").html(`Please ready order ASAP !`)
  }
}, 1000);
    </script>
    <?php elseif($order->current_status == 'packed'): ?>

<div class="col-md-12 pl-5">   
    <input type="hidden" id="remaining_second" value="<?php echo e(strtotime($order->step_two->details->estimated_delivery) - strtotime('now')); ?>"> 
<div class="container">
    <div class="row justify-content-center">  
        <div class="col-md-12 text-center text-primary">Time left : <strong id="time_left"><?php echo e(date("i : s",(strtotime($order->step_two->details->estimated_delivery) - strtotime("now")))); ?></strong></div> 
    </div>
    <div class="row ">  
    <div class="col-9 p-2">
            <div class="p-2">
                <ul class="list m-1 p-1">
                    <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($item->quantity); ?> x <?php echo e($item->product->title); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="col-3 p-2">

            <div class="p-1 mr-2  text-success" style="text-align: right;">
                <div class="small text-dark">total</div>
                <h6> ₹ <?php echo e($order->total); ?></h6>
            </div>
        </div>   
    <div class="col-md-7">
            <div class="progress" style="height: 35px;">
            <div id="progress_bar" class="progress-bar progress-bar-striped progress-bar-animated"  role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 75%;height:35px"></div>
            </div>
              </div>    
          <div class="col-md-5">
          <button class="btn  readyOrder btn-success text-right" data-order_id="<?php echo e($order->order_id); ?>" onclick="deliverOrder(event,this)"><i class="fa fa-check-circle"></i> Delivered </button>
          </div> 
    </div>
    </div>
</div>
<script>
       var countDownDate = new Date("<?php echo e($order->step_two->details->estimated_delivery); ?>").getTime();
       var orderConfirmed = new Date("<?php echo e($order->step_two->details->confirmed_on); ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;
  var total_distance = countDownDate - orderConfirmed

  // Time calculations for days, hours, minutes and seconds

  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
//   console.log(Math.floor((distance * 100) / total_distance),"done")

  $("#progress_bar").width(Math.floor((distance * 100) / total_distance)+"%")

  // Display the result in the element with id="demo"
 $("#time_left").html(`${minutes}:${seconds}`)

 minutes > 1 ? $("#readyMessage").html(`We still have ${minutes} minutes left.`) : ""

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    $("#time_left").html(`Please ready order ASAP !`)
  }
}, 1000);
    </script>
<?php elseif($order->current_status == 'delivered'): ?>
<div class="col-md-12 pl-5">   
    <input type="hidden" id="remaining_second" value="<?php echo e(strtotime($order->step_two->details->estimated_delivery) - strtotime('now')); ?>"> 
<div class="container p-3">
    <h5 class="fa fa-success h6">Order delivered successfully .Time: <?php echo e(date("h:i A | d M",strtotime($order->step_five->details->delivered_on))); ?></h5>
    <!-- <p><strong>Total time :  </strong></p> -->
    </div>
</div>
<?php endif; ?>
<?php /**PATH C:\Users\subra\Documents\projects\rollswallah\resources\views/adminpanel/expenses/components/order_info.blade.php ENDPATH**/ ?>