<section class="sectionP_4" style="background:url('/{{$section->background_image}}')">
        <div class="container">
          <div class="row">
            
            <div class="col-md-12 wow fadeInDown" data-wow-duration=".8s"> 
              <div class="hd_style_1 text-center">
                <h4 class="text-uppercase hd_text">{{$section->title}}</h4>
                <h6>{{$section->sub_title}}</h6>
              </div>             
             
            </div>
            <div class="col-md-12 wow fadeInRight" data-wow-duration=".8s">
              <div class="row">
                @foreach($resources as $i => $resource)
                @if($resource == "Product")
                @foreach($items[$i] as $key => $item)
                @if($key > 0)
                <div class="col-xl-4 product col-md-4 col-sm-4 xl-4 pl-2 pr-2 col-12 wow @if($item->id%2 == 0)fadeInRight @else fadeInLeft @endif   " data-wow-duration=".5s">  
                  <x-product  :product="$item" />
                </div>
                @endif
                @endforeach
                @endif
                @if($resource == "Category")
                <div class="col-md-12 cat_right wow fadeInRight" data-wow-duration=".8s">
                    <div class="row">
                        @foreach($items[$i] as $item)
                        <div class="col-md-3">              
                        <div class="cat_item">
                            <a href="{{route('shop-by-category',['id' => $item->id])}}">
                            <img src="/{{$item->image}}" class="img-fluid">
                            </a>
                            <div class="cat_link"><a href="{{route('shop-by-category',['id' => $item->id])}}">{{$item->name}}</a></div>
                        </div>
                        </div>    
                        @endforeach         
                    </div>
                </div>
                @endif

                @if($resource == "Offer")
                <div class="col-md-12 banner_content wow fadeInRight" data-wow-duration=".8s">
                    <div class="owl-carousel products_slide">
                    @foreach($items[$i] as $item)
                    <div class="owl-item-in">
                        <div class="product_slide_item">
                        <img src="/{{$item->images->first()->image}}" class="img-fluid"/>
                        <div class="products_text">
                            <div class="discount">{{$item->title}}</div>
                            <div class="cat">{{$item->sub_title}}</div>
                            <a href="{{route('shop-by-offers',['id'=>$item->id])}}" class="btn btn-primary btn-sm rounded"><img width="15" height="15" src="/images/eye.png" class="img-fluid" /> See All</a>
                        </div>
                        </div>
                    </div>
                    @endforeach           
                    </div> 
                </div>
                @endif

                @if($resource == "Collection")
                <div class="col-md-12 clctn_left wow fadeInLeft" data-wow-duration=".8s"> 
                    <div class="owl-carousel clctn_slide">
                        @foreach($items[$i] as $item)
                        <div class="owl-item-in text-center">
                            <a href="{{route('shop-by-collection',['id'=>$item->id])}}">
                            <img src="/{{$item->images->first()->image}}" class="img-fluid">
                            </a>
                            <h2 class="collection_title text-light">
                            <a href="{{route('shop-by-collection',['id'=>$item->id])}}">{{$item->name}}</a>
                            </h2>
                        </div>
                        @endforeach              
                    </div>               
                </div>
                @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </section>