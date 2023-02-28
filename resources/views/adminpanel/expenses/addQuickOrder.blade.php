@extends('adminpanel.master')
@section('title', 'Sample Page')

@section('css')
<style type="text/css">
  @media print {
    body * {
      visibility: hidden;
    }

    #section-to-print,
    #section-to-print * {
      visibility: visible;
    }

    #section-to-print {
      position: absolute;
      left: 0;
      top: 0;
    }
  }

  .float {
    position: absolute;
    right: 5px;
    top: 0px;
    margin: 1px;
  }

  .action_label {
    cursor: pointer;
  }

  .cursor-pointer {
    cursor: pointer;
  }

  .cursor-pointer:hover {
    color: black
  }

  .overlay {
    position: absolute;
    top: 0px;
    bottom: 0px;
    left: 0px;
    right: 0px;
    z-index: 2;
    padding-top: 10%;
    background: rgba(245, 254, 234, 0.6);
  }
  .delete_btn{
 position: absolute;
 left : 15px;
 padding: 3px;

 top: 10px;
  }
  .delete_btn:hover{
    cursor: pointer;
    background: black;
    color: white;
    transition: 1s all;
  }
</style>
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Quick Order</h3>


@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Sales</li>
<li class="breadcrumb-item active">Make Order</li>
@endsection

@section('content')

<input type="hidden" id="created_by" value="{{Auth::User()->id}}">
<input type="hidden" id="type" name="type" value="0">
<input type="hidden" id="order_id" value="{{$order_id}}">
<input type="hidden" id="order_primary_id" value="{{$order->id}}">

<!-- Modals -->
<div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="itemModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="" id="add_item_form" onsubmit="return addItemForm(event,this)">
        <div class="modal-header">
          <h5> <i class="fa fa-plus-square"></i> Add Product
          </h5>
        </div>
        <div class="modal-body">

          <div class="form-group p-1 mt-2">
            <label for="view_type">
              Item name
            </label>
            <input type="text" class="form-control" id="item_name" required name="name">
          </div>
          <div class="form-group p-1 mt-2">
            <label for="view_type">
              Unit
            </label>
            <input type="text" class="form-control" id="item_unit" required name="unit">
          </div>
          <div class="form-group p-1 mt-2">
            <label for="view_type">
              Sub category
            </label>
           <select name="sub_category" id="sub_category" class="form-control">
            <option value="ice_cream">Ice Cream</option>
            <option value="fast_food">Fast Food</option>
           </select>
          </div>
          <div class="form-group p-1 mt-2">
            <label for="view_type">
              Price
            </label>
            <input type="number" class="form-control" id="item_price" required name="price">
          </div>


        </div>
        <div class="modal-footer">
          <button class="btn btn-outline-dark shadow-sm btn-block" type="submit"> Add <i class="fa fa-plus-square"></i> </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="selectModal" tabindex="-1" role="dialog" aria-labelledby="selectModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content" id="itemModalContent">
       <x-layouts.order-easy :items="$items" :order="$order" />
      
     </div>
       
    
    </div>
</div>



