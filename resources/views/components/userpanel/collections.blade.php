<section class="latest_clctns sectionP_4">
        <div class="container">
          <div class="row">

            <div class="col-md-6 clctn_left wow fadeInLeft" data-wow-duration=".8s"> 
              <div class="owl-carousel clctn_slide">
              @if(isset($items[0]))
                @foreach($items[0] as $item)
                 <div class="owl-item-in text-center">
                    <a href="#">
                      <img src="{{$item->images->first()->image}}" class="img-fluid">
                    </a>
                    <h2 class="collection_title text-light">
                      <a href="#">{{$item->name}}</a>
                    </h2>
                </div>
                @endforeach   
              @endif           
              </div>               
            </div>
            <div class="col-md-5 offset-md-1 clctn_right bg_pattern d-flex align-items-center justify-content-center wow fadeInRight" data-wow-duration=".8s">
              <div class="text-center">
                <a href="{{$section->redirect_url}}" class="btn btn-primary"><img src="images/view.png" width="30" class="img-fluid">{{$section->redirect_text}}</a>
                <div class="hd_style_1 text-center">
                  <h4 class="text-uppercase hd_text">{{$section->title}}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>