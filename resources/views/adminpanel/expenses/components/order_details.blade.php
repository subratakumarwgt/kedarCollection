<div class="col-md-10">
    <table class="p-3  table table-stripe">
        <tr>
            <th>Items</th>
        </tr>
        @foreach($order->orderDetails as $item)
        <tr>
            <td>{{$item->quantity}} x {{$item->product->name ??  @$item->item->name}}</td>
            <td>₹ {{$item->subtotal }}</td>
        </tr>
        @endforeach
        <tr>
            <th>Charges</th>
        </tr>
        @foreach($order->chargeDetails as $item)
        <tr>
            <td>{{$item->charge->title}}</td>
            <td>₹ {{$item->charge->amount}}</td>
        </tr>
        @endforeach
        <tr>
            <th>Total</th>
            <th>₹ {{$order->total}}</th>
        </tr>
    
    </table>
</div>