<div class="col-md-2 col-sm-6 col-6">
<i class="fa fa-trash text-danger small delete_btn" onclick="delete_item(event,<?php echo e($item->id); ?>)" style="display:none"></i>
    <div class="mr-1 mb-1 p-2 product product_id_<?php echo e($item->id); ?> <?php if(isset($selected) && $selected): ?> product_selected <?php endif; ?> border rounded" data-id="<?php echo e($item->id); ?>" data-price="<?php echo e($item->price); ?>" data-name="<?php echo e($item->name); ?>">
        <div class="img text-center">                        
        <span class=" col-md-12 p-1 rounded bg-light text-dark small item_name_place"> <?php echo e($item->name); ?></span> 
            <div class="cross_button d-none mt-1  justify-content-center">
                <div class="input-group">
                    <div class="input-group-prepend" onclick="changeQty(<?php echo e($item->id); ?>,-1)"><span class="input-group-text qty_btn minus"><i class="fa fa-minus"></i></span></div>
                        <input class="form-control qty_item_<?php echo e($item->id); ?> qty" type="number" min="1" max="10"  value="<?php echo e($item->qty ?? 1); ?>" data-bs-original-title="" title="" id="">
                    <div class="input-group-prepend" onclick="changeQty(<?php echo e($item->id); ?>,+1)"><span class="input-group-text qty_btn plus"><i class="fa fa-plus"></i></span></div>
                </div>
            </div>       
        </div>                    
        <div class="text-center border-top mt-2"><i class="fa fa-inr"></i> <?php echo e($item->price); ?> /<small class="text-dark"><?php echo e($item->unit); ?></small> </div>
    </div>
</div><?php /**PATH C:\Users\subra\Documents\projects\rollswallah\resources\views/components/item-box.blade.php ENDPATH**/ ?>