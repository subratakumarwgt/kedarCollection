<div class="p-3 border-bottom cart-header">
<h6 class="h6 text-primary">Cart Items {{count($cart_rows)}} <i class="fa fa-shopping-basket"></i></h6>

</div>
@foreach($cart_rows as $cart)
<a href="#" class="notification_item d-flex ">
    <div class="notification_image">
        <img width="100" height="100" src="/{{$cart->product->image}}" class="img-fluid rounded-circle">
    </div>
    <div class="notification_text">
        <h4> {{strtoupper($cart->product->name)}} <div class="pull-right"><i class="fa fa-trash small text-danger"></i></div></h4>
        @if($cart->setOf > 1)<small> <small class="notification_time bg-light text-primary">set of {{ $cart->setOf }}</small></small>@endif
        <small class="notification_time">(x {{$cart->quantity}} ) </small>
        <small class="notification_time"><i class="fa fa-inr"></i> {{$cart->subtotal}} </small>
    </div>
</a>
@endforeach
<a href="{{route('cart-items')}}" class="notification_item d-flex">
    <button class="btn btn-sm btn-primary btn-pill btn-block">Go to cart (<span class="currency">INR</span> <span class="currency_price">{{$cart_total}})</span> <i class="fa fa-arrow-right"></i></button>
</a>