<div class="modal fade" id="billModal" tabindex="-1" role="dialog" aria-labelledby="billModal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="" id="bill_form" onsubmit="">
        <div class="modal-header">
          <h5>
          </h5>
        </div>
        <div class="modal-body" id="bill">

        </div>
        <div class="modal-footer">
          <div class="col-sm-12 text-center mt-3">
            <button class="btn btn btn-primary me-2" type="button" onclick="myFunction()">Print</button>
            <button class="btn btn-secondary" type="button">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="chargeModal" tabindex="-1" role="dialog" aria-labelledby="chargeModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="" id="add_charge_form" onsubmit="return addChargeForm(event,this)">
        <div class="modal-header">
          <h5> <i class="fa fa-plus-inr"></i> Add Charges
          </h5>
        </div>
        <div class="modal-body">

          <div class="form-group p-1 mt-2">
            <label for="view_type">
              Charge Title
            </label>
            <input type="text" class="form-control" id="charge_title" required name="name">
          </div>
          <div class="form-group p-1 mt-2">
            <label for="view_type">
              Type
            </label>
            <input type="text" class="form-control" id="charge_type" required name="unit">
          </div>
          <div class="form-group p-1 mt-2">
            <label for="view_type">
              Amount
            </label>
            <input type="number" class="form-control" id="charge_amount" required name="price">
          </div>


        </div>
        <div class="modal-footer">
          <button class="btn btn-success shadow-sm btn-block" type="submit"> Add <i class="fa fa-plus-square"></i> </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">


        <div class="card-body table-responsive">
          <div class="row">
            <div class="col-md-9 mb-4  border-right"><button class="btn btn-outline-dark  ml-1 mb-2" id="add_new_item" onclick="add_item()"><i class="fa fa-plus-circle"></i> New Product</button>
              <button class="btn btn-outline-dark  ml-1 mb-2" id="add_new_charge" onclick="add_charge()"><i class="fa fa-plus-circle"></i> New Charges</button>
              <button class="btn btn-outline-dark border-success ml-1 mb-2" id="add_new_order" onclick='newOrder()'><i class="fa fa-plus-circle"></i> New Order</button>
              <button class="btn btn-outline-dark border-success ml-1 mb-2" id="add_row" onclick="add_row()">
                    <i class="fa fa-plus-square"></i> Item
                  </button>
              <button class="btn btn-outline-dark border-success ml-1 mb-2" id="view_menu" onclick='view_menu()'><i class="fa fa-cutlery"></i> Menu</button>
            </div>
            <div class="col-md-4 mb-4">
              <div class="input-group" id="user_contact_group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i> (+91)  </span></div>
                <input class="form-control" type="text" minlength="10" max="9999999999" placeholder="Contact number (mandatory)" data-bs-original-title="" title="" id="user_contact" value="{{@$order->user_contact ?? 9999900000}}" required>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-map-marker"></i> </span></div>
                <input class="form-control" type="text" minlength="10" max="9999999999" placeholder="customer address(optional)" data-bs-original-title="" title="" id="user_address" value="" >
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-map-marker"></i> </span></div>
                <input class="form-control" type="text" minlength="10" max="9999999999" placeholder="customer name(optional)" data-bs-original-title="" title="" id="user_name" value="" >
              </div>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-md-3 mb-1 ">
              <div class="border p-2 text-center rounded border-primary bg-light text-primary shadow-sm">
                <strong>Order ID</strong> : <span class="text-dark editable_value editable_date">{{$order_id}}</span>

              </div>
            </div>
            <div class="col-md-3 mb-1 ">
              <div class="border p-2 text-center rounded border-primary bg-light text-primary shadow-sm">
                <strong>Date</strong> : <span class="text-dark editable_value editable_date">{{date("Y-m-d")}}</span> <i class="fa fa-pencil small text-danger cursor-pointer link" onclick="editHandler(this)"></i>
                <div class="p-1 hide_input d-none"> <input type="date" class="form-control editable" value='{{date("d.m.Y")}}' id="date"></div>
              </div>
            </div>
            <div class="col-md-3 mb-1 ">
              <div class="border p-2 text-center rounded border-primary bg-light text-primary shadow-sm">
                <strong>Order Type</strong> : <span class="text-dark editable_value editable_expense_type">dine_in</span> <i class="fa fa-pencil small text-danger cursor-pointer link" onclick="editHandler(this)"></i>
                <div class="p-1 hide_input d-none"> <select name="" id="order_type" class="form-control editable">
                    @foreach($payment_type as $type)
                    <option value="{{$type}}">{{$type}}</option>
                    @endforeach
                  </select></div>
              </div>
            </div>
            <div class="col-md-3 mb-1 ">
              <div class="border p-2 text-center rounded border-primary bg-light text-primary shadow-sm">
                <strong>Payment Type</strong> : <span class="text-dark editable_value editable_expense_category">cash</span> <i class="fa fa-pencil small text-danger cursor-pointer link" onclick="editHandler(this)"></i>
                <div class="p-1 hide_input d-none"> <select name="" id="payment_category" class="form-control editable">
                    @foreach($order_type as $type)
                    <option value="{{$type}}">{{$type}}</option>
                    @endforeach
                  </select>
                </div>

              </div>
            </div>

          </div>
          <table class="table" id="quick_order_table">
            @if($order->status == "completed") <div class="overlay">
              <div class="row p-4 justify-content-center mt-4">
                <div class="col-md-6 text-center mt-4 p-4 border border-success shadow-sm rounded bg-white">
                  <h3 class="text-primary">Order Completed <i class="fa fa-check-circle text-success "></i>  </h3>
                  <p><button class="btn btn-primary btn-sm btn-block"><i class="fa fa-list" onclick="createBill()"></i> Generate Bill </button></p>
                </div>
              </div>
            </div>@endif
            <thead class="">
              <tr>
                <th>
                  Item
                </th>
                <th>
                  Qty
                </th>
                <th>
                  Unit
                </th>
                <th>
                  Price
                </th>
                <th>
                  Subtotal
                </th>
                <th>
                  Action
                </th>
              </tr>
            </thead>

            <tbody id="expense_body" class="">
              @if(!empty(count($order->orderDetails)))
              @foreach($order->orderDetails as $key => $order_detail)
              <tr id="new_row_{{$order_detail->item->id}}" data-item_id="{{$order_detail->item->id}}" >
                <td colspan="">
                  <select name="item" id="" class="form-control item_name items">
                    <option value="{{$order_detail->item->id}}">{{$order_detail->item->name}}</option>
                  </select>
                </td>
                <td>
                  <!-- <span><i class="fa fa-times"></i></span><input type="number" class=" qty" name="qty" value="1" min="1"> -->
                  <div class="cross_button mt-1  justify-content-center">
                <div class="input-group">
                    <div class="input-group-prepend" onclick="changeQty({{$order_detail->item->id}},-1)"><span class="input-group-text qty_btn minus"><i class="fa fa-minus"></i></span></div>
                        <input class="form-control qty_item_{{$order_detail->item->id}} qty_input_{{$order_detail->item->id}} qty" type="number" min="1" max="10"  value="{{$order_detail->quantity}}" data-bs-original-title="" title="" id="">
                    <div class="input-group-prepend" onclick="changeQty({{$order_detail->item->id}},+1)"><span class="input-group-text qty_btn plus"><i class="fa fa-plus"></i></span></div>
                </div>
            </div>    
                  <!-- <input class="form-control qty qty_item_{{$order_detail->item->id}} " type="number" name="qty" value="{{$order_detail->quantity}}" min="1"> -->

                </td>
                <td>
                  <input type="text" class="form-control unit" name="unit" value="{{$order_detail->item->unit}}" readonly>
                </td>
                <td>
                  <input type="number" class="form-control price" name="price" value="{{$order_detail->price}}" min="1">
                </td>
                <td>
                  <input type="number" class="form-control subtotal" name="subtotal" value="{{$order_detail->subtotal}}" min="1">
                </td>
                <td>
                 
                  <button class="btn btn-sm btn-outline-danger remove_row" id="" onclick="remove_row()">
                    <i class="fa fa-minus-square"></i>
                  </button>
                 
                </td>

              </tr>
              @endforeach
              @else
              <!-- <tr>
                <td colspan="">
                  <select name="item" id="" class="form-control item_name items">
                    <option value="0">Select New Item</option>
                  </select>
                </td>
                <td>
                  
                  <input class="form-control qty" type="number" name="qty" value="1" min="1">

                </td>
                <td>
                  <input type="text" class="form-control unit" name="unit" value="unit" readonly>
                </td>
                <td>
                  <input type="number" class="form-control price" name="price" value="1" min="1">
                </td>
                <td>
                  <input type="number" class="form-control subtotal" name="subtotal" value="1" min="1">
                </td>
                <td>
                  <button class="btn btn-sm btn-outline-success" id="add_row" onclick="add_row()">
                    <i class="fa fa-plus-square"></i>
                  </button>
                </td>

              </tr> -->

              @endif
            </tbody>

            <tbody id="charge_body">
              <tr>
                <td colspan="7" class="text-secondary p-3">
                  Add Charges <i class="fa fa-arrow-down"></i>
                </td>

              </tr>
              @if(!empty(count($order->chargeDetails)))
            
              @foreach($order->chargeDetails as $key => $order_detail)
              <tr id="charge_row_{{$key > 0 ? $key : '' }}" class="charges_row">
                <td colspan="2">
                  <select name="item_name" id="charges{{$key > 0 ? $key : '' }}" class="form-control  charges">
                    <option value="{{$order_detail->charge_id}}">{{$order_detail->charge->title}}</option>
                  </select>
                </td>
                <td>
                  <input type="number" class="form-control qty" value="1">
                </td>
                <td>
                  <input type="number" class="form-control price" value="{{$order_detail->charge->amount}}">
                </td>
                <td>
                  <input type="number" class="form-control subtotal" name="subtotal" value="{{$order_detail->amount}}" min="1">
                </td>
                <td>
                  @if($key == 0)
                  <button class="btn btn-sm btn-outline-success" id="add_charge_row" onclick="add_charge_row()">
                    <i class="fa fa-plus-square"></i>
                  </button>
                  @else
                  <button class="btn btn-sm btn-outline-danger remove_row" id="">
                    <i class="fa fa-minus-circle"></i>
                  </button>
                  @endif

                </td>

              </tr>
              @endforeach
              @else
              <tr id="charge_row" class="charges_row">
                <td colspan="2">
                  <select name="item_name" id="charges" class="form-control  charges">
                    <option value="1">Packing Charge</option>
                  </select>
                </td>
                <td>
                  <input type="number" class="form-control qty" value="1">
                </td>
                <td>
                  <input type="number" class="form-control price" value="0">
                </td>
                <td>
                  <input type="number" class="form-control subtotal" name="subtotal" value="0" min="1">
                </td>
                <td>
                  <button class="btn btn-sm btn-outline-success" id="add_charge_row" onclick="add_charge_row()">
                    <i class="fa fa-plus-square"></i>
                  </button>
                </td>

              </tr>
              @endif
            </tbody>
            <tfoot>
              <tr>
                <td colspan="2"></td>
                <td colspan="2" class="text-center"></td>
                <td>Total Payable Rs. <span id="total">0</span> </td>
                <td> </td>
              </tr>
            </tfoot>
          </table>
          <button class="btn btn-dark btn-sm m-2 order_draft" onclick="setAllData()"> <i class="fa fa-send"></i> Place Order </button>
          <button class="btn btn-success btn-sm m-2 " onclick="createBill()"> <i class="fa fa-inr"></i> Create Bill </button>
          <button class="btn btn-primary btn-sm m-2 order_draft" onclick="saveDraft()"> <i class="fa fa-save"></i> Save Draft </button>
          <button class="btn btn-danger btn-sm m-2 order_draft" onclick="cancelOrder()"> <i class="fa fa-times"></i> Cancel Order </button>

        </div>
      </div>
    </div>
  </div>
