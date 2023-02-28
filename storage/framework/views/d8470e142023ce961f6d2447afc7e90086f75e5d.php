<section class=" sp_detail section_frame sectionP_4">
    <div class="container">
        <div class="row">
            <div class="col-md-5 product_view_left p-1" data-wow-duration=".8s">
                <div class="product_view_large">
                    <img src="/<?php echo e($product->image); ?>" class="img-fluid" />
                </div>
                <div class="owl-carousel product_view">
                    <div class="owl-item-in product_view_item">
                        <img width="200" height="200" src="/<?php echo e($product->image); ?>" class="img-fluid" />
                    </div>
                    <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="owl-item-in product_view_item">
                        <img width="200" height="200" src="/<?php echo e($image->image); ?>" class="img-fluid" />
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="col-md-7 product_view_right " data-wow-duration=".8s">
                <div class="product_details">
                    <div class="hd_style_1">
                        <h2 class="hd_text font-calps"><?php echo e(strtoupper($product->name)); ?></h2>
                        <h5 class="m-0 p-0"> <?php if(!empty($product->Category)): ?> <a href="<?php echo e(''); ?>" class="nav-link text-primary small m-0 p-0"><?php echo e($product->Category->name); ?></a><?php endif; ?></h5>
                    </div>
                    <div class="prod_desc">
                        <p><?php echo e($product->description); ?></p>
                    </div>

                    <?php if(!empty($product->variants->count())): ?>
                    <?php $__currentLoopData = $productArray["variants"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="sizes spec d-flex align-items-center flex-wrap variant">
                        <div class="spec_left">
                            <label class="small"><?php echo e(@$var['variant']['name']); ?></label>
                            <input type="hidden" class="variant_name" value="<?php echo e(@$var['variant']['name']); ?>">
                        </div>
                        <div class="spec_right variant_value_holder" style="font: space 3px;">
                            <?php if(!empty($var['variant']['product_variant_values'])): ?>
                            <?php $__currentLoopData = $var['variant']['product_variant_values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="select_color_item mb-1 mt-1">
                                <input type="radio" name="select_size_<?php echo e($var['variant']['name']); ?>" class="variant_value" value='<?php echo e(isset($val["value"]["value"]) ? $val["value"]["value"] : ""); ?>'>
                                <span class="badge badge-light border border-primary text-primary p-2 shadow variant_value_label"><?php echo e(isset($val["value"]["value"]) ? strtoupper($val["value"]["value"]) : ""); ?></span>
                            </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <div class="sp_price spec d-flex align-items-center flex-wrap">
                        <div class="spec_left">
                            <label class="small">Price</label>
                        </div>
                        <div class="spec_right font-calps h6" style="font: space 3px;">
                            <div class="small">
                                <select class="form-control col-md-3 shadow border-primary text-primary quantity_variant">
                                    <?php $__currentLoopData = $product->quantities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($qty->quantity); ?>_<?php echo e($qty->price); ?>"><span class="price_sign"> ₹ </span> <?php echo e($qty->price); ?> / <?php echo e($qty->quantity); ?>pc</option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="spec_act d-flex align-items-center flex-wrap">
                        <div class="input-group prod_quant">
                            <button class="btn_quant minus">
                                <img width="10" height="10" src="/images/remove.png" class="img-fluid" />
                            </button>
                            <input type="text" class="form-control readonly quantity" value="1" readonly style="z-index:0;">
                            <button class="btn_quant plus">
                                <img width="10" height="10" src="/images/add.png" class="img-fluid" />
                            </button>
                        </div>
                        <a href="#" class="btn btn-primary font-calps m-1 add-to-cart" data-quantity="<?php echo e($product->id); ?>" data-product="<?php echo e($product->id); ?>" data-product_offer="<?php echo e(json_encode($product->offer)); ?>"><img width="30" height="30" src="/images/cart-black.png"> Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if (isset($component)) { $__componentOriginalc1813dbdf8d62a4fbdc9499c1ecfd1f9b25fb002 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SimilarProduct::class, ['product' => $product]); ?>
<?php $component->withName('similar-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc1813dbdf8d62a4fbdc9499c1ecfd1f9b25fb002)): ?>
<?php $component = $__componentOriginalc1813dbdf8d62a4fbdc9499c1ecfd1f9b25fb002; ?>
<?php unset($__componentOriginalc1813dbdf8d62a4fbdc9499c1ecfd1f9b25fb002); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginal2d72de7c638edbe1bb9f75fc3a6d0d93ebf5a815 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Userpanel\Topsellers::class, []); ?>
<?php $component->withName('userpanel.topsellers'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d72de7c638edbe1bb9f75fc3a6d0d93ebf5a815)): ?>
<?php $component = $__componentOriginal2d72de7c638edbe1bb9f75fc3a6d0d93ebf5a815; ?>
<?php unset($__componentOriginal2d72de7c638edbe1bb9f75fc3a6d0d93ebf5a815); ?>
<?php endif; ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/components/single-product.blade.php ENDPATH**/ ?>