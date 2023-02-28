
<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
<?php echo $__env->yieldPushContent("custom-css"); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Add New Content <i class="fas fa-plus"></i></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Contents</li>
<li class="breadcrumb-item active">Add Contents</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<input type="hidden" id="emailTemplate_id" value="<?php echo e(@$emailTemplate->id); ?>">
<?php if (isset($component)) { $__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Modal::class, []); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'selectProductModal','aria-labelledby' => 'selectProductModal']); ?>
    <?php if (isset($component)) { $__componentOriginalcc3492794cbecbbe449d66a08d9b456b5585a309 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SelectProduct::class, []); ?>
<?php $component->withName('select-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcc3492794cbecbbe449d66a08d9b456b5585a309)): ?>
<?php $component = $__componentOriginalcc3492794cbecbbe449d66a08d9b456b5585a309; ?>
<?php unset($__componentOriginalcc3492794cbecbbe449d66a08d9b456b5585a309); ?>
<?php endif; ?>
    <div class="p-2">
        <button type="button" class="setSelectedData btn btn-success btn-pill btn-sm"><i class="fa fa-check-circle"></i> Select</button>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c)): ?>
<?php $component = $__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c; ?>
<?php unset($__componentOriginal2bcebcb49cbd37095816ed3d3b22a3f8992f805c); ?>
<?php endif; ?>
<div class="container-fluid">
    <div class="card">
                <div class="card-body">
                <div class="row"><div class="col-md-9 pull-left"><h4  class="bg-white text-primary p-3  rounded">Add Email Template</h4></div>  <div class="col-md-3 pull-right"><a href="<?php echo e(route('email-template-list')); ?>" class="btn btn-primary btn-sm mr-3"><i class="fas fa-list"></i> Email Template list</a></div></div>
                
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" id="emailTemplateForm">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Email Template Name</label>
                                        <input class="form-control" type="text" placeholder="Name" data-bs-original-title="" id="name" required value="<?php echo e(@$emailTemplate->name); ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Email Template Subject</label>
                                        <input class="form-control" type="text" placeholder="type your subject" data-bs-original-title="" id="subject" required value="<?php echo e(@$emailTemplate->subject); ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="">Short Codes  (Click to copy, then paste where to replace)</label>
                                        <div class="p-3 shaodw-sm text-center">
                                            <?php $__currentLoopData = $short_codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="#" data-code="<?php echo e($code); ?>" class="badge code shadow badge-warning text-dark pointer"><?php echo e($code); ?></a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Email Template Body</label>                                 
                                       
                                        <textarea name="" id="text-box-body" class="form-control" rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label for="">Status</label>
                                    <div class="icon-state switch-outline m-1 ">
                                        <label class="switch">
                                            <input type="checkbox" <?php if(isset($emailTemplate) && $emailTemplate->status == "1"): ?> checked="" <?php endif; ?> data-bs-original-title="" title="" id="emailTemplate_status"><span class="switch-state  bg-success shadow-sm"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 mt-2 border-top pt-3">
                                    <div class="mb-3">
                                       <button type="button" class="btn btn-sm btn-primary" id="createEmail"><i class="fa fa-arrow-up"></i> <?php if(isset($emailTemplate)): ?>Update <?php else: ?> Create <?php endif; ?> emailTemplate</button>
                                       <button type="button" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i> Preview</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>
          </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/editor/ckeditor/ckeditor.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/editor/ckeditor/adapters/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/email-app.js')); ?>"></script>
<script>
    // var editor = CKEDITOR.editor.replace('text-box-body');
    $("#createEmail").on("click",async function(e){
        e.preventDefault();
        isValid = false
        var form = new FormData();
            form.append("table_name", "email_templates");
            form.append("field", "name");
            form.append("field_value", $("#name").val());
            form.append("table_model", "emailtemplate");

            var settings = {
                "url": "/api/distinct-data",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form,
                statusCode: {
                    400: function() {
                        $.notify({
                            message: "Sorry template title you provided already exists"
                        }, {
                            type: 'danger',
                            z_index: 10000,
                            timer: 2000,
                        });
                    }
                }
            };

            isValid = await $.ajax(settings).done(function(response) {
           
                $.notify({
                    message: "Data validated successfully"
                }, {
                    type: 'success',
                    z_index: 10000,
                    timer: 2000,
                });
                return true
                // dataTable.draw();
                console.log(response);
               
            })
          
        var form = new FormData();
            form.append("table_name", "email_templates");
            form.append("name", $("#name").val());
            form.append("subject", $("#subject").val());
            form.append("body",editor.getData());           
            form.append("table_model", "emailTemplate");

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
                        $.notify({
                            message: "Sorry could not upload data"
                        }, {
                            type: 'danger',
                            z_index: 10000,
                            timer: 2000,
                        });
                    }
                }
            };
            if(isValid)
            $.ajax(settings).done(function(response) {
                response = JSON.parse(response);
                $.notify({
                    message: response.message
                }, {
                    type: 'success',
                    z_index: 10000,
                    timer: 2000,
                });
               
            },function(){
                dataTable.draw();
                console.log(response);
            });
    })

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/adminpanel/templates/addEmailTemplate.blade.php ENDPATH**/ ?>