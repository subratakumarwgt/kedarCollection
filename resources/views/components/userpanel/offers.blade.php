<div class="banner" style="background: url(@if(!empty($section->background_image))/{{$section->background_image}} @else images/banner.webp @endif);  backgorund-repeat:no-repeat; background-size:100%;">
    <div class="container">
        <div class="row align-items-center">
        <div class="col-md-6 banner_text text-center wow fadeInLeft" data-wow-duration=".8s">
            <div class="banner_sub_title text-uppercase">{{$section->sub_title}}</div>
            <h2 class="banner_title">{{$section->title}}</h2>
            <a href="{{$section->redirect_url}}" class="btn btn-primary btn-pill"><img src="images/view.png" width="28" class="img-fluid" /> {{$section->redirect_text}}</a>
        </div>
        <div class="col-md-6 banner_content wow fadeInRight" data-wow-duration=".8s">
            <div class="owl-carousel products_slide">
            @if(isset($items[0]))
            @foreach($items[0] as $item)
            <div class="owl-item-in">
                <div class="product_slide_item">
                <img src="/{{$item->images->first()->image}}" class="img-fluid"/>
                <div class="products_text">
                    <div class="discount">{{$item->title}}</div>
                    <div class="cat">{{$item->sub_title}}</div>
                    <a href="{{route('shop-by-offers',['id'=>$item->id])}}" class="btn btn-primary btn-sm rounded"><img width="15" height="15" src="images/eye.png" class="img-fluid" /> See All</a>
                </div>
                </div>
            </div>
            @endforeach    
            @endif       
            </div> 
        </div>
        </div>
    </div>
</div>