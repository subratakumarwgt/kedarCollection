@extends('adminpanel.master')
@section('title', 'Edit New Doctor')

@section('css')

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Edit Doctor Info  <i class="fas fa-user-md"></i></h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Doctors</li>
<li class="breadcrumb-item active">Edit </li> 
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			
				<div class="card-body">
					<form class="f1" method="post" enctype="multipart/form-data" action="/management/doctor/import/data" id="doctor_form">
						@csrf
						<input type="hidden" id="doctor_id" value="{{@$doctor->id}}">
						<input type="hidden" id="visit_id" value="{{@$doctor->visits->id}}">
						<div class="f1-steps">
							<div class="f1-progress">
								<div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3"></div>
							</div>
							<div class="f1-step active">
								<div class="f1-step-icon"><i class="fas fa-user-md"></i></div>
								<p>Personal Info</p>
							</div>
							<div class="f1-step">
								<div class="f1-step-icon"><i class="fas fa-briefcase-medical"></i></div>
								<p>Medical Info</p>
							</div>
							<div class="f1-step">
								<div class="f1-step-icon"><i class="fas fa-hospital-user"></i></div>
								<p>Visits</p>
							</div>
						</div>
						<fieldset>
                        <div class="row">
                            <div class="col-md-3 "> <img class="img-fluid mt-3 shadow" src="/{{@$doctor->image}}" id="img_prv"></div>
                            <div class="col-md-9">
                                <div class="row">
                                <div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Name</label>
									<div class="input-group-square">
									
									<div class="input-group mb-3">
										<div class="input-group-prepend"><span class="input-group-text">Dr.</span></div>
										<input class="form-control" type="text" placeholder="Doctor's Full Name" data-bs-original-title="" title="" id="name" value="{{@$doctor->name}}">
									</div>
								</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label">Gender</label>
									<select class="form-control btn-square" id="gender">
										<option value="">--Select--</option>
										<option value="1" @if($doctor->gender == 1) selected @endif>Male</option>
										<option value="2" @if($doctor->gender == 2) selected @endif>Female</option>
									<select>
								</div>
							</div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label" >Fees <i class="fa fa-inr"></i> (full charge)</label>
									<input class="form-control" type="text" placeholder="full fees" data-bs-original-title="" title="" id="full_charge" value="{{@$doctor->full_charge}}">
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Fees <i class="fa fa-inr"></i> (advance charge)</label>
									<input class="form-control" type="text" placeholder="advance/booking fees" data-bs-original-title="" title="" id="booking_charge" value="{{@$doctor->booking_charge}}">
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label" >Image</label>
                                   
									<input class="form-control" type="file" accept="image,jpg,png" max="10000" placeholder="Image" data-bs-original-title="" title="" id="image">
								</div>
							</div>
                                </div>
                            </div>
							
							
						
							
							<div class="f1-buttons">
								<button class="btn btn-primary btn-next" type="button">Next</button>
							</div>
						</fieldset>
						<fieldset>
                        <div class="row">
							<div class="col-md-5">
								<div class="mb-3">
									<label class="form-label">Specialist</label>
									<input class="form-control" type="text" placeholder="Specialist" data-bs-original-title="" title="" id="specialist" value="{{@$doctor->specialist}}">
								</div>
							</div>
							<div class="col-sm-6 col-md-4">
								<div class="mb-3">
									<label class="form-label">Experience( in years. eg: 2)</label>
                                    <input class="form-control" type="text" placeholder="Experience( in years. eg: 2)" data-bs-original-title="" title="" id="experience" value="{{@$doctor->experience}}">
								</div>
							</div>
                            <div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label" >Frequency</label>
                                    <select class="form-control btn-square " id="visit_frequency" >
										<option value="monthly" @if($doctor->visit_frequency == 'monthly') selected @endif> Monthly</option>
                                        <option value="weekly" @if($doctor->visit_frequency == 'weekly') selected @endif> Weekly</option>
                                        <option value="daily" @if($doctor->visit_frequency == 'daily') selected @endif> Daily</option>

                                        
									</select>
								
								</div>
							</div>
                            <div class="col-sm-6 col-md-12">
								<div class="mb-3">
									<label class="form-label" >Degrees</label>
									<select class="form-control btn-square degrees" multiple="multiple" id="degree_json">
										<option value="mbbs" @if(in_array('mbbs',json_decode($doctor->degree_json,true))) selected @endif>M.B.B.S.</option>
										<option value="mphil" @if(in_array('mphil',json_decode($doctor->degree_json,true))) selected @endif>M. Phils.</option>
                                       
									</select>
								</div>
							</div>
                            <div class="col-md-12">
								<div class="mb-3">
									<label class="form-label">Visiting Places</label>
									<select class="form-control btn-square centres" multiple="multiple" id="centre_id_json">
										<option value="0">--Select--</option>
                                        @foreach($centres as $centre)
										<option value="{{$centre->id}}" @if(in_array($centre->id,json_decode($doctor->centre_id_json,true))) selected @endif>{{$centre->name}},{{$centre->type}}</option>
										@endforeach
									</select>
								</div>
							</div>
							
							
							<div class="col-md-12 mb-2">
								<div>
									<label class="form-label">Medical History</label>
									<textarea class="form-control" rows="5" placeholder="Enter About your description" id="medical_history">{{@$doctor->medical_history}}</textarea>
								</div>
							</div>
						</div>
							<div class="f1-buttons">
								<button class="btn btn-primary btn-previous" type="button">Previous</button>
								<button class="btn btn-primary btn-next" type="button">Next</button>
							</div>
						</fieldset>
						<fieldset>
                        <div class="row">
                        <div class="col-sm-6 col-md-4">
								<div class="mb-3">
									<label class="form-label">Visit Frequency <small>(visits how often?)</small></label>
                                    <select class="form-control btn-square " id="frequency" >
									<option value="monthly" @if($doctor->visits->frequency == 'monthly') selected @endif> Monthly</option>
                                        <option value="weekly" @if($doctor->visits->frequency == 'weekly') selected @endif> Weekly</option>
                                        <option value="daily" @if($doctor->visits->frequency == 'daily') selected @endif> Daily</option>
                                        
									</select>
								
								</div>
							</div>
							<div class="col-sm-6 col-md-4">
								<div class="mb-3">
									<label class="form-label">Visit Count <small>how many times ?</small></label>
                                    <input class="form-control" type="number" max="30" placeholder="how many times ?(eg: 2)" data-bs-original-title="" title="" id="count" value="{{@$doctor->visits->count}}">
								</div>
							</div>
                            <div class="col-sm-6 col-md-4">
								<div class="mb-3">
									<label class="form-label">Visit Type <small>(Weeks, Weekdays or Specific Dates)</small></label>
                                    <select class="form-control btn-square " id="type" value="{{@$doctor->visits->type}}">
                                    <option value="week_nos" @if($doctor->visits->type == 'week_nos') selected @endif>Week No(s)</option>
										<option value="week_days" @if($doctor->visits->type == 'week_days') selected @endif>Week Days</option>
                                        <option value="dates" @if($doctor->visits->type == 'dates') selected @endif>Specific Dates</option>                                 
									</select>
								
								</div>
							</div>
                            <div class="col-sm-6 col-md-4">
								<div class="mb-3">
									<label class="form-label">Visit Week No(s)</label>
									<select class="form-control btn-square week_no" multiple="multiple" id="week_no">
                                    <option value="">--null--</option>
                                    @for($i=1;$i<=4;$i++)
										<option value="{{$i}}"  @if(in_array($i,json_decode($doctor->visits->week_no,true))) selected @endif>{{$i}}</option>
                                   @endfor                                 
									</select>
								</div>
							</div>
                            <div class="col-sm-6 col-md-4">
								<div class="mb-3">
									<label class="form-label">Visit Week Day(s)</label>
									<select class="form-control btn-square week_day" multiple="multiple" id="days">
                                    <option value="">--null--</option>
                                    @foreach($weekdays as $day)
										<option value="{{$day['no']}}"  @if(in_array($day['no'],json_decode($doctor->visits->days,true))) selected @endif>{{$day['day']}}</option>
                                    @endforeach
                                                                    
									</select>
								</div>
							</div>
                            <div class="col-sm-6 col-md-4">
								<div class="mb-3">
									<label class="form-label">Visit Dates(s)</label>
									<select class="form-control btn-square dates" multiple="multiple" id="dates">
                                    <option value="">--null--</option>
                                        @for($i=1;$i<=31;$i++)
                                        <option value="{{$i}}" @if(in_array($i,json_decode(@$doctor->visits->dates,true))) selected @endif>{{$i}}</option>  
                                        @endfor                                                                    
									</select>
								</div>
							</div>
                            <div class="col-sm-12 col-md-12">
                            <div class="mb-3">
									<label class="form-label">Visit Timming(s)<small> (est Visiting timerange)</small></label>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="input-group date" id="dt-time" data-target-input="nearest">
										<input class="form-control datetimepicker-input digits" type="text" data-target="#dt-time" data-bs-original-title="" title="" id="from_time" value="{{@json_decode($doctor->visits->others_json)->from_time}}">
										<div class="input-group-text" data-target="#dt-time" data-toggle="datetimepicker">From <i class="fa fa-clock-o"></i></div>
									</div>
                                    </div>
                                   <div class="col-md-6">
                                   <div class="input-group date" id="dt-time2" data-target-input="nearest">
										<input class="form-control datetimepicker-input digits" type="text" data-target="#dt-time2" data-bs-original-title="" title="" id="to_time"  value="{{@json_decode($doctor->visits->others_json)->to_time}}">
										<div class="input-group-text" data-target="#dt-time2" data-toggle="datetimepicker">To <i class="fa fa-clock-o"></i></div>
									</div>
                                   </div>
                                </div>
								
									
                                    
								</div>
							</div>
                            
						</div>
							<div class="f1-buttons">
								<button class="btn btn-primary btn-previous" type="button">Previous</button>
								<button class="btn btn-primary btn-submit" type="submit">Submit</button>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script>
	"use strict";
