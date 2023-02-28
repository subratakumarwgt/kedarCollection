@extends('userpanel.master')
@section('title', 'Track Order')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">
@endsection

@section('style')
<style>
	@media(max-width:786px){
		.cd-container {
    width: 100%;
	max-width: none;    
             }
	}
	.cd-timeline-content {
    position: relative;
    background: #fdfeff;
    border-radius: 4px;
    padding: 30px;
    -webkit-box-shadow: 1px 1px 2px 1px rgb(0 0 0 / 8%);
    box-shadow: 1px 1px 2px 1px rgb(0 0 0 / 8%);
}
	#cd-timeline {
    position: relative;
    padding: 2em 0;
}

.cd-container {
    width: 80%;
    max-width: 670px;
	min-width: 300px;
    margin: 0 auto;
}
	.cd-timeline-img {
    width: 60px;
    height: 60px;
    left: 50%;
    margin-left: -30px;
    -webkit-transform: translateZ(0);
    -webkit-backface-visibility: hidden;
    position: absolute;
    top: 0;
    border-radius: 4px;
}
.cd-timeline-block {
    position: relative;
    margin: 30px 0;
}
	.hori-timeline .events {
    border-top: 3px solid #e9ecef;
}
.hori-timeline .events .event-list {
    display: block;
    position: relative;
    text-align: center;
    padding-top: 70px;
    margin-right: 0;
}
.hori-timeline .events .event-list:before {
    content: "";
    position: absolute;
    height: 36px;
    border-right: 2px dashed #dee2e6;
    top: 0;
}
.hori-timeline .events .event-list .event-date {
    position: absolute;
    top: 38px;
    left: 0;
    right: 0;
    width: 75px;
    margin: 0 auto;
    border-radius: 4px;
    padding: 2px 4px;
}
@media (min-width: 1140px) {
    .hori-timeline .events .event-list {
        display: inline-block;
        width: 24%;
        padding-top: 45px;
    }
    .hori-timeline .events .event-list .event-date {
        top: -12px;
    }
}
.bg-soft-primary {
    background-color: rgba(64,144,203,.3)!important;
}
.bg-soft-success {
    background-color: rgba(71,189,154,.3)!important;
}
.bg-soft-danger {
    background-color: rgba(231,76,94,.3)!important;
}
.bg-soft-warning {
    background-color: rgba(249,213,112,.3)!important;
}
.card {
    border: none;
    margin-bottom: 24px;
    -webkit-box-shadow: 0 0 13px 0 rgba(236,236,241,.44);
    box-shadow: 0 0 13px 0 rgba(236,236,241,.44);
}

	.rating{
  position: relative;
  display: flex;
  margin: 10px 0;
  flex-direction: row-reverse ;
}
.rating input{
  position: relative;
  width: 20px;
  height: 35px;
  display: flex;
  justify-content: center;
  align-items: center;
  -webkit-appearance: none;
  appearance: none;
  overflow: hidden;
}
.rating input::before{
  content: '\f005';
  position: absolute;
  font-family: fontAwesome;
  font-size: 28px;
  position: absolute;
  left: 4px;
  color: #030b0f;
  transition: 0.5s;
}
.rating input:nth-child(2n + 1)::before{
  right: 4px;
  left: initial;
}
.rating input:hover ~ input::before,
.rating input:hover::before,
.rating input:checked ~ input::before,
.rating input:checked::before{
  color: #1f9cff;
}	
.timeline-steps {
        display: flex;
        justify-content: center;
        flex-wrap: wrap
    }

    .timeline-steps .timeline-step {
        align-items: center;
        display: flex;
        flex-direction: column;
        position: relative;
        margin: 1.45rem
    }

    @media (min-width:768px) {
	
        .timeline-steps .timeline-step:not(:last-child):after {
            content: "";
            display: block;
            border-top: .25rem dotted darkolivegreen;
            width: 3.46rem;
            position: absolute;
            left: 7.5rem;
            top: .3125rem
        }

        .timeline-steps .timeline-step:not(:first-child):before {
            content: "";
            display: block;
            border-top: .25rem dotted darkolivegreen;
            width: 3.8125rem;
            position: absolute;
            right: 7.5rem;
            top: .3125rem
        }
    }

    .timeline-steps .timeline-content {
        width: 6rem;
        text-align: center
    }

    .timeline-steps .timeline-content .inner-circle {
        border-radius: 1.5rem;
        height: 0.8rem;
        width: 0.8rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: green
    }

    .timeline-steps .timeline-content .inner-circle:before {
        content: "";
        background-color: darkolivegreen;
        display: inline-block;
        height: 3rem;
        width: 3rem;
        min-width: 3rem;
        border-radius: 6.25rem;
        opacity: .5
    }
	.cd-timeline-block:first-child {
    margin-top: 0;
}

