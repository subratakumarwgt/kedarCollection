<?php if (isset($component)) { $__componentOriginal8924c23e417b6eae31abf68b7c772e451d2b8718 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Userpanel\Master::class, ['page' => $page]); ?>
<?php $component->withName('userpanel.master'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['user_id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user_id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8924c23e417b6eae31abf68b7c772e451d2b8718)): ?>
<?php $component = $__componentOriginal8924c23e417b6eae31abf68b7c772e451d2b8718; ?>
<?php unset($__componentOriginal8924c23e417b6eae31abf68b7c772e451d2b8718); ?>
<?php endif; ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/userpanel/custom_page.blade.php ENDPATH**/ ?>