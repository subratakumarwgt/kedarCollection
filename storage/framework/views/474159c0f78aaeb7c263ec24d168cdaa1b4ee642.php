
<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<style>
    .cats{
      cursor: pointer;

    }
    .cats:hover {
        background-color: blue;
        color: white;
        transition: 0.5s;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h5> Doctors</h5>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"><a href="/cart-items">Doctors</a></li>
             
<?php $__env->stopSection(); ?>
<?php $__env->startSection('banner'); ?>
<div class="" style="height: 200px;position:fixed;filter: blur(12px);-webkit-filter: blur(12px);"><img src="<?php echo e(asset('assets/images/bg_3-33.jpg')); ?>" alt="" style="min-width: 1000px;"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">



            <div class="row justify-content-center mt-3">
                 <div class="col-md-10 card">
                  
                  <div class="card-body">
                      <div class="row justify-content-center">
                       <div class="col-md-10 row justify-content-center " action="#" method="get">
                    <div class="form-group col-8 p-1">
                        <input class="form-control w-100 shadow-sm" type="text" placeholder="Search by Name, Clinic, Specialist etc." title="" id="">
                    </div>
                    <div class="col-4 p-1">
                        <button class="btn btn-primary btn-pill shadow-sm">Search</button>
                    </div>
                </div>
                </div>
                  </div>
               
                </div>
                 <div class="col-md-10 card">
           
            <div class="card-body">
               
                 <div class="owl-carousel owl-theme col-12" id="owl-carousel-13">
                    <div class="item " >
                        <h5 class="">
                            <div class="badge badge-light p-3 bg-white shadow-sm text-primary rounded-pill border badge-pill border">Cardiologist </div>
                        </h5>
                    </div>
                    <div class="item " >
                        <h5 class="">
                            <div class="badge badge-light p-3 bg-white shadow-sm text-primary rounded-pill border badge-pill border">Nafrologist </div>
                        </h5>
                    </div>
                    <div class="item " >
                        <h5 class="">
                            <div class="badge badge-light p-3 bg-white shadow-sm text-primary rounded-pill border badge-pill border">Onchologist </div>
                        </h5>
                    </div>
                    <div class="item " >
                        <h5 class="">
                            <div class="badge badge-light p-3 bg-white shadow-sm text-primary rounded-pill border badge-pill border  ">ENT Special</div>
                        </h5>
                    </div>
                    <div class="item " >
                        <h5 class="">
                            <div class="badge badge-light p-3 bg-white shadow-sm text-primary rounded-pill border badge-pill border  ">Gynocologist</div>
                        </h5>
                    </div>
                </div>
                  
                </div>
            </div>
      
                <div class="col-md-10">
                    <div class="row justify-content-center">
        <?php if($doctors->count() > 0): ?>
        <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card">
            <div class="card-body row justify-content-center">
                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="">
                                <div class="card-profile text-center"><img class="rounded-circle" src="/<?php echo e($doctor->image); ?>" width="170px" alt=""></div>
                                <div class="text-center profile-details">
                                    <h4 class="text-primary"><a href="/doctor/<?php echo e($doctor->id); ?>">Dr. <?php echo e(strtoupper($doctor->name)); ?> <small><i class="fas fa-share-square"></i></small></a></h4>
                                    <h6 class="text-secondary"><?php echo e(strtoupper($doctor->specialist)); ?></h6>
                                </div>
                                <div class="card-footer row">
                                    <div class="col-4 col-sm-4">
                                        <h6>Exp.</h6>
                                        <h5><span class="badge badge-light text-primary"><?php echo e($doctor->experience); ?> years</span></h5>
                                    </div>
                                    <div class="col-4 col-sm-4">
                                        <h6>Patients</h6>
                                        <h5><span class="badge badge-light text-primary">200+</span></h5>
                                    </div>
                                    <div class="col-4 col-sm-4">
                                        <h6>Visits</h6>
                                        <h5><span class="badge badge-light text-primary"><?php echo e($doctor->visit_frequency); ?></span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 justify-content-center">
                            <div class="">
                                <?php ($centre = \App\Models\Centre::find(json_decode($doctor->centre_id_json,true)[0])); ?>
                                <div class="card-body row">
                                    <div class="row bg-light text-primary p-2">
                                        <p class="text-primary"><i class="fas fa-clinic-medical"></i> <?php echo e($centre->name); ?></p>
                                        <p class="text-primary"><i class="fas fa-map-marker-alt"></i> <?php echo e($centre->address); ?></p>
                                        <p class="text-primary"><i class="fas fa-clock"></i> <?php echo e(json_decode($doctor->visits->others_json)->from_time); ?>-<?php echo e(json_decode($doctor->visits->others_json)->to_time); ?></p>
                                    </div>
                                    <div class="row text-dark   mt-4 mb-4">
                                        <div class="col-6">Fees: <strong><i class="fas fa-inr"></i> <?php echo e($doctor->full_charge); ?></strong></div>
                                        <div class="col-6"> Booking: <strong><i class="fas fa-inr"></i> <?php echo e($doctor->booking_charge); ?></strong></div>
                                    </div>


                                    <h6>Upcoming Dates of Visits</h6>
                                    <div class="owl-carousel owl-theme owl-carousel-15" id="">
                                        <?php $__currentLoopData = $doctor->slots->take(7); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item">
                                            <h5>
                                                <div class="badge badge-light text-primary badge-pill  "><?php echo e(date('l, d M',strtotime($slot->date))); ?> </div>
                                            </h5>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="row p-3 justify-content-center">
                                        <input class="doctor_details" id="<?php echo e($doctor->id); ?>_details" type="hidden" value="<?php echo e(json_encode(['doctor'=>$doctor,'centre'=>$centre,'timming'=>json_decode($doctor->visits->others_json),'slots'=>$doctor->slots,'user'=>@Auth::User()])); ?>">
                                        <button class="btn btn-dark btn-pill btn-lg book_btn"><i class="far fa-calendar-check"></i> Book Appointment</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <div class="alert alert-danger">Sorry! We could not load more doctors</div>
        <?php endif; ?>
        <?php if($doctors->hasMorePages()): ?>
        <div class="col-md-12 pull-right"><a class="nav-link" href=" <?php echo e($doctors->nextPageUrl()); ?>">See More...</a></div>
        <?php endif; ?>
                    </div></div></div>
    </div>


<div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body" id="book_fields"></div>
            <div class="modal-footer">
                <button id="rzp-button1" class="btn btn-primary btn-gradient shadow-sm">Pay (<i class="fa fa-inr">10</i>)</button>
                <button class="btn btn-secondary btn-sm" type="button">Save changes</button>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/owlcarousel/owl.carousel.js')); ?>"></script>
<script>
    var owl_carousel_custom = {
        init: function() {
            var owl = $('#owl-carousel-13');
            owl.owlCarousel({
                items: 3,
                loop: true,
                margin: 30,
                autoplay: true,
                autoWidth:true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                nav: false,
                dots: false,

            });
            var owl = $('.owl-carousel-15');
            owl.owlCarousel({
                items: 2,
                dots: false,
                loop: true,
                nav: false,
                autoplay: true,
                autoWidth:true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                margin: 30,
            }), owl.on('mousewheel', '.owl-stage', function(e) {
                if (e.deltaY > 0) {
                    owl.trigger('next.owl');
                } else {
                    owl.trigger('prev.owl');
                }
                e.preventDefault();
            });
        }
    };

    (function($) {
        "use strict";
        owl_carousel_custom.init();
    })(jQuery);

    $("#search_doctor").select2({

    })
</script>
<script>
    $(function() {

        //console.log($("#28_details").val())
        const collectData = (data) => {
          //  console.log(data)
            data = JSON.parse(data);
            var options="";
            $.each(data.slots,function(key,val){
                 options = options+`<option value='${val.date}'>${val.date}</option>`
            })
            console.log(options)
            return $(`<div class="row justify-content-center  p-3">
                <div class="col-3"><img src="/${data.doctor.image}" class="img-fluid" width="90px"></div>
    <div class="col-9"> <h5>Dr. ${data.doctor.name}</h5>
        <h6>${data.doctor.specialist}</h6></div>
       
    </div>
    <div class="row  p-3">
        <p class="text-primary"><i class="fas fa-clinic-medical"></i>${data.centre.name} </p>
        <p class="text-primary"><i class="fas fa-map-marker-alt"></i>${data.centre.address} </p>
        <p class="text-primary"><i class="fas fa-clock"></i>${data.timming.from_time}-${data.timming.to_time}</p>
        <div class="row p-3 m-0">
        <div class="col-6 text-primary">Fees: <strong><i class="fas fa-inr"></i> ${data.doctor.full_charge}</strong></div>
        <div class="col-6 text-primary"> Booking: <strong><i class="fas fa-inr"></i> ${data.doctor.booking_charge}</strong></div>
    </div>
    </div>
   
    <div class="row p-3">
    <form id="booking_form">
       <input type="hidden" name="doctor_id" value="${data.doctor.id}" id="doctor_id">
       <input type="hidden" name="centre_id" value="${data.centre.id}" id="centre_id">     
      
       <div class="row p-3 mt-1">
       <label>Choose Appointment Date*</label>
      <select class='form-control' id='booking_date'>${options}</select>
       </div>
     
       <div class="row p-3 mt-1">
       <label>Patient Name*</label>
       <input type="text" name="user_name" value="${data.user.name}" class="form-control" id="user_name">
       </div>
       
       <div class="row p-3 mt-1">
       <label>Patient Contact*</label>
       <input type="text" name="user_contact" value="${data.user.contact}" class="form-control" id="user_contact">
       </div>
     
       
   </form>
    </div>`);
        }

        $('.book_btn').on('click', function() {

            $("#bookModal").modal("show");
            $("#book_fields").html(collectData($(this).parent('div').find("input[type=hidden]").val()))
            // $("#)
        })
    })
</script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.getElementById('rzp-button1').onclick = function(e) {
     
        var button = $(this);
        loadoverlay(button)
        button.prop('disabled', true);
        e.preventDefault();
     
                        var form = new FormData();
                        form.append("booking_date", $("#booking_date").val());
                        form.append("doctor_id", $("#doctor_id").val());
                        form.append("user_contact", $("#user_contact").val());
                        form.append("user_name", $("#user_name").val());
                        form.append("booking_type", "check_up");
                        form.append("centre_id", $("#centre_id").val());
                       
                        console.log(form);
                        var settings = {
                            "url": "/api/validate-appointment",
                            "method": "POST",
                            "timeout": 0,
                            "processData": false,
                            "mimeType": "multipart/form-data",
                            "contentType": false,
                            "data": form,
                            statusCode: {
                400: function(res) {
                     hideoverlay(button)
                    button.prop('disabled', false);
                    ress = JSON.parse(res.responseText);
                  
                    if (ress.errors) {
                        $.each(ress.errors,function(key,val){
                       $("#"+key).after(`<span class="error">${val[0]}</span>`)
                       $.notify({
                        message: `${val[0]}`
                    }, {
                        type: 'danger',
                        z_index: 10000,
                        timer: 5000,
                    });
                   })
                    }
                  
                   
                    // response = JSON.parse(response);
                //    res = JSON.parse(res)
                    $.notify({
                        message: ress.message
                    }, {
                        type: 'danger',
                        z_index: 10000,
                        timer: 5000,
                    });
                },
                500: function() {
                    hideoverlay(button)
                    $(".error").remove();
                    button.prop('disabled', false);
                    $.notify({
                        message: "Something went wrong! Please try again"
                    }, {
                        type: 'danger',
                        z_index: 10000,
                        timer: 5000,
                    })
                }
            }

                        };

                          $.ajax(settings).done(function(response) {
                            $(".error").remove();
                            hideoverlay(button)
                        var book_res = JSON.parse(response) ;
                        button.prop('disabled', true);
                        $.notify({
                        message: "Your booking is validated. Initiating payment..."
                        }, {
                        type: 'success',
                        z_index: 10000,
                        timer: 5000,
                        })
                        var form = new FormData();
        var amount = 10;
        form.append("order_type", "APPNT");
        form.append("amount", amount);

        var settings = {
            "url": "/api/make-order",
            "method": "POST",
            "timeout": 0,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": form,
            statusCode: {
                400: function(res) {
                    button.prop('disabled', false);
                    res = JSON.parse(res.responseText)
                    $.notify({
                        message: res.message
                    }, {
                        type: 'danger',
                        z_index: 10000,
                        timer: 5000,
                    });
                },
                500: function() {
                    button.prop('disabled', false);
                    $.notify({
                        message: "Something went wrong! Please try again"
                    }, {
                        type: 'danger',
                        z_index: 10000,
                        timer: 5000,
                    })
                }
            }

        };

          $.ajax(settings).done(function(response) {
            var order_response = JSON.parse(response);
            var options = {
                "key": "rzp_test_zyjdsYczp0XCJh", // Enter the Key ID generated from the Dashboard
                "amount": amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                "currency": "INR",
                "name": "ALL IS WELL",
                "order_id": order_response.data.order_id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                "handler": function(response) {
                    // alert(response.razorpay_payment_id);
                    // alert(response.razorpay_order_id);
                    // alert(response.razorpay_signature);
                    var form = new FormData();
                    form.append("payment_id", response.razorpay_payment_id);
                    form.append("order_id", response.razorpay_order_id);
                    form.append("status", "success");
                    form.append("amount", amount);
                    form.append("type", "online_razorpay");
                    form.append("details_json", JSON.stringify(response));
                    form.append("user_contact", $("#user_contact").val());

                    var settings = {
                        "url": "/api/make-purchase",
                        "method": "POST",
                        "timeout": 0,
                        "processData": false,
                        "mimeType": "multipart/form-data",
                        "contentType": false,
                        "data": form,
                        statusCode: {
                400: function(res) {
                    button.prop('disabled', false);
                    //hideoverlay(button)
                    // response = JSON.parse(response);
                    res = JSON.parse(res)
                    $.notify({
                        message: res.responseText.message
                    }, {
                        type: 'danger',
                        z_index: 10000,
                        timer: 5000,
                    });
                },
                500: function() {
                    button.prop('disabled', false);
                    //hideoverlay(button)
                    //	response = JSON.parse(response);
                    $.notify({
                        message: "Something went wrong! Please try again"
                    }, {
                        type: 'danger',
                        z_index: 10000,
                        timer: 5000,
                    })
                }
            }
                    };

                    $.ajax(settings).done(function(response) {
                        var payment_res = JSON.parse(response);
                        var form = new FormData();
                        form.append("booking_date", $("#booking_date").val());
                        form.append("doctor_id", $("#doctor_id").val());
                        form.append("user_contact", $("#user_contact").val());
                        form.append("user_name", $("#user_name").val());
                        form.append("booking_type", "check_up");
                        form.append("centre_id", $("#centre_id").val());
                        form.append("payment_id", payment_res.data.id);
                        form.append("amount_due", "0");
                        form.append("amount_paid", amount);

                        var settings = {
                            "url": "/api/book-appointment",
                            "method": "POST",
                            "timeout": 0,
                            "processData": false,
                            "mimeType": "multipart/form-data",
                            "contentType": false,
                            "data": form,
                            statusCode: {
                400: function(res) {
                    button.prop('disabled', false);
                    //hideoverlay(button)
                    // response = JSON.parse(response);
                    res = JSON.parse(res)
                    $.notify({
                        message: res.responseText.message
                    }, {
                        type: 'danger',
                        z_index: 10000,
                        timer: 5000,
                    });
                },
                500: function() {
                    button.prop('disabled', false);
                    //hideoverlay(button)
                    //	response = JSON.parse(response);
                    $.notify({
                        message: "Something went wrong! Please try again"
                    }, {
                        type: 'danger',
                        z_index: 10000,
                        timer: 5000,
                    })
                }
            }

                        };

                        $.ajax(settings).done(function(response) {
                            var book_res = JSON.parse(response) ;
                            button.prop('disabled', true);
                            $.notify({
                        message: "Your Booking was successfull"
                    }, {
                        type: 'success',
                        z_index: 10000,
                        timer: 5000,
                    })

                        });
                    });
                    //hideoverlay(button);
                },
                "modal": {
                    "ondismiss": function() {
                        $.notify({
                        message: "Checkout form was closed!"
                    }, {
                        type: 'warning',
                        z_index: 10000,
                        timer: 5000,
                    })

                        console.log('Checkout form closed');
                    }
                },
                "prefill": {
                    "name": $("#user_name").val(),
                    "contact": $("#user_contact").val(),
                },
                "notes": {
                    "address": "All Is Well Corporate Office"
                },
                "theme": {
                    "color": "#3399cc"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
            e.preventDefault();

            rzp1.on('payment.failed', function(response) {
                console.log(response.error)
                // alert(response.razorpay_signature);
                var form = new FormData();
                form.append("payment_id", "");
                form.append("order_id", order_response.data.order_id);
                form.append("status", "failed");
                form.append("amount", amount);
                form.append("type", "online_razorpay");
                form.append("details_json", JSON.stringify(response.error));
                form.append("user_contact", $("#user_contact").val());

                var settings = {
                    "url": "/api/make-purchase",
                    "method": "POST",
                    "timeout": 0,
                    "processData": false,
                    "mimeType": "multipart/form-data",
                    "contentType": false,
                    "data": form,
                    statusCode: {
                400: function(res) {
                    //hideoverlay(button)
                    // response = JSON.parse(response);
                    res = JSON.parse(res)
                    $.notify({
                        message: res.responseText.message
                    }, {
                        type: 'danger',
                        z_index: 10000,
                        timer: 5000,
                    });
                },
                500: function() {
                    //hideoverlay(button)
                    //	response = JSON.parse(response);
                    $.notify({
                        message: "Something went wrong! Please try again"
                    }, {
                        type: 'danger',
                        z_index: 10000,
                        timer: 5000,
                    })
                }
            }

                };

                $.ajax(settings).done(function(response) {
                    var payment_res = JSON.parse(response);
                    $.notify({
                        message: "Your payment was failed! Please try again"
                    }, {
                        type: 'warning',
                        z_index: 10000,
                        timer: 5000,
                    })

                });
                //hideoverlay(button);
            });
        });
                        });
                 
       // loadoverlay($(button));
  



    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\Projects\alliswell\Cuba\resources\views/userpanel/doctor-list.blade.php ENDPATH**/ ?>