@media only screen and (min-width: 1170px)
{.cd-timeline-block:first-child {
    margin-top: 0;
}}
.cd-timeline-block {
    position: relative;
    margin: 30px 0;
}
@media only screen and (min-width: 1170px)
{.cd-timeline-block {
    margin: 4em 0;
}}
</style>
@endsection
@section('breadcrumb-title')
<h5>Order Log</h5>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Orders</li>
<li class="breadcrumb-item active">Track Order </li>
<li class="breadcrumb-item active">{{@$order->order_id}} </li>
@endsection

@section('banner')
<div class="" style="height: 200px;position:fixed;filter: blur(50px);-webkit-filter: blur(50px);"><img src="/images/banner.webp" alt="" style="min-width: 1000px;"></div>
@endsection

@section('content')

<div class="container-fluid mt-5">
	<div class="row justify-content-center">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-md-8 mt-5">
					<h6> Order Timeline <span class="pull-right"> Order ID: {{@$order->order_id}}</span></h6>
					
				</div>

				<div class="col-md-8 pt-3 pb-3 row text-ark container">

					<input type="hidden" value="{{$order_log->order}}" id="booking">
					<input type="hidden" value="{{$order}}" id="order">
					<input type="hidden" value="{{$order->order_id}}" id="order_id">
					<!-- cd-timeline Start-->
					<section class="cd-container " id="cd-timeline">
						@foreach($order_log->steps as $log)
						<input type="hidden" value="{{$log}}" class="steps">
						<div class="cd-timeline-block text-center bg-white" id="loader_{{$log->id}}">
							<div class="cd-timeline-content">
								<span>Loading...</span>
								<div class="spinner-border" role="status">
									<span class="sr-only">Loading...</span>
								</div>
							</div>
						</div>
						@endforeach
					</section>
					<!-- cd-timeline Ends-->
					<!-- Container-fluid ends                    -->
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/timeline/timeline-v-1/main.js')}}"></script>
<script src="{{asset('assets/js/modernizr.js')}}"></script>
<script>
	function formatDate(date) {
  let diff = new Date() - date; // the difference in milliseconds

  if (diff < 1000) { // less than 1 second
    return 'right now';
  }

  let sec = Math.floor(diff / 1000); // convert diff to seconds

  if (sec < 60) {
    return sec + ' sec. ago';
  }

  let min = Math.floor(diff / 60000); // convert diff to minutes
  if (min < 60) {
    return min + ' min. ago';
  }

  // format the date
  // add leading zeroes to single-digit day/month/hours/minutes
  let d = date;
  d = [
    '0' + d.getDate(),
    '0' + (d.getMonth() + 1),
    '' + d.getFullYear(),
    '0' + d.getHours(),
    '0' + d.getMinutes()
  ].map(component => component.slice(-2)); // take last 2 digits of every component

  // join the components into date
  return d.slice(0, 3).join('.') + ' ' + d.slice(3).join(':');
}

	var booking = document.getElementById("booking");
	var order= document.getElementById("order");
	booking = JSON.parse(booking.value);
	 order = JSON.parse(order.value);
	 let order_id = order.order_id
	const step_one = (data, dataJson,order) => $(`<div class="cd-timeline-block" >
							<div class="cd-timeline-img cd-picture bg-${data.class}"><i class="fa fa-check-square"></i></div>
							<div class="cd-timeline-content border-bottom border-top border-${data.class}">
								<h5 class="text-primary  p-2">${data.section_title}</h5>
								<p class="m-0  border-bottom">Order ID: <strong class="badge badge-warning text-dark pull-right">ID: ${order_id}</strong></p>
								${JSON.parse(JSON.stringify(order.orderDetails)).map((value)=>{
									return (`<p class="m-0 border-bottom"><strong class="text-${data.class}"> ${value.quantity}x ${value.product.name} </strong>   <strong class="pull-right"> ₹ ${value.subtotal}</strong></p>`)
								}).join('')}								
								<p class="m-0 border-bottom">Total: <strong class="pull-right  text-${data.class}"><i class="fa fa-inr small"></i> ${order.total}.00</strong></p>
								<p class="m-0  text-right border-bottom"> Recieved on:<strong class="small pull-right"> ${formatDate(new Date(order.created_at))}</strong></p>
								<p class="m-0 text-success text-center">${data.update_message}</strong></p>
							</div>
						</div>`);
	const step_one_append = (data, dataJson) => $(`<div class="cd-timeline-block ">
							<div class="cd-timeline-img cd-movie bg-${data.class}"><i class="fa fa-check-square"></i></div>
							<div class="cd-timeline-content border-bottom border-top border-${data.class}">
								<h5 class="text-primary  p-2">${data.section_title}</h5>
								<h6 class="p-1">Your Order is <span class="text-${data.class}"> ${data.status_name} <i class="fa fa-check-square"></i> .</span></h6>
								<p class="m-0 text-success text-center">${data.update_message}</strong></p>
							</div>
						</div>`);

	const step_two = (data, dataJson) => $(`<div class="cd-timeline-block ">
							<div class="cd-timeline-img cd-movie bg-${data.class}"><i class="fa fa-check-square"></i></div>
							<div class="cd-timeline-content border-bottom border-top border-${data.class}">
								<h5 class="text-primary  p-2">${data.section_title} <i class="fa fa-check-circle"></i>  | <small>${formatDate(new Date(data.created_at))}</small></h5>
								<h6 class="p-1">Your Order is <span class="text-${data.class}"> ${data.status_name} <i class="fa fa-check-circle"></i> .</span></h6>		
								<p class="m-0 text-success text-center">${data.update_message}</strong></p>					
							</div>
						</div>`);

	const step_three = (data, dataJson,order) => {
		return $(`<div class="cd-timeline-block ">
		               <div class="cd-timeline-img cd-movie bg-${data.class} "><i class="fa fa-check-square"></i></div>
							<div class="cd-timeline-content border-bottom border-top border-${data.class}">
								<h5 class="text-primary  p-2">Ready <i class="fa fa-check-circle"></i>  | <small>${new Date(Date.parse(data.created_at)).toDateString()}</small></h5>
								${order.orderDetails.map((value,index)=>{
									return (`<p class="m-0 border-bottom"><strong class=""> ${value.quantity}x ${value.product.name}</strong>   <strong class="pull-right"> ₹ ${value.subtotal}</strong></p>`)
								}).join('')}						
								<p class="m-0 text-success text-center">${data.update_message}</strong></p>
							</div>
							
						</div>`);

	}
	const step_extra = () => {
		return $(`<div class="cd-timeline-block ">
		               <div class="cd-timeline-img cd-movie bg-success "><i class="fa fa-success"></i></div>
							<div class="cd-timeline-content border-bottom border-top border-success">
								<h5 class="text-primary">Further information will be added here</h5>
								<div class="card-body chart-block">
									<div class="chart-overflow" id="column-chart2">
										<div class="loader-box">
											<div class="loader-2"></div>
										</div>
									</div>
								</div>				
								
							</div>
							
						</div>`);

	}
	const step_four = (data, dataJson) => {
		return $(`<div class="cd-timeline-block border-bottom-${data.class}">
							<div class="cd-timeline-img cd-location bg-${data.class}"> <i class="fa fa-check-square"></i></div>
							<div class="cd-timeline-content">
							
								<h5 class="bg-light text-success p-3">How was the food ?<i class="fa fa-smile-o" aria-hidden="true"></i></h5>
								<div class="form-group">
								
									<div class="rating">
									<input type="radio" name="html" class="rating_radio" value="5.0">
									<input type="radio" name="html" class="rating_radio" value="4.5">
									<input type="radio" name="html" class="rating_radio" value="4.0">
									<input type="radio" name="html" class="rating_radio" value="3.5">
									<input type="radio" name="html" class="rating_radio" value="3.0">
									<input type="radio" name="html" class="rating_radio" value="2.5">
									<input type="radio" name="html" class="rating_radio" value="2.0">
									<input type="radio" name="html" class="rating_radio" value="1.5">
									<input type="radio" name="html" class="rating_radio" value="1.0">
									<input type="radio" name="html" class="rating_radio" value="0.5">
									
									</div>	
									<label>Please share your feedback</label>
								</div>
								
							</div>
						</div>`)
	}

	const step_five = (data, dataJson) => {
		return $(`<div class="cd-timeline-block border-bottom-${data.class}">
							<div class="cd-timeline-img cd-location bg-${data.class}"><i class="fa fa-check-square"></i></div>
							<div class="cd-timeline-content">
								<h5 class="bg-light text-primary p-3">Delivered <i class="fa fa-check-circle" aria-hidden="true"></i> | <small>${formatDate(new Date(data.created_at))}</small></h5>
								<p class="m-0 text-success text-center">${data.update_message}</strong></p>
								
							</div>
						</div>`)
	}
	
	const step_six = (data, dataJson,order) => {
		return $(`<div class="cd-timeline-block border-bottom-${data.class}">
							<div class="cd-timeline-img cd-location bg-${data.class}"><i class="fa fa-check-square"></i></div>
							<div class="cd-timeline-content">
								<h5 class="bg-light text-primary p-3">Packed & Handed Over <i class="fa fa-check-circle" aria-hidden="true"></i> | <small>${formatDate(new Date(data.created_at))}</small></h5>
								<p class="m-0 text-success text-center">${data.update_message}</strong></p>
								<p class="m-0 text-success text-center">
                                ${order.status != "complited" ? `<button class="btn btn-success" onclick="deliverOrder(${order.order_id},this)">Order recieved</button>` : "" } </strong></p>
							</div>
						</div>`)
	}
	var steps = document.getElementsByClassName("steps");
	const setNodes = async () => {
		// let loader = $(`<div class="card-body chart-block">
        //                         <div class="chart-overflow" id="column-chart2">
        //                             <div class="loader-box">
        //                                 <div class="loader-2"></div>
        //                             </div>
        //                         </div>
        //                     </div>`); 
		// $("#order_timeline_holder").html(loader)
        // $timeline = await $.get("/management/sales/orders/timeline",{order_id}).then((data)=>{
           
        //     $("#order_timeline_holder").html(data)
        // })
		
		steps =await $.get("/api/get-order-steps/"+order_id)
		             .then((data)=>{
						   order = data.order
                           return data.data
						  
					 })
					 $("#cd-timeline").html("")	
					 let last_step = steps.length;
					
		await steps.forEach(element => {
			let data = element;
			let dataJson = data.section_content_json
			var container = document.getElementById("cd-timeline");
			
			$("#loader_" + data.id).remove();
			

			switch (parseInt(data.step_no)) {

				case 1:
					$("#cd-timeline").append(step_one(data, dataJson,order));
					if(1 == last_step)
					$("#cd-timeline").append(step_extra());
					break;
				case 2:
					$("#cd-timeline").append(step_two(data, dataJson));
					if(2 == last_step)
					$("#cd-timeline").append(step_extra());
					break;
				case 3:
					$("#cd-timeline").append(step_three(data, dataJson,order));	
					if(3 == last_step)
					$("#cd-timeline").append(step_extra());
					break;
				case 4:				
					$("#cd-timeline").append(step_six(data, dataJson,order));	
					if(4 == last_step)
					$("#cd-timeline").append(step_extra());				
					break;
				case 5:
					$("#cd-timeline").append(step_five(data, dataJson));
					if (dataJson.feedback !== "") {
					$("#cd-timeline").append(step_four(data, dataJson));
					} else {
						
						
					}


					break;

				default:

					break;
			}
		})
	}

	setTimeout(() => {
		setNodes()
	}, 100);
	const deliverOrder = async (order_id,form) => {
    
        loadoverlay($(form))
        let packOrder =await $.post("/api/deliver-order/"+order_id)
                            .then((data)=>{
                                hideoverlay($(form))
                                $.notify({
									message: "Order marked as delivered"
								}, {
									type: 'success',
									z_index: 10000,
									timer: 2000,
								})
								setNodes()
                            })
                            .error(error =>{
                                hideoverlay($(form))
                                // getOrderHistory(order_id)
                            })
    }
	
	$("#cd-timeline").on("change",".rating_radio",function(){
		setNodes()
	  })
</script>
@endsection