<section class="top_sellers section_frame sectionP_4">
        <div class="container">
          <div class="row">
            
            <div class="col-md-12 wow fadeInDown" data-wow-duration=".8s"> 
              <div class="hd_style_1 text-center">
                <h4 class="text-uppercase hd_text">{{$section->title}}</h4>
              </div>             
             
            </div>
            <div class="col-md-12 wow fadeInRight" data-wow-duration=".8s">
              <div class="row">
                @if(isset($items[0]))
                @foreach($items[0] as $key => $item)
                @if($key > 0 && !empty($item))
                <div class="col-xl-4 product col-md-4 col-sm-4 xl-4 pl-2 pr-2 col-12 wow @if($item->id%2 == 0)fadeInRight @else fadeInLeft @endif   " data-wow-duration=".5s">  
                  <x-product  :product="$item" />
                </div>
                @endif
                @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
      </section>