
<style type="text/css">
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
  .product:hover{
    box-shadow: 0px 2px 2px 2px rgba(0,0,0,0.1);
    border: rgba(0,100,0,0.9);
    border-radius: 0.2rem;
    cursor: pointer;
  }
  .img{
    min-height: 50px;
   
  }
  
  
</style>

    <div class="card-body">
        <div class="row">
        <div class="col pt-2 pb-2 pr-4 pl-4">
                <input type="text" class="form-control" placeholder="search for item" onkeyup="getItemBox()" id="search_key_item_box">
            </div>
            <div class="col pt-2 pb-2 pr-4 pl-4">
                <select name="sub_category_easy" id="sub_category_easy" class="form-control" onchange="getItemBox()">
                    <option value=""> Filter by Category</option>
                    <option value="ice_cream">ice_cream</option>
                    <option value="fast_food">fast_food</option>
                </select>
            </div>
            
           
        </div>
    </div>
    <div class="card-body">
      <?php if(isset($order)): ?>
      <div class="row p-2">
       <h6>ORDER-ID: <strong><small><?php echo e($order->order_id); ?></small></strong></h6> 
      </div>
      <?php endif; ?>
      <div class="row p-2">
        <table id="item_details_table" class="table">
          <tbody>
          <tr><th></th><th></th>
          </tr>
            <tr>
              <td class="p-1"> <span class="small" id="item_coma"></span></td>
              <td class="p-2 " colspan="2"><span id="item_total" class="badge badge-dark"></span></td>
            </tr>           
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-body">
        <div class="row" id="item_box_row">
           
        </div>
    </div>
    <div class="card-footer">
          <button class="btn btn-dark btn-sm m-2 order_draft" onclick="setAllData()"> <i class="fa fa-send"></i> Place Order </button>
          <button class="btn btn-primary btn-sm m-2 order_draft" onclick="saveDraft()"> <i class="fa fa-save"></i> Save Draft </button>
           <button class="btn btn-primary btn-sm m-2" id="add_new_order" onclick='newOrder()'><i class="fa fa-plus-circle"></i> New Order</button>
           <button class="btn btn-danger btn-sm m-2" id="hide_menu" onclick='hide_menu()'><i class="fa fa-times"></i> Close</button>
    </div>
<script>
   let timer = 500;
 let timeOutCall
const getItemBox = async () =>{

 clearTimeout(timeOutCall)
 timeOutCall =  setTimeout( ()=>{
  loadoverlay($("#item_box_row"))
   $.get("<?php echo e(route('get-item-box')); ?>",{type:"product",sub_category : $("#sub_category_easy").val(),order_id:$("#order_id").val(),search:$("#search_key_item_box").val()})
    .then((data)=>{
     hideoverlay($("#item_box_row"))
    $("#item_box_row").html(data)
    // if(typeof("countTotal") !== undefined)
    // countTotal()
    if(typeof("auto_click") !== undefined)
    auto_click()
    
    })

 },600)
    
}
getItemBox()
</script>


<?php $__env->startPush('script'); ?>

<script>
  //Hello Pushed
  $("#from_date").prop('max', $("#to_date").val());
  $("#to_date").change(function() {
    $("#from_date").prop('max', $("#to_date").val());
  });
  $("#from_date").change(function() {
    $("#to_date").prop('min', $("#from_date").val());
  });

  
</script>




<!-- <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script> -->
<?php $__env->stopPush(); ?><?php /**PATH C:\Users\subra\Documents\projects\rollswallah\resources\views/components/layouts/order-easy.blade.php ENDPATH**/ ?>