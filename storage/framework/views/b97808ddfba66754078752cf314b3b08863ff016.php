<div class="col-xl-3 col-md-3 col-sm-6 xl-3">             
             <div class="product-box">
             
          <div class=" mb-1 mr-1" >
          <div class="row shadow bg-white text-Primary" >
               <div class="col-md-12 col-sm-12 col-5">
                <div class="product-img  product_img_wrapper" >
                   <img class="img-fluid" src="/<?php echo e($product->image); ?>" alt="" >
                   <?php if(!empty($product->on_offer)): ?>
                   <div class="ribbon ribbon-warning text-dark border-warning ribbon-bottom-right ">  Offer</div>
                   <?php endif; ?>
                   <?php if(!empty($product->on_offer)): ?>
                   <div class="ribbon ribbon-danger text-white border-danger ribbon-bottom-left "> - <i class="small fa fa-inr"></i> <?php echo e(($product->pre_price - $product->price)); ?></div>
                   <?php endif; ?>
                   <div class="product-hover">
                      <ul>
                         <li>
                            <button class="btn add-to-cart" type="button" data-product = "<?php echo e($product->id); ?>"><i class="icon-shopping-cart"></i></button>
                         </li>
                         <li>
                            <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter_<?php echo e($product->id); ?>"><i class="icon-eye"></i></button>
                         </li>
                         <!-- <li>
                            <button class="btn" type="button"><i class="icofont icofont-law-alt-2"></i></button>
                         </li> -->
                      </ul>
                   </div>
                </div>
               </div>
               <div class="col-md-12 col-sm-12 col-7">
                <div class="modal fade" id="exampleModalCenter_<?php echo e($product->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter_<?php echo e($product->id); ?>" aria-hidden="true">
                   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                      <div class="modal-content" id="modal_content_<?php echo e($product->id); ?>">
                         <div class="modal-header">
                            <div class="product-box row">
                               <div class="product-img col-lg-6"><img class="img-fluid" src="/<?php echo e($product->image); ?>" alt="" id="img_<?php echo e($product->id); ?>"></div>
                               <div class="product-details col-lg-6 text-start">
                                  <h4 id="title_<?php echo e($product->id); ?>" class=""><?php echo e($product->title); ?></h4>
                                  <div class="product-price" id="price_<?php echo e($product->id); ?>"><i class="fa fa-inr"></i><?php echo e($product->price); ?>

                                   <del class="text-danger" id="pre_price_<?php echo e($product->id); ?>"> MRP: <i class="fa fa-inr"></i><?php echo e($product->pre_price); ?></del>
                                  </div>
                                
                                 
                                     <div class="product-qnty">
                                     <h6 class="f-w-600">Quantity</h6>
                                     <fieldset>
                                        <div class="input-group">
                                           <input class="touchspin text-center" type="text" value="1" id="product_qty_<?php echo e($product->id); ?>" readonly="">
                                        </div>
                                     </fieldset>
                                     <div class="addcart-btn">
                                        <button class="btn btn-dark btn-pill add-to-cart" type="button" data-quantity="<?php echo e($product->id); ?>" data-product = "<?php echo e($product->id); ?>" id="addBtn_<?php echo e($product->id); ?>">Add to Cart</button>
                                        
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="product-details">                       
                   <strong class="h6 product_title_1 pt-0 m-0" > <?php echo e($product->title); ?></strong>
                   <div class="product-price text-success "><i class="fa fa-inr"></i> <?php echo e(!empty($product->on_offer) ? $product->price : $product->pre_price); ?>

                   <?php if(!empty($product->on_offer)): ?>     <del class="text-danger"><small><i class="fa fa-inr"></i> <?php echo e($product->pre_price); ?>   </small> </del>
                 
                   <?php endif; ?>
                   
                   </div>
                   <div class="addcart-btn mb-2">
                       <button class="btn btn-outline-dark btn-block text-primary   add-to-cart" type="button" data-quantity="<?php echo e($product->id); ?>" data-product = "<?php echo e($product->id); ?>" id="addBtn_<?php echo e($product->id); ?>"><i class="fa fa-shopping-cart"></i> Add </button>
                   </div>
                </div>
               </div>
             </div>
          </div>
       </div>
       </div><?php /**PATH C:\Users\subra\Documents\projects\rollswallah\resources\views/components/product.blade.php ENDPATH**/ ?>