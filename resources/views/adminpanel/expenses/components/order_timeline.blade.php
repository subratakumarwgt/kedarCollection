<div class="col">
    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
        <div class="timeline-step">
            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2003">
                <div class="inner-circle bg-success"> </div>
                <p class=" mt-3 mb-1 @if(!empty($order->step_one->created_at)) text-success @endif"> @if(!empty($order->step_one->created_at))<i class="fa fa-check-circle"></i> @else <i class="fa fa-times-circle"></i> @endif Placed</p>
                @if(!empty($order->step_one->created_at))<span>{{date("h:i A",strtotime($order->step_one->created_at))}} </span> @else <span class="badge badge-light text-dark"> Not Yet</span> @endif
            </div>
        </div>
        <div class="timeline-step">
            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2004">
                <div class="inner-circle bg-danger"></div>
                <p class=" mt-3 mb-1 @if(!empty($order->step_two->created_at)) text-success @endif"> @if(!empty($order->step_two->created_at))<i class="fa fa-check-circle"></i> @else <i class="fa fa-times-circle"></i> @endif Confirmed</p>
                @if(!empty($order->step_two->created_at))<span>{{date("h:i A",strtotime($order->step_two->created_at))}} </span> @else <span class="badge badge-light text-dark"> Not Yet</span> @endif
            </div>
        </div>
        <div class="timeline-step">
            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2005">
                <div class="inner-circle"></div>
                <p class="  mt-3 mb-1 @if(!empty($order->step_three->created_at)) text-success @endif"> @if(!empty($order->step_three->created_at))<i class="fa fa-check-circle"></i> @else <i class="fa fa-times-circle"></i> @endif Order Ready</p>
                @if(!empty($order->step_three->created_at))<span>{{date("h:i A",strtotime($order->step_three->created_at))}} </span> @else <span class="badge badge-light text-dark"> Not Yet</span> @endif
            </div>
        </div>
        <div class="timeline-step">
            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2010">
                <div class="inner-circle"></div>
                <p class=" mt-3 mb-1 @if(!empty($order->step_four->created_at)) text-success @endif"> @if(!empty($order->step_four->created_at))<i class="fa fa-check-circle"></i> @else <i class="fa fa-times-circle"></i> @endif Packed</p>
                @if(!empty($order->step_four->created_at))<span>{{date("h:i A",strtotime($order->step_four->created_at))}} </span> @else <span class="badge badge-light text-dark"> Not Yet</span> @endif
            </div>
        </div>
        <div class="timeline-step mb-0">
            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2020">
                <div class="inner-circle"></div>
                <p class=" mt-3 mb-1 @if(!empty($order->step_five->created_at)) text-success @endif"> @if(!empty($order->step_five->created_at))<i class="fa fa-check-circle"></i> @else <i class="fa fa-times-circle"></i> @endif Delievered</p>
                @if(!empty($order->step_five->created_at))<span>{{date("h:i A",strtotime($order->step_five->created_at))}} </span> @else <span class="badge badge-light text-dark"> Est. {{date("h:i A",strtotime($order->step_five->expected_delivery))}}</span> @endif
            </div>
        </div>
    </div>
</div>