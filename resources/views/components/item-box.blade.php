<div class="col-md-2 col-sm-6 col-6">
<i class="fa fa-trash text-danger small delete_btn" onclick="delete_item(event,{{$item->id}})" style="display:none"></i>
    <div class="mr-1 mb-1 p-2 product product_id_{{$item->id}} @if(isset($selected) && $selected) product_selected @endif border rounded" data-id="{{$item->id}}" data-price="{{$item->price}}" data-name="{{$item->name}}">
        <div class="img text-center">                        
        <span class=" col-md-12 p-1 rounded bg-light text-dark small item_name_place"> {{$item->name}}</span> 
            <div class="cross_button d-none mt-1  justify-content-center">
                <div class="input-group">
                    <div class="input-group-prepend" onclick="changeQty({{$item->id}},-1)"><span class="input-group-text qty_btn minus"><i class="fa fa-minus"></i></span></div>
                        <input class="form-control qty_item_{{$item->id}} qty" type="number" min="1" max="10"  value="{{$item->qty ?? 1}}" data-bs-original-title="" title="" id="">
                    <div class="input-group-prepend" onclick="changeQty({{$item->id}},+1)"><span class="input-group-text qty_btn plus"><i class="fa fa-plus"></i></span></div>
                </div>
            </div>       
        </div>                    
        <div class="text-center border-top mt-2"><i class="fa fa-inr"></i> {{$item->price}} /<small class="text-dark">{{$item->unit}}</small> </div>
    </div>
</div>