<div class="col">
    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
        <div class="timeline-step">
            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2003">
                <div class="inner-circle bg-success"> </div>
                <p class=" mt-3 mb-1 <?php if(!empty($order->step_one->created_at)): ?> text-success <?php endif; ?>"> <?php if(!empty($order->step_one->created_at)): ?><i class="fa fa-check-circle"></i> <?php else: ?> <i class="fa fa-times-circle"></i> <?php endif; ?> Placed</p>
                <?php if(!empty($order->step_one->created_at)): ?><span><?php echo e(date("h:i A",strtotime($order->step_one->created_at))); ?> </span> <?php else: ?> <span class="badge badge-light text-dark"> Not Yet</span> <?php endif; ?>
            </div>
        </div>
        <div class="timeline-step">
            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2004">
                <div class="inner-circle bg-danger"></div>
                <p class=" mt-3 mb-1 <?php if(!empty($order->step_two->created_at)): ?> text-success <?php endif; ?>"> <?php if(!empty($order->step_two->created_at)): ?><i class="fa fa-check-circle"></i> <?php else: ?> <i class="fa fa-times-circle"></i> <?php endif; ?> Confirmed</p>
                <?php if(!empty($order->step_two->created_at)): ?><span><?php echo e(date("h:i A",strtotime($order->step_two->created_at))); ?> </span> <?php else: ?> <span class="badge badge-light text-dark"> Not Yet</span> <?php endif; ?>
            </div>
        </div>
        <div class="timeline-step">
            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2005">
                <div class="inner-circle"></div>
                <p class="  mt-3 mb-1 <?php if(!empty($order->step_three->created_at)): ?> text-success <?php endif; ?>"> <?php if(!empty($order->step_three->created_at)): ?><i class="fa fa-check-circle"></i> <?php else: ?> <i class="fa fa-times-circle"></i> <?php endif; ?> Order Ready</p>
                <?php if(!empty($order->step_three->created_at)): ?><span><?php echo e(date("h:i A",strtotime($order->step_three->created_at))); ?> </span> <?php else: ?> <span class="badge badge-light text-dark"> Not Yet</span> <?php endif; ?>
            </div>
        </div>
        <div class="timeline-step">
            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2010">
                <div class="inner-circle"></div>
                <p class=" mt-3 mb-1 <?php if(!empty($order->step_four->created_at)): ?> text-success <?php endif; ?>"> <?php if(!empty($order->step_four->created_at)): ?><i class="fa fa-check-circle"></i> <?php else: ?> <i class="fa fa-times-circle"></i> <?php endif; ?> Packed</p>
                <?php if(!empty($order->step_four->created_at)): ?><span><?php echo e(date("h:i A",strtotime($order->step_four->created_at))); ?> </span> <?php else: ?> <span class="badge badge-light text-dark"> Not Yet</span> <?php endif; ?>
            </div>
        </div>
        <div class="timeline-step mb-0">
            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2020">
                <div class="inner-circle"></div>
                <p class=" mt-3 mb-1 <?php if(!empty($order->step_five->created_at)): ?> text-success <?php endif; ?>"> <?php if(!empty($order->step_five->created_at)): ?><i class="fa fa-check-circle"></i> <?php else: ?> <i class="fa fa-times-circle"></i> <?php endif; ?> Delievered</p>
                <?php if(!empty($order->step_five->created_at)): ?><span><?php echo e(date("h:i A",strtotime($order->step_five->created_at))); ?> </span> <?php else: ?> <span class="badge badge-light text-dark"> Est. <?php echo e(date("h:i A",strtotime($order->step_five->expected_delivery))); ?></span> <?php endif; ?>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/adminpanel/expenses/components/order_timeline.blade.php ENDPATH**/ ?>