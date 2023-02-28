
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/date-picker.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3><i class="fas fa-list"></i> All Slots </h3> <button class="pull-right btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i></button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Slots</li>
<li class="breadcrumb-item active">List</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <form class="row justify-content-center">
    <div class="col-md-4 mb-2">
            <label>Search by Centre</label>
            <select class="form-control shadow-sm" id="centres" multiple="multiple" >
            <?php $__currentLoopData = $centres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $centre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($centre->id); ?>"><?php echo e($centre->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-4 mb-2">
            <label>Search by Doctor</label>
            <select class="form-control shadow-sm" id="doctors" name="doctor_id">
                <option value=""></option>
            </select>
        </div>
       
        <div class="col-md-2 mb-2 mt-4 p-2">
            <button class="btn btn-outline-primary btn-sm  shadow-sm">Search</button>
        </div>
        </form>
        <div class="col-md-4 mb-4">
            <label>From Date</label>
            <input class="form-control shadow-sm " type="date" value="<?php echo e(date('Y-m-d')); ?>">
        </div>
        <div class="col-md-4 mb-4">
            <label>To Date</label>
            <input class="form-control shadow-sm" type="date" value="<?php echo e(date('Y-m-d')); ?>">
        </div>
        <div class="col-md-2 mb-2 mt-4 p-2">
            <button class="btn btn-outline-primary btn-sm shadow-sm">Search</button>
        </div>
        <?php $__currentLoopData = $slots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-11">
            <div class="bg-white shadow-sm mb-2 ">
                <div class="card-body border-primary border">
                    <div class="row">
                        <div class="col-sm-2 col-md-2 p-2 text-centre"><img src="/<?php echo e($slot->doctor->image); ?>" style="width: 180px;" class="img-fluid">
                            <p class="text-primary ">Dr <?php echo e(strtoupper($slot->doctor->name)); ?></p>
                        </div>

                        <div class=" col-md-4 p-2">

                            <p class="text-primary"><i class="fas fa-clinic-medical"></i> <?php echo e(@$slot->centre->name); ?></p>
                            <p class="text-primary"><i class="fas fa-map-marker-alt"></i> <?php echo e(@$slot->centre->address); ?></p>
                            <p class="text-primary"><i class="fas fa-clock"></i> <?php echo e(@json_decode($slot->doctor->visits->others_json)->from_time); ?>-<?php echo e(@json_decode($slot->doctor->visits->others_json)->to_time); ?></p>

                        </div>
                        <div class=" col-md-3 p-2">
                            <p class="text-primary"><i class="fa fa-calendar" aria-hidden="true"></i> from: <?php echo e(date("d M,Y")); ?></p>
                            <p class="text-primary"><i class="fa fa-calendar" aria-hidden="true"></i> to: <?php echo e(date("d M,Y")); ?></p>
                        </div>
                        <div class="col-md-3 p-2">
                            <p class="text-primary"> Total Slots: <?php echo e($slot->slots); ?></p>
                        
                        </div>
                    </div>
                </div>
                <div class="card-footer border-danger border">
                    <div class="table-responsive row justify-content-center d-none mb-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        Date
                                    </th>
                                    <th>
                                        Free Slots
                                    </th>
                                    <th>
                                        Centre Name
                                    </th>
                                    <th>
                                        From
                                    </th>
                                    <th>
                                        To
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $slot->doctor->slots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slot_dates): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <form method="post" action="/operation/slot/update/<?php echo e($slot_dates->id); ?>"><?php echo csrf_field(); ?>
                                    <tr>
                                        <td class="col-2"><?php echo e($slot_dates->date); ?> </td>
                                        <td><input class="form-control col-2" type="text" value="<?php echo e($slot_dates->free_slots); ?>" name="free_slots"> </td>
                                        <td class="col-2"><?php echo e($slot_dates->centre->name); ?> </td>
                                        <td><input class="form-control col-2" type="text" value="<?php echo e($slot_dates->from_time); ?>" name="from_time"> </td>
                                        <td ><input class="form-control col-2" type="text" value="<?php echo e($slot_dates->to_time); ?>" name="to_time"> </td>
                                        <td class="col-2"><button class="btn btn-sm btn-outline-primary text-dark shadow-sm" type="submit"> <i class="fa fa-refresh"></i></button><a class="btn btn-sm shadow-sm" href="/operation/slot/delete/<?php echo e($slot_dates->id); ?>" type="button"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                </form>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>

                    </div>
                   <button class="btn btn-outline-secondary  shadow-sm btn-sm view-hide"><i class="fa fa-eye" aria-hidden="true"></i> View/Hide</button>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if($slots->hasMorePages()): ?>
        <div class="col-md-12 pull-right"><a class="nav-link" href=" <?php echo e($doctors->nextPageUrl()); ?>">See More...</a></div>
        <?php endif; ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.en.js')); ?>"></script>
<script>
    $(function() {
       // 
        $(".view-hide").on('click',function(){
            $(this).parent('div').find('div').toggleClass('d-none');
            $(this).parent('div').find('div').find('table').dataTable();
        })
        
        $("#from_date").datepicker({
            language: 'en',
            minDate: new Date() // Now can select only dates, which goes after today
        });
        $("#to_date").datepicker({
            language: 'en',
            minDate: new Date() // Now can select only dates, which goes after today
        });
        $("#from_date").on("change", () => {
            $("#to_date").datepicker("option", "minDate", new Date($(this).val()));
        })


        $("#create_slot").on("click", () => {
            loadoverlay($("#option_space"))
            var form = new FormData();



            form.append("doctor_id_list", JSON.stringify($("#doctors").val()));
            form.append("from_date", $("#from_date").val());
            form.append("to_date", $("#to_date").val());

            var settings = {
                "url": "/api/create-slots",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form,

                statusCode: {
                    400: function() {
                        hideoverlay($("#option_space"))
                        // response = JSON.parse(response);
                        $.notify({
                            message: "Please upload valid data"
                        }, {
                            type: 'danger',
                            z_index: 10000,
                            timer: 2000,
                        });
                    },
                    500: function() {
                        hideoverlay($("#option_space"))
                        //	response = JSON.parse(response);
                        $.notify({
                            message: "Something went wrong!"
                        }, {
                            type: 'danger',
                            z_index: 10000,
                            timer: 2000,
                        })
                    }
                }
            };

            $.ajax(settings).done(function(response) {
                hideoverlay($("#option_space"))
                var json_response = JSON.parse(response);
                // $.each(json_response.slot_data,(key,val)){}

                $.notify({
                    message: json_response.message
                }, {
                    type: 'success',
                    z_index: 10000,
                    timer: 2000,
                })
            })
        })
        $("#centres").select2();
        
        $("#centres").on('change', (e) => {
            $('#doctors').select2({
                tags: false,
                ajax: {
                    "url": "/api/centre-doctors/",
                    "method": "post",
                    delay: 600,
                    minimumResultsForSearch: -1,
                    data: function(params) {
                        var query = {
                            centres: JSON.stringify($("#centres").val())
                        }

                        // Query parameters will be ?search=[term]&page=[page]
                        return query;
                    },
                    processResults: function(response) {
                        response = JSON.parse(response);
                        return {
                            results: response.items
                        };

                    },

                },

            });

            $.each($("#doctors").children("option"), function() {
                this.prop("selected", "selected");
            })

        })

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\Projects\alliswell\Cuba\resources\views/adminpanel/slots/slotlist.blade.php ENDPATH**/ ?>