</div>

</div>
@endsection

@section('script')

<script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
<script src="{{asset('assets/js/printThis.js')}}"></script>
<script src="{{asset('assets/js/print.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $("#from_date").prop('max', $("#to_date").val());
  $("#to_date").change(function() {
    $("#from_date").prop('max', $("#to_date").val());
  });
  $("#from_date").change(function() {
    $("#to_date").prop('min', $("#from_date").val());
  });
</script>



<script>
  const isNew = {{$isNew}}

  if (isNew)
    window.history.replaceState(null, null, "{{url()->full()}}/{{$order_id}}");

  const getPackingCharge = () => {
    return 5;
  }

  const getAllItems = (obj) => {
    let resource_type
    let filters = {}
    if (obj.hasClass("items")) {
      resource_type = items
      filters = {
        type: ["product"]
      }
    } else {
      resource_type = "charges"
    }
    $(obj).select2({
      tags: false,
      ajax: {
        "url": "/api/get-resources",
        "method": "get",
        delay: 600,
        minimumResultsForSearch: -1,
        data: function(params) {
          var query = {
            search: params.term,
            resource_type: resource_type,
            filters
          }
          query.resource_type = "items"
          return query;
        },
        processResults: function(response) {
          response = JSON.parse(response);
          return {
            results: response.items
          };

        },

      },

    })
  }
  const getAllCharges = (obj) => {
    $(obj).select2({
      tags: false,
      ajax: {
        "url": "/api/get-resources",
        "method": "get",
        delay: 600,
        minimumResultsForSearch: -1,
        data: function(params) {
          var query = {
            search: params.term,
            resource_type: "charges",
            // filters:{
            //     type:["product"]
            // }
          }
          query.resource_type = "charges"
          return query;
        },
        processResults: function(response) {
          response = JSON.parse(response);
          return {
            results: response.items
          };

        },

      },

    })
  }
  let items = []
  getItemDetails = async () => {
    items = await $.get("/api/get-resources?resource_type=items", (res) => {
      res = JSON.parse(res)
      return res.items
    })
    return items


  }
  getChargeDetails = async () => {
    items = await $.get("/api/get-resources?resource_type=charges", (res) => {
      res = JSON.parse(res)
      return res.items
    })
    return items

  }

  getAllItems($(".items").bind("change", function() {

    if ( isDuplicateItem($(this).val())) {
      $.notify({
        message: "Items already exists in the product list"
      }, {
        type: 'danger',
        z_index: 10000,
        timer: 2000,
      })
      $(this).find('option:selected').remove();
    } else
      setPrice(this)

  }))
  getAllCharges($(".charges").bind("change", function() {

    if ($(".charges").length > 1 && isDuplicateItem($(this).val())) {
      $.notify({
        message: "Items already exists in the list"
      }, {
        type: 'danger',
        z_index: 10000,
        timer: 2000,
      })
      $(this).find('option:selected').remove();
    } else
      setCharge(this)

  }))
  const setPrice = async (item_obj) => {
    items = await getItemDetails()
    // console.log(items, "etProce")
    items = JSON.parse(items)
    let item = items.items.filter((value, key) => {
      return value.id == $(item_obj).val()
    })
    $(item_obj).closest("tr").prop("id","new_row_"+item[0].id)
    $(item_obj).closest("tr").data("item_id",item[0].id)
    $(item_obj).closest("tr").find(".price").val(item[0].price).trigger("change")
    $(item_obj).closest("tr").find(".unit").val(item[0].unit).trigger("change")
  }
  const setCharge = async (item_obj) => {
    items = await getChargeDetails()
    // console.log(items,"etProce")
    items = JSON.parse(items)
    let item = items.items.filter((value, key) => {
      return value.id == $(item_obj).val()
    })
    $(item_obj).closest("tr").find(".price").val(item[0].price).trigger("change")
    $(item_obj).closest("tr").find(".unit").val(item[0].unit).trigger("change")
  }

  const charge_row = (id) => $(`<tr id="charge_row_${id}" class="charges_row">
                <td colspan="2">
                  <select name="item_name" id="" class="form-control item_name charges">
                    <option value="1">Packing Charge</option>
                  </select>
                </td>
                <td>
                  <input type="number" class="form-control qty" value="1" >
                </td>    
                <td>
                  <input type="number" class="form-control price" value="0" >
                </td>                
                <td>
                  <input type="number" class="form-control subtotal" name="subtotal" value="0" min="1">
                </td>
                <td>
                  <button class="btn btn-sm btn-outline-danger remove_charge_row" >
                    <i class="fa fa-minus-circle"></i>
                  </button>
                </td>
                </tr>`)
  const expense_row = (id) => $(`<tr id="new_row_${id}" data-item_id="${id}">
                        <td colspan="">
                         <select name="item" id=""  class="form-control item_name items">
                          <option value="0">Select New Item</option>
                         </select>
                        </td>
                        <td>
                        <div class="cross_button  mt-1  justify-content-center">
                         <div class="input-group">
                        <div class="input-group-prepend" onclick="changeQty(${id},-1)"><span class="input-group-text qty_btn minus"><i class="fa fa-minus"></i></span></div>
                        <input class="form-control qty_item_${id} qty_input_${id} qty" type="number" min="1" max="10"  value="1" data-bs-original-title="" title="" id="">
                         <div class="input-group-prepend" onclick="changeQty(${id},+1)"><span class="input-group-text qty_btn plus"><i class="fa fa-plus"></i></span></div>
                         </div>
                         </div>
                        </td>
                        <td>
                          <input type="text" class="form-control unit" name="unit" readonly>
                        </td>
                        <td>
                          <input type="number" class="form-control price" name="price" value="1" min="1">
                        </td>
                        <td>
                          <input type="number" class="form-control subtotal" name="subtotal"  value="1" min="1">
                        </td>
                        <td>
                         <button class="btn btn-sm btn-outline-danger remove_row">
                          <i class="fa fa-minus-square"></i>
                         </button>
                        </td>
                       
                      </tr>`)
  let id = 1;
  
  const remove_row = (e) => {
    id++;
    getItemBox()
    $(e).closest("tr").remove()
    countTotal()
    addOrderEasyD()

  }
  const delete_item = (e,item_id) =>{
    e.preventDefault()
    remove_row($("#new_row_"+item_id).find(".remove_row"))
    
  }
  const add_row = (item_id=null) => {
    if(item_id == null)
   { id++;item_id = id}
    let new_row = $("#expense_body").append(expense_row(item_id))
    new_row.find($(".remove_row")).bind("click", function() {
      remove_row(this)
    })
    getAllItems(new_row.find($(".item_name")))
    new_row.find(".items").bind("change", function() {
      if (isDuplicateItem($(this).val())) {
        $.notify({
          message: "Item already exists in the list"
        }, {
          type: 'danger',
          z_index: 10000,
          timer: 2000,
        })
        $(this).find('option:selected').remove();
      } else
        setPrice(this)

    })
  }
  const add_charge_row = () => {
    id++;
    let new_row = $("#charge_body").append(charge_row(id))
    new_row.find($(".remove_charge_row")).bind("click", function() {
      remove_row(this)
    })
    getAllCharges(new_row.find($(".item_name")))
    new_row.find(".item_name").bind("change", function() {
      if ($(".item_name").length > 1 && isDuplicateItem($(this).val())) {
        $.notify({
          message: "Charge already exists in the list"
        }, {
          type: 'danger',
          z_index: 10000,
          timer: 2000,
        })
        $(this).find('option:selected').remove();
      } else
        setCharge(this)

    })
  }

  const changeQty = (item_id,change = -1) => {
    loadoverlay($(".qty_item_"+item_id))
    // $("#new_row_"+item_id).find(".qty").val(parseInt($("#new_row_"+item_id).find(".qty").val()) + change)
    $(".qty_item_"+item_id).val(parseInt($(".qty_item_"+item_id).val()) + change).trigger("change")
    if($(".qty_item_"+item_id).val() == 0)
    {
      $(".qty_item_"+item_id).val(1).trigger("change")
    }
    hideoverlay($(".qty_item_"+item_id))
  }


  $("#expense_body, #charge_body").on("change", ".qty, .price", function() {

    let price = $(this).closest("tr").find(".price").val()
    let qty = $(this).closest("tr").find(".qty").val()


    $(this).closest("tr").find(".subtotal").val(qty * price)

    countTotal()
    addOrderEasyD()

  })
  $("#order_type").on("change", function() {
    if (this.value == "take_away")
      $("#charge_row").find(".price").val(getPackingCharge()).trigger("change")
    else
      $("#charge_row").find(".price").val(0).trigger("change")
  })
  const addOrderEasyD = () => {
      all_items =   $("#expense_body tr")
        .map(function(num,elem){
          return  `${$(elem).find(".qty").val()} X <strong>${$(elem).find(".item_name").find('option:selected').html()}</strong>`
        }).get()
        $("#item_coma").html(all_items.join(", "))
        $("#item_total").html('<i class="fa fa-inr"></i> '+$("#total").html());
  }
  const countTotal = () => {
    let total = 0
    $(".subtotal").each((index, elem) => {
      total = parseInt(total) + parseInt(elem.value)
    })
    $("#total").html(total)
   
  }

  const editHandler = (obj) => {
    let hide_input = $(obj).closest("div").find(".hide_input")
    if (hide_input.hasClass("d-none"))
      hide_input.removeClass("d-none")
    else
      hide_input.addClass("d-none")
  }

  $(".editable").on("change", function() {
    let value = this.value

    $(this).closest("div").parent("div").find(".editable_value").html(value)
    let elem = $(this).closest("div").parent("div").find(".editable_value")
    editHandler(elem)

  })

  const add_item = () => {
    $("#itemModal").modal("show")
  }
  const add_charge = () => {
    $("#chargeModal").modal("show")
  }



  const addItemForm = (e, form) => {
    e.preventDefault()
    loadoverlay($("#add_item_form"))
    var form = new FormData();
    form.append("table_name", "items");
    form.append("name", $("#item_name").val());
    form.append("unit", $("#item_unit").val());
    form.append("sub_category", $("#sub_category").val());
    form.append("type", "product");
    form.append("price", $("#item_price").val());
    form.append("table_model", "Item");

    var settings = {
      "url": "/api/create-data",
      "method": "POST",
      "timeout": 0,
      "processData": false,
      "mimeType": "multipart/form-data",
      "contentType": false,
      "data": form,
      statusCode: {
        400: function() {
          hideoverlay($("#add_item_form"))
          //  = JSON.parse();
          $.notify({
            message: "Something went wrong while inserting doctor!"
          }, {
            type: 'danger',
            z_index: 10000,
            timer: 2000,
          });
        },
        500: function() {
          hideoverlay($("#add_item_form"))
          // response = JSON.parse(response);
          $.notify({
            message: "Something went wrong while inserting doctor!"
          }, {
            type: 'danger',
            z_index: 10000,
            timer: 2000,
          })
        }
      }
    };

    $.ajax(settings).done(function(response) {
      var response2 = JSON.parse(response)
      hideoverlay($("#add_item_form"));
      $.notify({
        message: response2.message
      }, {
        type: 'success',
        z_index: 10000,
        timer: 2000,
      })



    }, function() {
      getItemDetails()
    });

  }
  const addChargeForm = (e, form) => {
    e.preventDefault()
    loadoverlay($("#add_charge_form"))
    var form = new FormData();
    form.append("table_name", "charges");
    form.append("title", $("#charge_title").val());
    form.append("level", $("#charge_type").val());
    form.append("amount", $("#charge_amount").val());
    form.append("table_model", "Charge");

    var settings = {
      "url": "/api/create-data",
      "method": "POST",
      "timeout": 0,
      "processData": false,
      "mimeType": "multipart/form-data",
      "contentType": false,
      "data": form,
      statusCode: {
        400: function() {
          hideoverlay($("#add_charge_form"))
          //  = JSON.parse();
          $.notify({
            message: "Something went wrong while inserting doctor!"
          }, {
            type: 'danger',
            z_index: 10000,
            timer: 2000,
          });
        },
        500: function() {
          hideoverlay($("#add_charge_form"))
          // response = JSON.parse(response);
          $.notify({
            message: "Something went wrong while inserting doctor!"
          }, {
            type: 'danger',
            z_index: 10000,
            timer: 2000,
          })
        }
      }
    };

    $.ajax(settings).done(function(response) {
      var response2 = JSON.parse(response)
      hideoverlay($("#add_charge_form"));
      $.notify({
        message: response2.message
      }, {
        type: 'success',
        z_index: 10000,
        timer: 2000,
      })



    }, function() {
      getChargeDetails()
    });

  }


  const setAllData = async () => {
    loadoverlay($("#quick_order_table"))

    if (confirm("Are you sure you want to complete order?")) {
      await saveDraft()
      $.notify({
        message: "Order being added!"
      }, {
        type: 'warning',
        z_index: 10000,
        timer: 1000,
      });

      let data = {}
      let row_data = []
      data.expense_date = $(".editable_date").html()
      data.expense_type = $(".editable_expense_type").html()
      data.expense_category = $(".editable_expense_category").html()
      data.created_by = $("#created_by").val()


      data.total = $("#total").html()

      data.description = `Order of RS ${data.total} is paid through ${data.expense_category}`


      var form = new FormData();
      form.append("table_name", "orders");
      form.append("order_type", data.expense_type);
      form.append("id", $("#order_primary_id").val());
      form.append("payment_type", data.expense_category);
      form.append("total", data.total);
      form.append("item_count", row_data.length);
      form.append("product_qty_json", JSON.stringify(row_data))
      form.append("status", "completed")
      form.append("user_contact", $("#user_contact").val());
      form.append("table_model", "Order");

      var settings = {
        "url": "/api/place-order",
        "method": "POST",
        "timeout": 0,
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form,
        statusCode: {
          400: function() {
            hideoverlay($("#quick_order_table"))
            //  = JSON.parse();
            $.notify({
              message: "Something went wrong while accepting order!"
            }, {
              type: 'danger',
              z_index: 10000,
              timer: 2000,
            });
          },
          500: function() {
            hideoverlay($("#quick_order_table"))
            // response = JSON.parse(response);
            $.notify({
              message: "Something went wrong while placing order!"
            }, {
              type: 'danger',
              z_index: 10000,
              timer: 2000,
            })
          }
        }
      };

      if($("#user_contact").val().length == 10)
      await $.ajax(settings).done(function(response) {
        hideoverlay($("#quick_order_table"))
        $.notify({
          message: "Order was completed successfully"
        }, {
          type: 'success',
          z_index: 10000,
          timer: 2000,
        })
        $("#quick_order_table").html(`<div class="overlay">
              <div class="row p-4 justify-content-center mt-4">
                <div class="col-md-6 text-center mt-4 p-4 border border-success shadow-sm rounded bg-white">
                  <h3 class="text-primary">Order Completed <i class="fa fa-check-circle text-success "></i>  </h3>
                  <p><button class="btn btn-primary btn-sm btn-block"><i class="fa fa-list" onclick="createBill()"></i> Generate Bill </button></p>
                </div>
              </div>
            </div>`)
        $(".order_draft").remove()
        createBill()


      }, function() {

      });
      else{
        $("#user_contact_group").hasClass("border border-danger") ? " " : $("#user_contact_group").addClass("border border-danger")
        hideoverlay($("#quick_order_table"))
        $.notify({
          message: "Please provide valid user contact"
        }, {
          type: 'danger',
          z_index: 10000,
          timer: 2000,
        })
      }




    }



  }
  const isDuplicateItem = (value) => {
    if($(".item_name").length == 0 )
    return false;
    else{
    let duplicate = $(".item_name").filter((num, elem) => {
      return $(elem).val() == value
    }).get()
    
    return  duplicate.length > 1 
   }
  }
  const newOrder = () => {
    window.open("{{route('quick-order')}}", "_blank")
  }
  const saveDraft = async () => {
    loadoverlay($("#quick_order_table"))
    let data = {}
    data.order_id = $("#order_id").val()
    data.total = $("#total").html()
    row_data = $("#expense_body tr").map(function(index, elem) {
      let row = {};
      row.order_id = data.order_id
      row.item_id = $(elem).find(".item_name").val()
      row.quantity = $(elem).find(".qty").val()
      row.price = $(elem).find(".price").val()
      row.subtotal = $(elem).find(".subtotal").val()
      return row
    }).get()
    await $.post("/api/save-order-details", {
      row_data,
      order_id: data.order_id,
      total: data.total
    }, function(res) {

      //   hideoverlay($("#expense_body"));
      //   $.notify({
      //   message: "Order saved successfully"
      // }, {
      //   type: 'success',
      //   z_index: 10000,
      //   timer: 2000,
      // })
      return res
    })
    let charge_data = []
    charge_data = $("#charge_body tr.charges_row").map(function(index, elem) {
      let row = {};
      row.order_id = data.order_id
      row.charge_id = $(elem).find(".charges").val()
      row.amount = $(elem).find(".subtotal").val()
      return row
    }).get()
    await $.post("/api/save-charge-details", {
      row_data: charge_data,
      order_id: data.order_id,
      total: data.total
    }, function(res) {

      hideoverlay($("#quick_order_table"));
      $.notify({
        message: "Order saved successfully"
      }, {
        type: 'success',
        z_index: 10000,
        timer: 2000,
      })
    })



  }
  countTotal();
  document.onkeyup = function(e) {
    e.preventDefault()
    console.log(`${e.which} is value for  ${e.which ? String.fromCharCode(e.which) : e}`)
    //New Order ShortCut
    if (e.altKey && e.which == 79) {
      newOrder()
    }
    if (e.altKey && e.which == 83) {
      saveDraft()
    }
    if (e.shiftKey && e.which == 107) {
      add_row()
    }
    // else if (e.ctrlKey && e.which == 66) {
    //   alert("Ctrl + B shortcut combination was pressed");
    // } else if (e.ctrlKey && e.altKey && e.which == 89) {
    //   alert("Ctrl + Alt + Y shortcut combination was pressed");
    // } else if (e.ctrlKey && e.altKey && e.shiftKey && e.which == 85) {
    //   alert("Ctrl + Alt + Shift + U shortcut combination was pressed");
    // }
  };
  const generateBill = (order) => {
    return $(`<div class="container " >
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-body">
               <div class="invoice" id="section-to-print">
                  <div>
                     <div>
                        <div class="row p-3">
                           <div class="col-sm-6">
                              <div class="media">
                                 <div class="media-left"><img class="media-object img-60" src="{{asset('assets/images/logo/rollswallah.png')}}" alt=""></div>
                                 <div class="media-body m-l-20 text-right">
                                    <h4 class="media-heading">ROLLSWALLAH</h4>
                                    <p>Have Some Rolls</p>
                                 </div>
                              </div>
                              <!-- End Info-->
                           </div>
                           <div class="col-sm-6">
                              <div class="text-md-end text-xs-center">
                                 <h3>ORDER_ID #<span class="counter">${order.order_id}</span></h3>
                                 <p>${new Date(order.created_at)}</span></p>
                              </div>
                              <!-- End Title-->
                           </div>
                        </div>
                     </div>
                     <hr>
                     <!-- End InvoiceTop-->
                     <div class="row">
                        <div class="col-md-4">
                           <div class="media">
                              <div class="media-left"><img class="media-object rounded-circle img-60" src="{{asset('assets/images/user/1.jpg')}}" alt=""></div>
                              <div class="media-body m-l-20">                               
                                 <p><span>${order.user_contact ?? "No contact given"}</span></p>
                              </div>
                           </div>
                        </div>
                        
                     </div>
                     <!-- End Invoice Mid-->
                     <div>
                        <div class="table-responsive invoice-table" id="table">
                           <table class="table table-bordered table-striped">
                              <tbody>
                                 <tr>
                                    <td class="item">
                                       <h6 class="p-2 mb-0">Item Description</h6>
                                    </td>
                                    <td class="Hours">
                                       <h6 class="p-2 mb-0">Quantity</h6>
                                    </td>
                                    <td class="Rate">
                                       <h6 class="p-2 mb-0">Price</h6>
                                    </td>
                                    <td class="subtotal">
                                       <h6 class="p-2 mb-0">Sub-total</h6>
                                    </td>
                                 </tr>
                                 ${order.order_details.map((order_row,key)=>{
                         
                                  return (`<tr>
                                    <td class="item">
                                      ${order_row.item.name}
                                    </td>
                                    <td class="Hours">
                                     x ${order_row.quantity}
                                    </td>
                                    <td class="Rate">
                                    <i class='fa fa-inr'></i> ${order_row.price}
                                    </td>
                                    <td class="subtotal">
                                    <i class='fa fa-inr'></i> ${order_row.subtotal}
                                    </td>
                                 </tr>`)
                                 })}
                                 ${order.charge_details.map((order_row,key)=>{
                         
                         return (`<tr>
                                    <td></td>
                                    <td></td>
                                    <td class="Rate">
                                      ${order_row.charge.title}
                                    </td>
                                    <td class="payment">
                                       <i class='fa fa-inr'></i> ${order_row.amount}
                                    </td>
                                 </tr>`)
                        })}
                                 
                                
                    
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="Rate">
                                       <h6 class="mb-0 p-2">Total</h6>
                                    </td>
                                    <td class="payment">
                                       <h6 class="mb-0 p-2"><i class='fa fa-inr'></i> ${order.total ?? 0}</h6>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                        <!-- End Table-->
        
                     </div>
                     <!-- End InvoiceBot-->
                  </div>
                  
                  <!-- End Invoice-->
                  <!-- End Invoice Holder-->
                  <!-- Container-fluid Ends-->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>`)
  }

  const createBill = async () => {
    let order = await $.get("/api/get-order/" + $("#order_id").val(), (data) => {
      return data
    })
    //  console.log(order,"order")

    $("#bill").html(generateBill(order.data))
    $("#billModal").modal("show")
  }

  const view_menu  = () => {
    // getItemBox()
    if($("#expense_body tr").length == 0)
    $("#selectModal").modal("show")
    else
    $("#expense_body tr").each(function(key,elem){
      $(".product_id_"+$(elem).data("item_id")).trigger("click")
    }).after(function(){
      $("#selectModal").modal("show")
    })
   
  }
  const auto_click  =async  () => {
    //  await getItemBox()
    $("#expense_body tr").each(function(key,elem){
     $(".product_id_"+$(elem).data("item_id")).trigger("click")
    })
  }
  $(document).ready(function(){
    auto_click()
    addOrderEasyD()
  })
  $("#itemModalContent").on("click",".product",function(){
    // $(".item_name_place").removeClass("shadow-sm border-success border")
    $(this).addClass("border-success border product_selected")    
    $(this).find(".cross_button").removeClass("d-none")
    $(this).parent("div").find(".delete_btn").show()
    let item = {
        id : $(this).data("id"),
        name : $(this).data("name"),
        price : $(this).data("price")
    }
   
   

    // console.log(item)
    addItem(item)
    try {
      $(this).find(".qty_item_"+item.id).val($(".qty_input_"+item.id).val() ?? 1)
    } catch (error) {
      console.error(error.message)
    }
  })


  const addItem = (item) => {

       if(!isDuplicateItem(item.id))
        { 
          if($("#new_row_"+item.id).length == 0) 
          add_row(item.id)    
        else
        {
          
        }
        let item_holder = $("#new_row_"+item.id).find(".items")        
        var newOption = new Option(item.name, item.id, false, false);
        $(item_holder).append(newOption).val(item.id).trigger('change');    
        }
        
    
  }



</script>


<!-- <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script> -->
@endsection