<script src="<?php echo e(asset('assets/js/jquery-3.5.1.min.js')); ?>"></script>
<!-- Bootstrap js-->
<script src="<?php echo e(asset('assets/js/bootstrap/bootstrap.bundle.min.js')); ?>"></script>
<!-- feather icon js-->
<script src="<?php echo e(asset('assets/js/icons/feather-icon/feather.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/icons/feather-icon/feather-icon.js')); ?>"></script>
<!-- scrollbar js-->
<script src="<?php echo e(asset('assets/js/scrollbar/simplebar.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/scrollbar/custom.js')); ?>"></script>
<!-- Sidebar jquery-->
<script src="<?php echo e(asset('assets/js/config.js')); ?>"></script>
<!-- Plugins JS start-->
<script id="menu" src="<?php echo e(asset('assets/js/sidebar-menu.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/loadingoverlay.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
<script src="https://kit.fontawesome.com/568e34549e.js" crossorigin="anonymous"></script>
<!-- <script src="<?php echo e(asset('assets/js/form-validation-custom.js')); ?>"></script> -->

<script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script>
    function loadoverlay(object) {
        object.LoadingOverlay('show', {
            image: "data:image/png;base64,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",
            imageAnimation: "800ms rotate_right",
            size: 120,
        });
    }

    function hideoverlay(object) {
        object.LoadingOverlay('hide');
    }
    var imgInp = document.getElementById("image");
    if (imgInp) {
        imgInp.onchange = evt => {
            loadoverlay($("#img_prv"));
            const [file] = imgInp.files
            if (file) {
                hideoverlay($("#img_prv"));
                img_prv.src = URL.createObjectURL(file)

            }
        }
    }
    window.post = (url, data) => {
  return fetch(url, {method: "POST", body: JSON.stringify(data)});
}
// setTimeout(()=>{  $("#sidebar_space").load("/management/render-sidebar")},3000)
$(document).ready(async function(){
 
//     var settings = {
//   "url": "/management/render-sidebar",
//   "method": "POST",
//   "timeout": 0,
//   "processData": false,
//   "mimeType": "multipart/form-data",
//   "contentType": false,
// //   "data": form,
//   error:function(){
//    // hideoverlay($("#config_form"))
//     $.notify({
//       message:"Can't render sidebar!"
//    },{
//     type:'danger',
//     z_index:10000,
//     timer:2000,
//    });
//   }
// };

// await $.ajax(settings).done(function (response) {
//  response = JSON.parse(response)
 

 


// });
})
</script>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>

<script>
    const admin_broadcast = $("#admin_broadcast").val();

    var this_user_id = <?php echo e(Auth::User()->id); ?>

    var this_user_status = <?php echo e(Auth::User()->userStatus->is_online ?? 1); ?>


    const playNewOrder = () => {
      var audio = new Audio('/storage/audio/new_order_recieved.mp3');
       audio.play();
    }

    // console.log(Echo)
    Echo.channel('booking')
        .listen('NewBooking', (e) => {
            var data = JSON.stringify(e);
            var notification = $(`<li>
              <p><i class="fa fa-circle-o me-3 font-primary"> </i>New Booking Recieved! from : ${e.booking.user_name} <span class="pull-right">${new Date()}</span></p>
            </li>`)
            $(".notification-dropdown").append(notification);
            var count = $("#notif_count").html();
            count = parseInt(count);
            count++;
            $("#notif_count").html(count);
            $.notify({
                message: `New Booking Recieved! from ${e.booking.user_name}`
            }, {
                type: 'success',
                z_index: 10000,
                timer: 20000,
            })

            alert("New Booking. ID: "+e.booking.id);
         })
     Echo.private(`orders.admin`)
      .listen('NewOrder', (e) => {
        // console.log(e.order);
        var notification = $(`<li>
              <p><i class="fa fa-circle-o me-3 text-primary"> </i>New Order Recieved:ID ${e.order.order_id}  : ${e.time}</p>
            </li>`)
            $("#notify").append(notification);
            var count = $("#notif_count").html();
            count = parseInt(count);
            count++;
            $("#notif_count").html(count);
            if (typeof getOrderHistory === "function")
           { 
            getOrderCoupons()
            getOrderHistory(e.order.order_id)
            playNewOrder()
           }
            else
            window.open("/management/order-history")
            $.notify({
                message: `New Order Recieved: ID ${e.order.order_id}, from ${e.order.user_contact}`
            }, {
                type: 'success',
                z_index: 10000,
                timer: 20000,
            })
       
    });
    window.online_users = []
    Echo.join('online')
    .here((users) => {
      online_users = users
      console.log("here method",users)

    })
    .joining((user) => {
        deBounceUserStatus(user,1)
        $.notify({
                message: `New user joined ${user.name}`
            }, {
                type: 'success',
                z_index: 10000,
                timer: 2000,
            })
            let new_row = $(`<tr id="user_row_${user.id}">
    <td>${user.name}</td>
    <td>${user.contact}</td>
    <td id="user_status_${user.id}"><i class="fa fa-circle shadow-sm text-success"></i></td>
   <td><button class="btn btn-sm btn-outline-dark user_action shadow-sm" data-action="notify" data-user_id="${user.id}"><i class="fa fa-envelope"></i> Notify </button></td>
</tr>`)

let new_user_row = $(`
    <li class="clearfix user_info" id="user_info_${user.id}" data-user_id = "${user.id}" role="button" >
    	<img class="rounded-circle user-image" src="/storage/${user.profile ? user.profile.image : ""  }" alt="<?php echo e(asset('assets/images/user/1.jpg')); ?>">
										<div class="status-circle online"></div>
										<div class="about">
											<div class="name">${user.name}</div>											
										</div>
									</li>`)
            $("#user_row_"+user.id).remove()
            $("#user_info_"+user.id).remove()


            $("#user_list").append(new_user_row)

            $("#tableBody").append(new_row)
    })
    .leaving((user) => {
        deBounceUserStatus(user,0)
        $("#user_status_"+user.id).html(`<i class="fa fa-circle shadow-sm text-danger"></i>`)
            let light = $("#user_info_"+user.id).find(".status-circle")
            light.removeClass("online")
            light.addClass("offline")
       
    })
    .error((error) => {
        console.error(error);
    });

    const deBounceUserStatus = (user, status = 1) => {
         let changeStatus 
         clearTimeout(changeStatus);
         changeStaus = setTimeout(() => {
            setUserSTatus(user,status)           
         }, 5000);
    }

    const setUserSTatus = (user,status = 1) => {
        $.post("/api/set-user-status",{us},(data)=>{
            console.log(data);
        })
    }
   
</script>
<?php echo $__env->yieldContent('script'); ?>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>

<?php if(Route::current()->getName() != 'popover'): ?>
<script src="<?php echo e(asset('assets/js/tooltip-init.js')); ?>"></script>
<?php endif; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('assets/js/theme-customizer/customizer.js')); ?>"></script> -->


<?php /**PATH C:\Users\subra\Documents\projects\rollswallah\resources\views/adminpanel/script.blade.php ENDPATH**/ ?>