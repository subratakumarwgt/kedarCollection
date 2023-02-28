<li class="p-2 border  mb-2 bg-light text-dark border border-bottom coupon_row">
    <div class="row border-bottom">
        <div class="col-7 p-2">
            <div class="small p-2" style="text-align: left;"><span class="badge badge-{{$order->current_status == 'pending'? 'warning text-dark border-dark' : 'primary'}}">{{strtoupper($order->current_status)}}</span></div>
            <div class="small m-2">ID: {{$order->order_id}}</div>
        </div>
        <div class="col-5 p-1">
            <div class="small p-2" style="text-align: right;">{{date("h:i A | d M",strtotime($order->created_at))}}</div>
            <div class="small m-2" style="text-align: right;"><i class="fa fa-phone"></i> : {{$order->user_contact}}</div>
        </div>
    </div>
    <div class="row">
        <div class="col-9 p-2">
            <div class="p-2">
                <ul class="list m-1 p-1">
                    @foreach($order->orderDetails as $item)
                    <li>{{@$item->quantity}} x {{@$item->product->name ?? @$item->item->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-3 p-2">

            <div class="p-1 mr-2  text-success" style="text-align: right;">
                <div class="small text-dark">total</div>
                <h6> ₹ {{@$order->total}}</h6>
            </div>
        </div>


    </div>
    <div class="row pt-2">
        <button class="btn  border-top btn-sm see_details" onclick="getOrderHistory({{$order->order_id}})"><i class="fa fa-eye"></i> See details</button>
    </div>
</li>