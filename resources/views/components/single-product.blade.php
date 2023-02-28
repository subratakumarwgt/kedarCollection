<section class=" sp_detail section_frame sectionP_4">
    <div class="container">
        <div class="row">
            <div class="col-md-5 product_view_left p-1" data-wow-duration=".8s">
                <div class="product_view_large">
                    <img src="/{{$product->image}}" class="img-fluid" />
                </div>
                <div class="owl-carousel product_view">
                    <div class="owl-item-in product_view_item">
                        <img width="200" height="200" src="/{{$product->image}}" class="img-fluid" />
                    </div>
                    @foreach($product->images as $image)
                    <div class="owl-item-in product_view_item">
                        <img width="200" height="200" src="/{{$image->image}}" class="img-fluid" />
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-7 product_view_right " data-wow-duration=".8s">
                <div class="product_details">
                    <div class="hd_style_1">
                        <h2 class="hd_text font-calps">{{strtoupper($product->name)}}</h2>
                        <h5 class="m-0 p-0"> @if(!empty($product->Category)) <a href="{{''}}" class="nav-link text-primary small m-0 p-0">{{$product->Category->name}}</a>@endif</h5>
                    </div>
                    <div class="prod_desc">
                        <p>{{$product->description}}</p>
                    </div>

                    @if(!empty($product->variants->count()))
                    @foreach($productArray["variants"] as $var)
                    <div class="sizes spec d-flex align-items-center flex-wrap variant">
                        <div class="spec_left">
                            <label class="small">{{@$var['variant']['name']}}</label>
                            <input type="hidden" class="variant_name" value="{{@$var['variant']['name']}}">
                        </div>
                        <div class="spec_right variant_value_holder" style="font: space 3px;">
                            @if(!empty($var['variant']['product_variant_values']))
                            @foreach($var['variant']['product_variant_values'] as $val)
                            <label class="select_color_item mb-1 mt-1">
                                <input type="radio" name="select_size_{{$var['variant']['name']}}" class="variant_value" value='{{isset($val["value"]["value"]) ? $val["value"]["value"] : ""}}'>
                                <span class="badge badge-light border border-primary text-primary p-2 shadow variant_value_label">{{isset($val["value"]["value"]) ? strtoupper($val["value"]["value"]) : "" }}</span>
                            </label>
                            @endforeach
                            @endif

                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="sp_price spec d-flex align-items-center flex-wrap">
                        <div class="spec_left">
                            <label class="small">Price</label>
                        </div>
                        <div class="spec_right font-calps h6" style="font: space 3px;">
                            <div class="small">
                                <select class="form-control col-md-3 shadow border-primary text-primary quantity_variant">
                                    @foreach($product->quantities as $qty)
                                    <option value="{{$qty->quantity}}_{{$qty->price}}"><span class="price_sign"> ₹ </span> {{$qty->price}} / {{$qty->quantity}}pc</option>
                                    @endforeach
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
                        <a href="#" class="btn btn-primary font-calps m-1 add-to-cart" data-quantity="{{$product->id}}" data-product="{{$product->id}}" data-product_offer="{{json_encode($product->offer)}}"><img width="30" height="30" src="/images/cart-black.png"> Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<x-similar-product :product="$product" />
<x-userpanel.topsellers />