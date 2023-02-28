<div class="col-xl-3 col-md-3 col-sm-6 xl-3">             
             <div class="product-box">
             
          <div class=" mb-1 mr-1" >
          <div class="row shadow bg-white text-Primary" >
               <div class="col-md-12 col-sm-12 col-5">
                <div class="product-img  product_img_wrapper" >
                   <img class="img-fluid" src="/{{$product->image}}" alt="" >
                   @if(!empty($product->on_offer))
                   <div class="ribbon ribbon-warning text-dark border-warning ribbon-bottom-right ">  Offer</div>
                   @endif
                   @if(!empty($product->on_offer))
                   <div class="ribbon ribbon-danger text-white border-danger ribbon-bottom-left "> - <i class="small fa fa-inr"></i> {{($product->pre_price - $product->price)}}</div>
                   @endif
                   <div class="product-hover">
                      <ul>
                         <li>
                            <button class="btn add-to-cart" type="button" data-product = "{{$product->id}}"><i class="icon-shopping-cart"></i></button>
                         </li>
                         <li>
                            <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter_{{$product->id}}"><i class="icon-eye"></i></button>
                         </li>
                         <!-- <li>
                            <button class="btn" type="button"><i class="icofont icofont-law-alt-2"></i></button>
                         </li> -->
                      </ul>
                   </div>
                </div>
               </div>
               <div class="col-md-12 col-sm-12 col-7">
                <div class="modal fade" id="exampleModalCenter_{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter_{{$product->id}}" aria-hidden="true">
                   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                      <div class="modal-content" id="modal_content_{{$product->id}}">
                         <div class="modal-body">
                            <div class="product-box row">
                               <div class="product-img col-lg-6"><img class="img-fluid" src="/{{$product->image}}" alt="" id="img_{{$product->id}}"></div>
                               <div class="product-details col-lg-6 text-start">
                                  <h4 id="title_{{$product->id}}" class="">{{$product->title}}</h4>
                                  <div class="product-price" id="price_{{$product->id}}"><i class="fa fa-inr"></i>{{$product->price}}
                                   <del class="text-danger" id="pre_price_{{$product->id}}"> MRP: <i class="fa fa-inr"></i>{{$product->pre_price}}</del>
                                  </div>
                                
                                 
                                     <div class="product-qnty">
                                     <h6 class="f-w-600">Quantity</h6>
                                     <fieldset>
                                        <div class="input-group">
                                           <input class="touchspin text-center" type="text" value="1" id="product_qty_{{$product->id}}" readonly="">
                                        </div>
                                     </fieldset>
                                     <div class="addcart-btn">
                                        <button class="btn btn-dark btn-pill add-to-cart" type="button" data-quantity="{{$product->id}}" data-product = "{{$product->id}}" id="addBtn_{{$product->id}}">Add to Cart</button>
                                        
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
                   <strong class="h6 product_title_1 pt-0 m-0" > {{$product->title}}</strong>
                   <div class="product-price text-success "><i class="fa fa-inr"></i> {{!empty($product->on_offer) ? $product->price : $product->pre_price}}
                   @if(!empty($product->on_offer))     <del class="text-danger"><small><i class="fa fa-inr"></i> {{$product->pre_price}}   </small> </del>
                 
                   @endif
                   
                   </div>
                   <div class="addcart-btn mb-2">
                       <button class="btn btn-outline-dark btn-block text-primary   add-to-cart" type="button" data-quantity="{{$product->id}}" data-product = "{{$product->id}}" id="addBtn_{{$product->id}}"><i class="fa fa-shopping-cart"></i> Add </button>
                   </div>
                </div>
               </div>
             </div>
          </div>
       </div>
       </div>