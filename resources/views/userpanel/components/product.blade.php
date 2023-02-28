 <div class="col-lg-4 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row m-b-30">
                                    <div class="col-md-5 col-xxl-12">
                                        <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                            <div class="new-arrivals-img-contnent">
                                                <img class="img-fluid" src="/storage/{{@$product->image}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-xxl-12">
                                        <div class="new-arrival-content position-relative">
                                            <h4>{{$product->title}}</h4>
                                            <p class="price"><s style="color: red;font-size: 12px"><i class="fa fa-inr"></i>{{$item->pre_price ?? ""}}</s>
       <i class='fa fa-inr'></i>{{$product->current_price}}</p>
                                            <p>Availability: <span class="item"> In stock <i class="fa fa-check-circle text-success"></i></span></p>
                                            
                                            <div class="comment-review star-rating text-right">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star-half-empty"></i></li>
                                                    <li><i class="fa fa-star-half-empty"></i></li>
                                                </ul>
                                               
                                            </div>
                                        </div>
                                        <input type="hidden" id="qty_{{$product->id}}" class="form-control" value="1">
                                        <button type="button" class="btn btn-success" onclick="addtocart('{{$product->id}}','{{csrf_token()}}')" id="cartbtn_{{$product->id}}">Add to Cart <span class="btn-icon-right"><i class="fa fa-shopping-cart"></i></span>
                                </button>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>