function scroll_to_class(element_class, removed_height) {
	var scroll_to = $(element_class).offset().top - removed_height;
	if ($(window).scrollTop() != scroll_to) {
		$('html, body').stop().animate({ scrollTop: scroll_to }, 0);
	}
}
function bar_progress(progress_line_object, direction) {
	var number_of_steps = progress_line_object.data('number-of-steps');
	var now_value = progress_line_object.data('now-value');
	var new_value = 0;
	if (direction == 'right') {
		new_value = now_value + (100 / number_of_steps);
	}
	else if (direction == 'left') {
		new_value = now_value - (100 / number_of_steps);
	}
	progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
}
(function ($) {
	"use strict";
	$.backstretch;
	$('#top-navbar-1').on('shown.bs.collapse', function () {
		$.backstretch("resize");
	});
	$('#top-navbar-1').on('hidden.bs.collapse', function () {
		$.backstretch("resize");
	});
	$('.f1 fieldset:first').fadeIn('slow');

	$('.f1 input[type="text"], .f1 input[type="password"], .f1 textarea').on('focus', function () {
		$(this).removeClass('input-error');
	});
	$('.f1 .btn-next').on('click', function () {
		var parent_fieldset = $(this).parents('fieldset');
		var next_step = true;
		var current_active_step = $(this).parents('.f1').find('.f1-step.active');
		var progress_line = $(this).parents('.f1').find('.f1-progress-line');
		parent_fieldset.find('input[type="text"], input[type="password"], textarea').each(function () {
			if ($(this).val() == "") {
				$(this).addClass('input-error');
				next_step = false;
			}
			else {
				$(this).removeClass('input-error');
			}
		});
		if (next_step) {
			parent_fieldset.fadeOut(400, function () {
				current_active_step.removeClass('active').addClass('activated').next().addClass('active');
				bar_progress(progress_line, 'right');
				$(this).next().fadeIn();
				scroll_to_class($('.f1'), 20);
			});
		}
	});
	$('.f1 .btn-previous').on('click', function () {
		var current_active_step = $(this).parents('.f1').find('.f1-step.active');
		var progress_line = $(this).parents('.f1').find('.f1-progress-line');
		$(this).parents('fieldset').fadeOut(400, function () {
			current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
			bar_progress(progress_line, 'left');
			$(this).prev().fadeIn();
			scroll_to_class($('.f1'), 20);
		});
	});
	$('.f1').on('submit', function (e) {
		$(this).find('input[type="text"]').each(function () {
			if ($(this).val() == "") {
				e.preventDefault();
				window.isValid = false;
				$(this).addClass('input-error');
			}
			else {
				window.isValid = true;
				$(this).removeClass('input-error');
			
				e.preventDefault();
			}
		});
		if (window.isValid && $("#doctor_form").valid()) {
			var form = new FormData();
			var files = $('#image')[0].files;
			if (files.length > 0) {
				loadoverlay($("#doctor_form"))
				form.append("image", files[0]);
				form.append("table_name", "doctors");
				form.append("table_model", "Doctor");
				form.append("folder_name", "doctorimage");

				var settings = {
					"url": "/api/upload-image",
					"method": "POST",
					"timeout": 0,
					"processData": false,
					"mimeType": "multipart/form-data",
					"contentType": false,
					"data": form,

					statusCode: {
						400: function () {
							hideoverlay($("#doctor_form"))
							// response = JSON.parse(response);
							$.notify({
								message: "Please upload valid image file"
							}, {
								type: 'danger',
								z_index: 10000,
								timer: 2000,
							});
						},
						500: function () {
							hideoverlay($("#doctor_form"))
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
				
					var json_response = JSON.parse(response);
					var img_path = json_response.data;
					$.notify({
						message: json_response.message
					}, {
						type: 'success',
						z_index: 10000,
						timer: 2000,
					})
					var form = new FormData();
					form.append("table_name", "doctors");
					form.append("name", $("#name").val());
					form.append("centre_id_json", JSON.stringify($("#centre_id_json").val()));
					form.append("gender", $("#gender").val());
					form.append("specialist", $("#specialist").val());
					form.append("image", img_path);
					form.append("medical_history", $("#medical_history").val());
					form.append("degree_json", JSON.stringify($("#degree_json").val()));
					form.append("experience", $("#experience").val());
					form.append("full_charge", $("#full_charge").val());
					form.append("booking_charge", $("#booking_charge").val());
					form.append("visit_frequency", $("#visit_frequency").val());
					form.append("id",$("#doctor_id").val());
					form.append("table_model", "Doctor");

					var settings = {
						"url": "/api/update-data",
						"method": "POST",
						"timeout": 0,
						"processData": false,
						"mimeType": "multipart/form-data",
						"contentType": false,
						"data": form,
						statusCode: {
							400: function () {
								hideoverlay($("#doctor_form"))
								//  = JSON.parse();
								$.notify({
									message: "Something went wrong while inserting doctor!"
								}, {
									type: 'danger',
									z_index: 10000,
									timer: 2000,
								});
							},
							500: function () {
								hideoverlay($("#doctor_form"))
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

					$.ajax(settings).done(function (response) {
						var response2 = JSON.parse(response)
						
						$.notify({
							message: response2.message
						}, {
							type: 'success',
							z_index: 10000,
							timer: 2000,
						})

						var form = new FormData();
						form.append("table_name", "visits");
						form.append("doctor_id", response2.data.id);
						form.append("frequency", $("#frequency").val());
						form.append("count", $("#count").val());
						form.append("type", $("#type").val());
						form.append("week_no", JSON.stringify($("#week_no").val()));
						form.append("week_days", JSON.stringify($("#week_days").val()));
						form.append("dates", JSON.stringify($("#dates").val()));
						form.append("days", JSON.stringify($("#days").val()));
						form.append("others_json", JSON.stringify({ "from_time": $("#from_time").val(), "to_time": $("#to_time").val() }));
						form.append("id",$("#visit_id").val());
						form.append("table_model", "Visits");

						var settings = {
							"url": "/api/update-data",
							"method": "POST",
							"timeout": 0,
							"processData": false,
							"mimeType": "multipart/form-data",
							"contentType": false,
							"data": form,
							statusCode: {
								400: function () {
									hideoverlay($("#doctor_form"))
									// response = JSON.parse(res);
									$.notify({
										message: "Something went wrong while inserting visit information."
									}, {
										type: 'danger',
										z_index: 10000,
										timer: 2000,
									});
								},
								500: function () {
									hideoverlay($("#doctor_form"))
									// response = JSON.parse(res);
									$.notify({
										message: "Something went wrong while inserting visit information."
									}, {
										type: 'danger',
										z_index: 10000,
										timer: 2000,
									})
								}
							}
						};

						$.ajax(settings).done(function (response) {
							
							var response3 = JSON.parse(response);
					
					
							$.notify({
								message: response3.message
							}, {
								type: 'success',
								z_index: 10000,
								timer: 2000,
							})
						},function(){
							
							hideoverlay($("#doctor_form"));							
							window.open("/management/doctor/edit/"+$("#doctor_id").val(),"_self");
					
						});
					

					});


				

				});
				
				
			}
			else {
				loadoverlay($("#doctor_form"));
					var form = new FormData();
					form.append("table_name", "doctors");
					form.append("name", $("#name").val());
					form.append("centre_id_json", JSON.stringify($("#centre_id_json").val()));
					form.append("gender", $("#gender").val());
					form.append("specialist", $("#specialist").val());
					form.append("medical_history", $("#medical_history").val());
					form.append("degree_json", JSON.stringify($("#degree_json").val()));
					form.append("experience", $("#experience").val());
					form.append("full_charge", $("#full_charge").val());
					form.append("booking_charge", $("#booking_charge").val());
					form.append("visit_frequency", $("#visit_frequency").val());
					form.append("id",$("#doctor_id").val());
					form.append("table_model", "Doctor");

					var settings = {
						"url": "/api/update-data",
						"method": "POST",
						"timeout": 0,
						"processData": false,
						"mimeType": "multipart/form-data",
						"contentType": false,
						"data": form,
						statusCode: {
							400: function () {
								hideoverlay($("#doctor_form"))
								$.notify({
									message: "Something went wrong while inserting doctor!"
								}, {
									type: 'danger',
									z_index: 10000,
									timer: 2000,
								});
							},
							500: function () {
								hideoverlay($("#doctor_form"))
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

					$.ajax(settings).done(function (response) {
						var response2 = JSON.parse(response)
					
						$.notify({
							message: response2.message
						}, {
							type: 'success',
							z_index: 10000,
							timer: 2000,
						})

						var form = new FormData();
						form.append("table_name", "visits");
						form.append("doctor_id", response2.data.id);
						form.append("frequency", $("#frequency").val());
						form.append("count", $("#count").val());
						form.append("type", $("#type").val());
						form.append("week_no", JSON.stringify($("#week_no").val()));
						form.append("week_days", JSON.stringify($("#week_days").val()));
						form.append("dates", JSON.stringify($("#dates").val()));
						form.append("days", JSON.stringify($("#days").val()));
						form.append("others_json", JSON.stringify({ "from_time": $("#from_time").val(), "to_time": $("#to_time").val() }));
						form.append("id",$("#visit_id").val());
						form.append("table_model", "Visits");

						var settings = {
							"url": "/api/update-data",
							"method": "POST",
							"timeout": 0,
							"processData": false,
							"mimeType": "multipart/form-data",
							"contentType": false,
							"data": form,
							statusCode: {
								400: function () {
									hideoverlay($("#doctor_form"))
									// response = JSON.parse(res);
									$.notify({
										message: "Something went wrong while inserting visit information."
									}, {
										type: 'danger',
										z_index: 10000,
										timer: 2000,
									});
								},
								500: function () {
									hideoverlay($("#doctor_form"))
									// response = JSON.parse(res);
									$.notify({
										message: "Something went wrong while inserting visit information."
									}, {
										type: 'danger',
										z_index: 10000,
										timer: 2000,
									})
								}
							}
						};

						$.ajax(settings).done(function (response) {
							
							var response3 = JSON.parse(response);
					
					
							$.notify({
								message: response3.message
							}, {
								type: 'success',
								z_index: 10000,
								timer: 2000,
							})
						},function(){
							window.open("/management/doctor/edit/"+$("#doctor_id").val(),"_self");
						});
					

					});


					
			}
		//	
		}

	});

})(jQuery);
</script>
<script src="{{asset('assets/js/form-wizard/jquery.backstretch.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/moment.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/datetimepicker.custom.js')}}"></script>
<script>
      $('.centres').select2();
      $('.degrees').select2();
      $('.week_no').select2();
      $('.week_day').select2();
      $('.dates').select2();
</script>
@endsection