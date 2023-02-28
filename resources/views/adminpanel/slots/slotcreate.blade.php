@extends('adminpanel.master')
@section('title', 'Sample Page')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3><i class="fas fa-plus-circle"></i> Create Slot </h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Slots</li>
<li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="bg-white shadow-sm border-danger border">
            <div class="card-body" id="option_space">
                <h6>Select doctors for which the appointment slots are to be created</h6>
                <div class="row p-2 mt-3">
                    <div class="col-md-12 mb-2">
                        <label>Select Centres</label>
                        <select class="form-control shadow-sm" id="centres" multiple="multiple">
                            @foreach($centres as $centre)
                            <option value="{{$centre->id}}">{{$centre->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Select Doctors</label>
                        <select class="form-control shadow-sm" id="doctors" multiple="multiple"></select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Date Range</label>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="input-group-square">									
									<div class="input-group mb-3">
										<div class="input-group-prepend"><span class="input-group-text">From</span></div>
										<input class="form-control shadow-sm" type="text"  id="from_date" data-language="en">
									</div>
								</div>
                            </div>
                            <div class="col-md-6">
                            <div class="input-group-square">									
									<div class="input-group mb-3">
										<div class="input-group-prepend"><span class="input-group-text">To</span></div>
										<input class="form-control shadow-sm" type="text"  id="to_date" data-language="en">
									</div>
								</div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-md-12">
                    <button class="btn  btn-outline-danger shadow" id="create_slot" type="button" data-bs-original-title="" title="" data-original-title="btn btn-pill btn-primary btn-air-primary"><i class="fas fa-plus-square"></i> Start Creating Slots</button>
                    </div>
                </div>
              
            </div>
         </div>
      </div>
      <div class="col-sm-12 mt-4 ml-5 mb-4">
      <span class="badge badge-danger mt-4">OR,</span></div>
      <div class="col-sm-12 mt-4 mb-4 p-2">
         <div class="bg-white shadow-sm border-primary border">
            <div class="card-body" id="edit_space">
                <h6>Create individual slots</h6>
                <div class="row mt-3 " id="slot_space" >
              
                    <div class="col-md-4 mb-2">
                        <label>Select Doctor</label>
                        <select class="form-control shadow-sm" id="doctors2" ></select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label>Select Centre</label>
                        <select class="form-control shadow-sm" id="centres2">
                            @foreach($centres as $centre)
                            <option value="{{$centre->id}}">{{$centre->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label>Free Slots</label>
                        <input type="number" min="0" class="form-control shadow-sm" id="">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>Date(s)</label>
                        <input class="datepicker-here form-control shadow-sm digits" type="text" data-multiple-dates="3" data-multiple-dates-separator=", " data-language="en">
                    </div>
                    <div class="col-md-3 mb-2">
                    <label>From:(time)</label>
                                    <div class="input-group date" id="dt-time" data-target-input="nearest">
										<input class="form-control shadow-sm datetimepicker-input digits" type="text" data-target="#dt-time" data-bs-original-title="" title="" id="from_time">
										<div class="input-group-text" data-target="#dt-time" data-toggle="datetimepicker">From <i class="fa fa-clock-o"></i></div>
									</div>
                                    </div>
                                   <div class="col-md-3 mb-2">
                                   <label>To:(time)</label>
                                   <div class="input-group date" id="dt-time2" data-target-input="nearest">
										<input class="form-control shadow-sm datetimepicker-input digits" type="text" data-target="#dt-time2" data-bs-original-title="" title="" id="to_time">
										<div class="input-group-text" data-target="#dt-time2" data-toggle="datetimepicker">To <i class="fa fa-clock-o"></i></div>
									</div>
                                   </div>
                    <div class="col-md-12 mt-3">
                    <button class="btn  btn-outline-primary shadow btn-block" id="create_slot" type="button" data-bs-original-title="" title="" data-original-title="btn btn-pill btn-primary btn-air-primary"><i class="fas fa-plus-square"></i> Create Slots</button>
                    </div>
               
                </div>
      
              
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
<script>
 $(function(){
   $( "#from_date" ).datepicker({
        language: 'en',
        minDate: new Date() // Now can select only dates, which goes after today
    }) ;
   $( "#to_date" ).datepicker({
        language: 'en',
        minDate: new Date() // Now can select only dates, which goes after today
    }) ;
    $("#from_date").on("change",()=>{
        $( "#to_date" ).datepicker( "option", "minDate", new Date($(this).val()) );
    })


    $("#create_slot").on("click",()=>{
        loadoverlay($("#option_space"))
        var form = new FormData();
	    form.append("doctor_id_list",JSON.stringify($("#doctors").val()));
        form.append("from_date", $("#from_date").val());
        form.append("to_date", $("#to_date").val());

        var settings = {
            "url": "/api/create-slots",
            "method": "POST",
            "timeout": 0,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": form,

            statusCode: {
                400: function () {
                    hideoverlay($("#option_space"))
                    // response = JSON.parse(response);
                    $.notify({
                        message: "Please upload valid data"
                    }, {
                        type: 'danger',
                        z_index: 10000,
                        timer: 2000,
                    });
                },
                500: function () {
                    hideoverlay($("#option_space"))
                    //	response = JSON.parse(response);
                    $.notify({
                        message: "Something went wrong!"
                    }, {
                        type: 'danger',
                        z_index: 10000,
                        timer: 2000,
                    })
                }
            }
        };

        $.ajax(settings).done(function (response) {
            hideoverlay($("#option_space"))
            var json_response = JSON.parse(response);
            // $.each(json_response.slot_data,(key,val)){}
          
            $.notify({
                message: json_response.message
            }, {
                type: 'success',
                z_index: 10000,
                timer: 2000,
            })
        })
    })
    $("#centres").select2();
    $("#centres2").select2();

    $('#doctors').select2();
    $('#doctors2').select2({
            tags: false,
            ajax: {
                "url": "/api/centre-doctors/",
                "method":"post",                
                delay: 600,
                minimumResultsForSearch: -1,
                data: function (params) {
            var query = {
             search: params.term
            }
            return query;
        },
           processResults: function(response) {
                    response = JSON.parse(response);
                    return {
                        results: response.items
                    };

                },

            },

        });
    $("#centres").on('change', (e) => {
        $('#doctors').select2({
            tags: false,
            ajax: {
                "url": "/api/centre-doctors/",
                "method":"post",                
                delay: 600,
                minimumResultsForSearch: -1,
                data: function (params) {
            var query = {
             centres: JSON.stringify($("#centres").val())
            }

            // Query parameters will be ?search=[term]&page=[page]
            return query;
         },
           processResults: function(response) {
                    response = JSON.parse(response);
                    return {
                        results: response.items
                    };

                },

            },

        });

        $.each($("#doctors").children("option"),function(){
            this.prop("selected","selected");
        })

    })

 });
</script>
@endsection