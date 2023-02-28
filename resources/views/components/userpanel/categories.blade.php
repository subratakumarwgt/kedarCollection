<section class="cats sectionP_4">
        <div class="container">
          <div class="row">
            <div class="col-md-5 d-flex align-items-center justify-content-center bg_pattern wow fadeInLeft" data-wow-duration=".8s">
              <div class="text-center">
                <div class="hd_style_1 text-center">
                  <h4 class="text-uppercase hd_text">{{$section->title}}</h4>
                </div>
                <a href="{{$section->redirect_url}}" class="btn btn-primary"><img src="images/view.png" width="30" class="img-fluid"> {{$section->redirect_text}}</a>
              </div>
            </div>
            <div class="col-md-7 cat_right wow fadeInRight" data-wow-duration=".8s">
              <div class="row">
              @if(isset($items[0]))
                @foreach($items[0] as $item)
                <div class="col-md-4">              
                  <div class="cat_item">
                    <a href="{{route('shop-by-category',['id' => $item->id])}}">
                      <img src="/{{$item->image}}" class="img-fluid">
                    </a>
                    <div class="cat_link"><a href="{{$section->redirect_url}}/{{$item->id}}">{{$item->name}}</a></div>
                  </div>
                </div>    
                @endforeach      
              @endif   
              </div>
            </div>
          </div>
        </div>
    </section>