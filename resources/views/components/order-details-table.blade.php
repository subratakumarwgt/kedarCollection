<x-table-c-s-s/>
<style>
  table{
    width: 90%;
    border-bottom:solid gray 1px;
    font-size: 30px;
  }
  
  tr{
    padding: 1%;
    font-weight: bolder;
    border-bottom:solid gray 1px;
    box-shadow: 0px 2px 2px 2px rgba(0,0,0,0.2);
  }
  th{
    font-size: 20px;
  }
  td{
    padding: 1%;
  }
</style>
<div class="col-md-10" style="justify-content: center;">
    <table class="p-3  table table-stripe" style="width: 80%;
    border-bottom:solid gray 1px;
    text-align:left;
    font-size: 15px;">
   <thead>
       <tr style="padding: 1%;
    font-weight: bolder;
    border-bottom:solid gray 1px;
    box-shadow: 0px 2px 2px 2px rgba(0,0,0,0.2);">
          
            <th colspan="2">Items</th>
            <th>Price</th>
        </tr>
   </thead>
        
        <tbody>      
        @foreach($order->orderDetails as $item)
        @if(!empty($item->product))
        <tr style="padding: 1%;
   
    border-bottom:solid gray 1px;
    box-shadow: 0px 2px 2px 2px rgba(0,0,0,0.2);">
            <td style=" padding: 1%;"><img src="/{{$item->image}}" alt="product_image" width="100px"> </td>
            <td style=" padding: 1%;">{{$item->quantity}} x {{$item->product->title}}</td>
            <td style=" padding: 1%;">₹ {{$item->subtotal }}</td>
        </tr>
        @endif
        @endforeach
         
        <tr style="padding: 1%;
    font-weight: bolder;
    border-bottom:solid gray 1px;
    box-shadow: 0px 2px 2px 2px rgba(0,0,0,0.2);">
             <th></th>
            <th colspan="1">Charges</th>
            <th>Amount</th>
        </tr>
        @foreach($order->chargeDetails as $item)
        @if(!empty($item->charge))
        <tr style="padding: 1%;
  
    border-bottom:solid gray 1px;
    box-shadow: 0px 2px 2px 2px rgba(0,0,0,0.2);">
        <td style=" padding: 1%;"></td>
            <td style=" padding: 1%;">{{$item->charge->title}}</td>
            <td style=" padding: 1%;">₹ {{$item->charge->amount}}</td>
        </tr>
        @endif
        @endforeach
        <tr style="padding: 1%;
    font-weight: bolder;
    border-bottom:solid gray 1px;
    box-shadow: 0px 2px 2px 2px rgba(0,0,0,0.2);">
            <th></th>
            <th>Total</th>
            <th>₹ {{$order->total}}</th>
        </tr>
        </tbody>       
    </table>
</div>