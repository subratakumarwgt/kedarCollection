<div class="contaniner">
<div class="row justify-content-center ">
    <div class="col-md-10 pt-4 pb-4">
        <h4 class="text-light">
            You may also like
        </h4>
    </div>
    <div class="col-md-10">
        <div class="row">
        @foreach($products as $product)
         <div class="col-md-3 col-6">
            <x-product :product="$product" />
         </div>
        @endforeach
        </div>       
    </div>
</div>
</div>